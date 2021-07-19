 <?php
	include_once(DOSSIER_BASE_INCLUDE."controleurs/gererEquipes.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/gererMatchs.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirEquipes.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirMatchs.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirAPropos.class.php");
  include_once(DOSSIER_BASE_INCLUDE."controleurs/voirPhotos.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirClassement.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/voirReglements.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seConnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/seDeconnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/defaut.class.php");

	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action == "gererEquipes") {
				$controleur = new GererMatchs();
			}elseif ($action == "gererMatchs") {
				$controleur = new GererEquipes();
			}elseif ($action == "voirEquipes") {
				$controleur = new VoirEquipes();
			} elseif ($action == "voirMatchs") {
				$controleur = new VoirMatchs();
			} elseif ($action == "voirAPropos") {
				$controleur = new VoirAPropos();
      } elseif ($action == "voirPhotos") {
        $controleur = new VoirPhotos();
			} elseif ($action == "seConnecter") {
				$controleur = new SeConnecter();
			} elseif ($action == "seDeconnecter") {
				$controleur = new SeDeconnecter();
			} elseif ($action == "voirClassement") {
				$controleur = new VoirClassement();
			} elseif ($action == "voirReglements") {
				$controleur = new VoirReglements();
			} else {
				$controleur = new Defaut();
			}
			return $controleur;
		}
	}

?>
