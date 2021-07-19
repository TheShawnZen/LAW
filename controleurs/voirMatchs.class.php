<?php
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/MatchsDAO.class.php");	
	class VoirMatchs extends  Controleur {
		// ******************* Attributs 
		private $tabMatchs = array();
		private $tabEquipes = array();
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Accesseurs TabMatchs
		public function getTabMatchs() { return $this->tabMatchs; }
		public function getTabEquipes() { return $this->tabEquipes; }

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- INTERACTION BD: OBTENIR TOUS LES Matchs ------------------
			$this->tabMatchs = MatchsDAO::chercherTous();
			$this->tabEquipes = EquipeDAO::chercherTous();
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "horaire";
		}		
	}	
	
?>