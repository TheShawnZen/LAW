<?php
	// Importe le fichier de configuration de la BD
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/configs/configBD.interface.php");
	// Importe l'interface DAO et la classe enseignant
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/Equipe.class.php");

	class EquipeDAO implements DAO {	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		// ici la seule $clés est un int représentant le code de l'équipe
		
		public static function chercher($cles) { 
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$uneEquipe=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM equipe WHERE IDEQUIPE=:monID");
			// Attacher des variables PHP au paramètres SQL avec le code de l'équipe
			// reçu du paramètre $cles
			$requete->bindParam(":monID",$cles);  
		  
			// Exécuter la requête
			$requete->execute();			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance de l'équipe
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$uneEquipe=new Equipe($enregistrement['IDEQUIPE'], $enregistrement['NOM'], $enregistrement['VICTOIRE'],
									$enregistrement['DEFAITE'],$enregistrement['NUL']);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		  
			return $uneEquipe;	 
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
			$requete= $connexion->prepare("SELECT * FROM equipe ".$filtre);

			// Exécuter la requête
			$requete-> execute();			

			// Analyser les enristrements s'il y en a 
			foreach ($requete as $enregistrement) {
				$uneEquipe=new Equipe($enregistrement['IDEQUIPE'], $enregistrement['NOM'], $enregistrement['VICTOIRE'],
									$enregistrement['DEFAITE'],$enregistrement['NUL']);
				array_push($liste, $uneEquipe);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
			
			return $liste;	 
		} 
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function inserer($uneEquipe) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			$requete = $connexion->prepare("INSERT INTO equipe (IDEQUIPE,NOM,VICTOIRE,DEFAITE,NUL) VALUES (?,?,?,?,?)");
			return	$requete-> execute(array($uneEquipe->getId(), $uneEquipe->getNom(),
			                                 $uneEquipe->getVictoires(),$uneEquipe->getDefaites(),$uneEquipe->getNuls()));
		}
		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($uneEquipe) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE equipe SET NOM ='".$uneEquipe->getNom()."',VICTOIRE='".$uneEquipe->getVictoires()."',DEFAITE='".$uneEquipe->getDefaites();
			$commandeSQL .= "',NUL=".$uneEquipe->getNuls()." WHERE IDEQUIPE=".$uneEquipe->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		static public function ajouterVictoire($uneEquipe) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE equipe SET VICTOIRES ='".($uneEquipe->getVictoires()+1)."'WHERE IDEQUIPE='".$uneEquipe->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		static public function ajouterDefaite($uneEquipe) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE equipe SET DEFAITES ='".($uneEquipe->getDefaites()+1)."'WHERE IDEQUIPE='".$uneEquipe->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		static public function ajouterNul($uneEquipe) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE equipe SET NUL ='".($uneEquipe->getNuls()+1)."'WHERE IDEQUIPE='".$uneEquipe->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($uneEquipe){
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM equipe WHERE IDEQUIPE=".$uneEquipe->getId();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		} 
	}
	
?>