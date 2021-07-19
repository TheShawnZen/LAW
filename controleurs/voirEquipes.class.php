<?php
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/JoueurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/FicheJoueurDAO.class.php");
	class VoirEquipes extends Controleur {
		// ******************* Attributs 
		private $tabEquipes = array();
		private $tabJoueurs = array();
		private $tabFicheJoueurs = array();
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		public function getTabEquipes() { return $this->tabEquipes; }
		public function getTabJoueurs() { return $this->tabJoueurs; }
		public function getTabFicheJoueurs() { return $this->tabFicheJoueurs; }
		

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- INTERACTION BD: OBTENIR TOUS LES EQUIPES ------------------
			$this->tabEquipes = EquipeDAO::chercherTous();
			//----------------------------- INTERACTION BD: OBTENIR TOUS LES JOUEURS ------------------
			$this->tabJoueurs = JoueurDAO::chercherTous();
			//----------------------------- INTERACTION BD: OBTENIR TOUS LES FICHES DE JOUEURS ------------------
			$this->tabFicheJoueurs = FicheJoueurDAO::chercherTous();
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER --------------------------
			return "equipes";
		}
	}	
?>