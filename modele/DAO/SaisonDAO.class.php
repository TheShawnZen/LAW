<?php
	// Importe le fichier de configuration de la BD
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/configs/configBD.interface.php");
	// Importe l'interface DAO et la classe enseignant
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/Saison.class.php");

	class SaisonDAO implements DAO {	
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
			$uneSaison=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM saison WHERE SESSIONLAW=:monID");
			// Attacher des variables PHP au paramètres SQL avec le code de l'équipe
			// reçu du paramètre $cles
			$requete->bindParam(":monID",$cles);  
		  
			// Exécuter la requête
			$requete->execute();			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance de l'équipe
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$uneSaison=new Saison($enregistrement['SESSIONLAW']);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		  
			return $uneSaison;	 
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
			$requete= $connexion->prepare("SELECT * FROM saison ".$filtre);

			// Exécuter la requête
			$requete-> execute();			

			// Analyser les enristrements s'il y en a 
			foreach ($requete as $enregistrement) {
				$uneSaison=new Saison($enregistrement['SESSIONLAW']);
				array_push($liste, $uneSaison);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
			
			return $liste;	 
		} 
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function inserer($uneSaison) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			
			$requete = $connexion->prepare("INSERT INTO saison (SESSIONLAW) VALUES (?)");
			return	$requete-> execute(array($uneSaison->getSession()));
		}
		static public function modifier($uneSaison) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE matchs SET SESSIONLAW='".$uneSaison->getSession();
			$commandeSQL .=" WHERE SESSIONLAW=".$uneSaison->getSession();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($uneSaison){
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM saison WHERE SESSIONLAW=".$uneSaison->getSession();
			$requete = $connexion->prepare($commandeSQL);
			return	$requete->execute();
		}
	}
?>