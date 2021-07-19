<?php
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/SaisonDAO.class.php");
	class VoirClassement extends  Controleur {
		private $tabEquipes = array();
		private $tabSaisons = array();
		private $tabMatchs = array();
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
        }
        public function getTabEquipes() { return $this->tabEquipes; }
		public function getTabSaisons() { return $this->tabSaisons; }
		public function getTabMatchs() { return $this->tabMatchs; }
		// ******************* Méthode exécuter action
		public function executerAction() {
			$this->tabEquipes = EquipeDAO::chercherTous();
			$this->tabSaisons = SaisonDAO::chercherTous();
			$this->tabMatchs = MatchsDAO::chercherTous();
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "classement";
		}		
	}	
?>