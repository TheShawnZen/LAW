<?php
	class VoirPhotos extends  Controleur {
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "photos";
		}
	}
?>
