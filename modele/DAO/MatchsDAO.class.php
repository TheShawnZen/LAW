<?php
	// Importe le fichier de configuration de la BD
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/configs/configBD.interface.php");
	// Importe l'interface DAO et la classe Matchs
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/Matchs.class.php");

	class MatchsDAO implements DAO {	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		// ici la seule $clés est un int représentant le code du macth
		
		public static function chercher($cles) { 
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unMatch=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM matchs WHERE IDMATCH=:monID");
			// Attacher des variables PHP au paramètres SQL avec le code de l'équipe
			// reçu du paramètre $cles
			$requete->bindParam(":monID",$cles);  
		  
			// Exécuter la requête
			$requete->execute();			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance de l'équipe
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$unMatch=new Matchs($enregistrement['IDMATCH'], $enregistrement['SESSIONLAW'], $enregistrement['IDDOMICILE'],
									$enregistrement['IDVISITEUR'],$enregistrement['SCOREDOMICILE'],$enregistrement['SCOREVISITEUR'],$enregistrement['DATEMATCH'],$enregistrement['RESULTATFINAL']);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		  
			return $unMatch;	 
		} 
		
		// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
		static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
		
		// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
		static public function chercherAvecFiltre($filtre){ 
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// initialisation du tableau vide
			$liste = array(); 
				
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM matchs ".$filtre);

			// Exécuter la requête
			$requete-> execute();			
			// Analyser les enristrements s'il y en a 
			foreach ($requete as $enregistrement) {
				$unMatch=new Matchs($enregistrement['IDMATCH'], $enregistrement['SESSIONLAW'], $enregistrement['IDDOMICILE'],
                $enregistrement['IDVISITEUR'],$enregistrement['SCOREDOMICILE'],$enregistrement['SCOREVISITEUR'],$enregistrement['DATEMATCH'],$enregistrement['RESULTATFINAL']);
				array_push($liste, $unMatch);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
			
			return $liste;	 
		} 
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function inserer($unMatch) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			$requete = $connexion->prepare("INSERT INTO matchs (IDMATCH,SESSIONLAW,IDDOMICILE,IDVISITEUR,SCOREDOMICILE,SCOREVISITEUR,DATEMATCH,RESULTATFINAL) VALUES (?,?,?,?,?,?,?,?)");
			return	$requete-> execute(array($unMatch->getId(),$unMatch->getSession(),$unMatch->getIdDomicile(),
			                                 $unMatch->getIdVisiteur(),$unMatch->getScoreDomicile(),$unMatch->getScoreVisiteur(),$unMatch->getDateMatch(),$unMatch->getResultatFinal()));
		}
		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($unMatch) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE matchs SET IDDOMICILE='".$unMatch->getIdDomicile()."',IDVISITEUR='".$unMatch->getIdVisiteur()."',SCOREDOMICILE='".$unMatch->getScoreDomicile()."',SCOREVISITEUR='".$unMatch->getScoreVisiteur()."',DATEMATCH='".$unMatch->getDateMatch()."',RESULTATFINAL='".$unMatch->getResultatFinal()."'WHERE IDMATCH='".$unMatch->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		//met à jour le score d'une partie
		static public function scoreAjour($id,$sd,$sv,$r) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			//Je n'arrivais pas à set la BD avec UPDATE,nous avons pris un chememinplus long avec le même résultat
			$match = MatchsDAO::chercherAvecFiltre("WHERE IDMATCH=".$id);
			//si le match est fini
			if($r=="oui"){
				$r=1;
			}
			else{
				$r=0;
			}
			$match[0]->setScoreDomicile($sd);
			$match[0]->setScoreVisiteur($sv);
			$match[0]->setResultatFinal($r);
			MatchsDAO::supprimer($match[0]);
			MatchsDAO::inserer($match[0]);
			
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($unMatch){
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM matchs WHERE IDMATCH=".$unMatch->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		} 
	}
?>