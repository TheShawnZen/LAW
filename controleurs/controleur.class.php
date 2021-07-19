<?php
	abstract class Controleur {

		// ******************* Attributs 
		protected $messagesErreur = array();
		protected $acteur = "visiteur";
		
		// ******************* Constructeur 
		public function __construct() {
			$this->determinerActeur();
		}
		
		// ******************* Accesseurs 
		public function getMessagesErreur() { return $this->messagesErreur; }
		public function getActeur () { return $this->acteur; }

		// ******************* Méthode abstraite executer action
		// Cette méthode :
		//  - gère la session (s'il y en a une)
		//  - valide les données reçues en POST (s'il y en a)
		//  - effectue le travail requis par l'action (interactions avec les DAO, ...)
		//  - retourne le nom de la vue à appliquer (en format string, sans le chemin(path))
		abstract public function executerAction();

		//*******************Méthode de validation de connexion administrateur
		private function determinerActeur () {
			session_start();
			if (ISSET($_SESSION['adminConnecte'])) {
				$this->acteur = "administrateur";
			}
		}
	}
	
?>