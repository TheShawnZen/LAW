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
	<title>AFTERWORK Accueil</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/_accueil_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/footer.css" rel="stylesheet">
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<nav class='navbar navbar-expand-md navbar-light bg-primary sticky-top'>
		<div class='container-fluid'>
			<a class='navbar-brand' href='accueil.php'><img src='img/AW_mini_allblack.png' width=50px></a>
			<span class='titre'>FTERWORK</span>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
				<span class='dark-text'><i class='fas fa-bars fa-1x'></i></span>
			</button>
	<!-- Navigation -->
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/nav.inc.php');
		//admin
		$tabOptions = [
						DOSSIER_BASE_LIENS."||||",
						DOSSIER_BASE_LIENS."||Accueil||active_nav",
						DOSSIER_BASE_LIENS."?action=gererMatchs||Gérer Équipes||",
						DOSSIER_BASE_LIENS."?action=gererEquipes||Gérer Matchs||",
					    DOSSIER_BASE_LIENS."?action=voirClassement||Classement||"];
		$tabAbout = DOSSIER_BASE_LIENS."?action=voirAPropos||À Propos ||";
		$tabLogin = DOSSIER_BASE_LIENS."?action=seDeconnecter||Se Déconnecter ||";

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

	<svg height="0" xmlns="http://www.w3.org/2000/svg">
		<filter id="drop-shadow">
			<feGaussianBlur in="SourceAlpha" stdDeviation="4" />
			<feOffset dx="12" dy="12" result="offsetblur" />
			<feFlood flood-color="rgba(0,0,0,0.5)" />
			<feComposite in2="offsetblur" operator="in" />
			<feMerge>
				<feMergeNode />
				<feMergeNode in="SourceGraphic" />
			</feMerge>
		</filter>
	</svg>

	<!--- Carousel -->
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="img-png" src="<?php echo DOSSIER_BASE_LIENS;?>/img/AW_RED.PNG" alt="...">
			</div>
			<div class="carousel-item ">
				<img class="img-jpg" src="https://my.llfiles.com/00306069/parcours-champs-2.jpg" alt="...">
			</div>
			<div class="carousel-item ">
				<img class="img-jpg" src="https://my.llfiles.com/00306069/29092016-IMG_3151.jpg" alt="...">
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>

	<!---Content--->
	<!-- <div class="content">
		<div id="TopTeams">
			<h1>Classement Équipes</h1>
			<p>1. Les Avengers</p>
			<p>2. Bill et sa gang</p>
			<p>3. AfterWork</p>
			<p>4. CoCo Drip</p>
		</div>
		<div id="TopScorers">
			<h1>Classement Joueurs</h1>
			<p>1. Franck (99 Points)</p>
			<p>2. Shawn (69 Points)</p>
			<p>3. Radu (32 Points)</p>
			<p>4. Théo (27 Points)</p>
		</div>
	</div> -->
	<div class="content2">
		<h1>Nouvelles</h1><br />
		<h2>INSCRIPTIONS SESSION HIVER 2020</h2>

		<p>Les inscriptions pour la saison d'hiver sont maintenant disponibles.</p>
		<a href="<?php echo DOSSIER_BASE_LIENS."?action=voirAPropos"?>#contact">Cliquez ici </a>pour plus d'informations.<br /> <br />
		<p class="eng">Subcriptions for the winter session are now available!</p>
		<a href="<?php echo DOSSIER_BASE_LIENS."?action=voirAPropos"?>#contact" class="eng">Click here </a>for more info. <br /> <br />

		<h2>AWB : AFTERWORK BASKETBALL</h2>

		<p>Là où vous pouvez mélanger le travail et le plaisir!</p>

		<p>C'est plus qu'une ligue!</p>

		<p class="eng">Where you can mix work and pleasure! </p>

		<p class="eng">More than a league!</p>
	</div>
</body>
<?php
	include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/footer.inc.php');
?>

</html>
