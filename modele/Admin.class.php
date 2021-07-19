<?php
	class Admin {
		// attributs
		private $nomUtilisateur="";
		private $motDePasse="";

		// constructeur
		public function __construct($nomUtil, $mdp){
			$this->nomUtilisateur = $nomUtil;
			$this->motDePasse = $mdp;
		}

		// setters
		public function setNomUtilisateur($nomUtil){
			$this->nomUtilisateur = $nomUtil;
		}

		public function setMotDePasse($mdp){
			$this->motDePasse = $mdp;
		}


		// getters
		public function getNomUtilisateur(){
			return $this->nomUtilisateur;
		}

		public function getMotDePasse(){
			return $this->motDePasse;
		}


		// toString
		public function __toString(){
			return "Utilisateur: ".$this->nomUtilisateur;
		}

		// load from array
		public function loadFromArray($tab){
			$this->nomUtilisateur = $tab["NOMUTILISATEUR"];
			$this->motDePasse = $tab["MOTDEPASSE"];
		}
	}
?>