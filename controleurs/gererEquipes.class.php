<?php
	//----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/EquipeDAO.class.php");

	class GererEquipes extends Controleur {

		// ******************* Attributs 
		private $tabEquipes = array();
		private $tabJoueurs = array();
		private $tabFicheJoueurs = array();
		private $tabMatchs = array();
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Accesseurs tabEquipes
		public function getTabEquipes() { return $this->tabEquipes; }
		public function getTabJoueurs() { return $this->tabJoueurs; }
		public function getTabFicheJoueurs() { return $this->tabFicheJoueurs;}
		public function getTabMatchs(){return $this->tabMatchs;}
		// ******************* Méthode exécuter action
		// ... effectue le travail d'interactions avec la BD
		// ... plus tard cette méthode retournera le nom de la vue à utiliser
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if ($this->acteur != "administrateur") {
				array_push($this->messagesErreur,"Vous devez vous connecter en tant qu’administrateur");
				return "pageConnexionAdmin";
			}
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS --------------------------------
			$valide = $this->validerPOST();
		
			//----------------------------- CREATION DE L'OBJET ET OPERATION DAO (Supprimer/inserer) ------
			if ($valide) {
				$equipe = new Equipe((int)$_POST['idequipe'], $_POST['nomequipe'], (int) 0, (int) 0, (int) 0);
				if ($_POST['operation'] == "ajouter") {
					EquipeDAO::inserer($equipe);
				} elseif ($_POST['operation'] == "supprimer")  {
					EquipeDAO::supprimer($equipe);
				}
			}
			$this->tabEquipes = EquipeDAO::chercherTous();
			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "pageGererEquipes";
		}


		
		// ******************* Méthode valider
		// ... return true/false en fonction de la présence et validité des valeurs obtenues par $_POST 
		private function validerPOST() {
			//----------------------------- VALIDATION
			$valide = true;
			$listeParametres = ['idequipe', 'nomequipe'];
			if (count($_POST) == 0 ) {
				$valide = false;
			} else  {
				foreach ($listeParametres as $parametre) {
					if (! ISSET($_POST[$parametre]) ) {
						$valide = false;
						array_push($this->messagesErreur,"Paramètre ".$parametre ." inexistant");
					}
				}
				if ($valide) {
					if ($_POST['operation'] != 'ajouter' && $_POST['operation'] != 'supprimer') {
						$valide = false;
						array_push($this->messagesErreur,"Mauvais type d'opérations");
					}
					if ($_POST['operation'] == 'ajouter') {
						if (strlen(trim($_POST['nomequipe'])) < 1) {
							$valide = false;
							array_push($this->messagesErreur,"Les noms doivent avoir au moins 1 caractère.");
						}
                    }
                    
					if (!is_numeric($_POST['idequipe']) ) {
						array_push($this->messagesErreur,"L'id doit être un entier.");
					} else {
						$id = (int)$_POST['idequipe'];
						if ($id < 0 || $id > 9999) {
							$valide = false;
							array_push($this->messagesErreur,"L'id doit être entre 0 et 9999.");
						}
                    }
                    
                    if (!is_numeric($_POST['idequipe'])) {
						array_push($this->messagesErreur,"L'id, les victoires, les défaites et les nuls doivent être des entiers.");
					} else {
						$id = (int)$_POST['idequipe'];

						if (($id < 0 || $id > 99999)) {
							$valide = false;
							array_push($this->messagesErreur,"L'id doit être entre 0 et 9999.");
						}
					}
				}
			}
			return $valide;
		}
	}	
?>