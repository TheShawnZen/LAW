<?php
	if (!ISSET($controleur)) {

		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gérer Équipes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/gererEquipes_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/footer.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>

<body>

	<!-- Navigation -->
	<nav class='navbar navbar-expand-md navbar-light bg-primary sticky-top'>
		<div class='container-fluid'>
			<a class='navbar-brand' href='accueil.php'><img src='img/AW_mini_allblack.png' width=50px></a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
				<span class='dark-text'><i class='fas fa-bars fa-1x'></i></span>
			</button>
			<?php
				include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/nav.inc.php');
				//admin
				$tabOptions = [
								DOSSIER_BASE_LIENS."?||||",
								DOSSIER_BASE_LIENS."||Accueil||",
								DOSSIER_BASE_LIENS."?action=gererMatchs||Gérer Équipes||active_nav ",
								DOSSIER_BASE_LIENS."?action=gererEquipes||Gérer Matchs||",
								DOSSIER_BASE_LIENS."?action=voirClassement||Classement||"];
				$tabAbout = DOSSIER_BASE_LIENS."?action=voirAPropos||À Propos||";
				$tabLogin = DOSSIER_BASE_LIENS."?action=seDeconnecter||Se Déconnecter||";

					// modification pour utilisateur
					if ($controleur->getActeur() == "visiteur") {
						$tabOptions[2] = DOSSIER_BASE_LIENS."?action=voirEquipes||Nos Équipes|| ";
						$tabOptions[3] = DOSSIER_BASE_LIENS."?action=voirMatchs||Horaire|| ";
						$tabLogin = DOSSIER_BASE_LIENS."?action=seConnecter||Se connecter||";
					}
					afficherMenu($tabOptions, $tabLogin, $tabAbout);

			?>
		</div>
	</nav>

			<div class="content">
				<?php
				include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/affichage_objets.inc.php");
				?>
        	<div class="tab">
						<?php
							afficherListeEquipes($controleur->getTabEquipes());
						?>
					</div>

					<div >
							<?php
								include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/affichage_erreurs.inc.php");
								if (count($controleur->getMessagesErreur()) != 0) {
									if ($controleur->getMessagesErreur()[0] != "Il n'y a pas de paramètres fournis") {
										afficherListeErreurs($controleur->getMessagesErreur());
									}
								}
								include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/formulaireGererEquipes.inc.php");
							?>
						</div>

			</div>





</body>
<!---Footer--->
<?php
	include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/footer.inc.php');
?>

</html>
