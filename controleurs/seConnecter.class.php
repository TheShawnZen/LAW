<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AdminDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.class.php");

	class SeConnecter extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if ($this->acteur=="administrateur") {
				array_push($this->messagesErreur, "Vous êtes déjà connecté");
				return "pageConnexionAdmin";
			}

			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ET SE CONNECTER AU BESOIN ------
			if ($this->validerPOST()) { 
				$admin = AdministrateurDAO::chercherParNumeroMotPasse($_POST['utilisateur'], $_POST['motPasse']);
				if ($admin != null) {
					$this->acteur = "administrateur";
					$_SESSION['adminConnecte'] = $admin->getNomUtilisateur();
					return "accueil";
				} else {
					array_push($this->messagesErreur, "Nom d'utilisateur ou mot de passe invalide");
					return "pageConnexionAdmin";
				}
			}
			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "pageConnexionAdmin";
		}

		private function validerPOST() {
			$test = true;
			if (!ISSET($_POST['utilisateur']) or !ISSET($_POST['motPasse'])) {
				$test = false;
			}
			return $test;
		}
	}	
	
?>