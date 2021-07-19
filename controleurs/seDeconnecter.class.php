<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/AdminDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.class.php");

	class SeDeconnecter extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if ($this->acteur=="administrateur") {
				unset($_SESSION['adminConnecte']);
				$this->acteur = "visiteur";
			} else  {
				array_push($this->messagesErreur, "Vous êtes déjà déconnecté");
			}
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "accueil";
		}

	}	
	
?>