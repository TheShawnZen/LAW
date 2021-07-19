
<?php
	// Importe le fichier de configuration de la BD
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/configs/configBD.interface.php");
	// Importe l'interface DAO et la classe administrateur
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/Admin.class.php");

	class AdministrateurDAO implements DAO {	
	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		// ici la seule $clés est un int représentant le code du administrateur
		public static function chercher($cles) { 
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}

			// valeur par défaut pour la variable à retourner si non-trouvée
			$unAdministrateur=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete= $connexion->prepare("SELECT * FROM adminLAW WHERE NOMUTILISATEUR=?");

			// Exécuter la requête avec le paramètre
			$requete->execute(array($cles));			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance du administrateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$unAdministrateur=new Admin($enregistrement['NOMUTILISATEUR'],
									$enregistrement['MOTDEPASSE']);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		  
			return $unAdministrateur;	 
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
			$requete= $connexion->prepare("SELECT * FROM adminLAW ".$filtre);

			// Exécuter la requête
			$requete-> execute();			

			// Analyser les enristrements s'il y en a 
			foreach ($requete as $enregistrement) {
				$unAdministrateur=new Admin($enregistrement['NOMUTILISATEUR'],
				$enregistrement['MOTDEPASSE']);
				array_push($liste, $unAdministrateur);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		
			return $liste;	 
		} 
		// Cette méthode insère l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function inserer($unAdministrateur) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$requete = $connexion->prepare("INSERT INTO adminLAW(NOMUTILISATEUR,MOTDEPASSE) VALUES (?,?)");
			ConnexionDB::close();	
			return	$requete-> execute(array($unAdministrateur->getNomUtilisateur(), $unAdministrateur->getMotDePasse()));
		}
		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($unAdministrateur) {
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "UPDATE adminLAW SET MOTDEPASSE='".$unAdministrateur->getMotDePasse()."'WHERE NOMUTILISATEUR='".$unAdministrateur->getNomUtilisateur();
			$requete = $connexion->prepare($commandeSQL);
			ConnexionDB::close();	
			return	$requete->execute();
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($unAdministrateur){
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "DELETE FROM adminLAW WHERE NOMUTILISATEUR=".$unAdministrateur->getNomUtilisateur();
			$requete = $connexion->prepare($commandeSQL);
			ConnexionDB::close();	
			return	$requete->execute();
		} 
		
		// Cette retourne l'objet de type administrateur qui a le bon numéro d'employé et le bon mot de passe 
		// Si non trouvé, on retourne null
		static public function chercherParNumeroMotPasse($unNumero, $unMotDePasse){
			try {
				$connexion=ConnexionDB::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD."); 
			}
			$commandeSQL = "SELECT * FROM adminLAW WHERE NOMUTILISATEUR=? and MOTDEPASSE=?";
			$requete = $connexion->prepare($commandeSQL);
			$requete->execute(array($unNumero, $unMotDePasse));
			
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unAdministrateur=null; 
			
			if ($requete->rowCount() > 0) {
				$enregistrement=$requete->fetch();
				$unAdministrateur=new Admin($enregistrement['NOMUTILISATEUR'], $enregistrement['MOTDEPASSE']);
			}

			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionDB::close();	
		  
			return $unAdministrateur;	 
		}
	}
	
?>