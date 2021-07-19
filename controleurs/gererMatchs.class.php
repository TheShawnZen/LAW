<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/MatchsDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.class.php");

	class GererMatchs extends Controleur {

		// ******************* Attributs 
		private $tabMatchs = array();
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Accesseurs tabMatchs
		public function getTabMatchs() { return $this->tabMatchs; }

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
				$match = new Matchs((int)$_POST['id'], $_POST['sessionlaw'], (int) $_POST['idDomicile'], (int) $_POST['idVisiteur'],(int) 0,(int) 0, $_POST['datematch'],0);
				if ($_POST['operation'] == "ajouter") {
					MatchsDAO::inserer($match);
				} 
				elseif ($_POST['operation'] == "supprimer")  {
					MatchsDAO::supprimer($match);
				}
				elseif($_POST['operation'] == "update"){
					MatchsDAO::scoreAjour((int)$_POST['idmatch'], (int) $_POST['scoredomicile'], (int) $_POST['scorevisiteur'],$_POST['matchfini']);
				}
			}
			$this->tabMatchs = MatchsDAO::chercherTous();
			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return "pageGererMatchs";
		}


		
		// ******************* Méthode valider
		// ... return true/false en fonction de la présence et validité des valeurs obtenues par $_POST 
		private function validerPOST() {
			//----------------------------- VALIDATION
			$valide = true;
			$listeParametres = ['id', 'sessionlaw', 'idDomicile', 'idVisiteur','idmatch','scoredomicile','scorevisiteur'];
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
					if ($_POST['operation'] != 'ajouter' && $_POST['operation'] != 'supprimer' && $_POST['operation'] != 'update') {
						$valide = false;
						array_push($this->messagesErreur,"Mauvais type d'opérations");
					}
					if ($_POST['operation'] == 'ajouter') {
						if (strlen(trim($_POST['sessionlaw'])) < 1) {
							$valide = false;
							array_push($this->messagesErreur,"Les sessions doivent avoir au moins 1 caractère.");
						}
					}
					if ($_POST['operation'] == 'ajouter' && $_POST['operation'] == 'supprimer') {
						if (!is_numeric($_POST['id']) ) {
							array_push($this->messagesErreur,"L'id doit être un entier.");
						} else {
							$id = (int)$_POST['id'];
							if ($id < 0 || $id > 9999) {
								$valide = false;
								array_push($this->messagesErreur,"L'id doit être entre 0 et 99999.");
							}
						}
					}
				if( $_POST['operation'] == 'ajouter'){
						if (!is_numeric($_POST['id']) || !is_numeric($_POST['idDomicile']) || !is_numeric($_POST['idVisiteur'])) {
							array_push($this->messagesErreur,"L'id, les victoires, les défaites et les nuls doivent être des entiers.");
						} else {
							$id = (int)$_POST['id'];
							$idd = (int)$_POST['idDomicile'];
							$idv = (int)$_POST['idVisiteur'];
							if (($id < 0 || $id > 9999) || ($idd < 0 || $idd > 9999) || ($idv < 0 || $idv > 9999)) {
								$valide = false;
								array_push($this->messagesErreur,"L'id, id domicile et id visiteur doit être entre 0 et 9999.");
							}
						}
					}
				}
				return $valide;
			}
		}
	}	
?>