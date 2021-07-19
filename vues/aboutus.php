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
	<title>À propos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/aboutus_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/footer.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>
	<nav class='navbar navbar-expand-md navbar-light bg-primary sticky-top'>
		<div class='container-fluid'>
			<a class='navbar-brand' href='accueil.php'><img src='img/AW_mini_allblack.png' width=50px></a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
				<span class='dark-text'><i class='fas fa-bars fa-1x'></i></span>
			</button>
	<!-- Navigation -->
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/nav.inc.php');
		//admin
		$tabOptions = [
						DOSSIER_BASE_LIENS."||||",
						DOSSIER_BASE_LIENS."||Accueil||",
						DOSSIER_BASE_LIENS."?action=gererMatchs||Gérer Équipes|| ",
					 DOSSIER_BASE_LIENS."?action=gererEquipes||Gérer Matchs|| ",
					    DOSSIER_BASE_LIENS."?action=voirClassement||Classement||"];
		$tabAbout = DOSSIER_BASE_LIENS."?action=voirAPropos||À Propos || active_nav";
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

	<!---A propos de nous--->
	<div class="container-fluid bottom-space">
		<div class="about">
			<div class="text">
				<h1>À propos de nous</h1>
				<div class="line"></div>
			</div>
		</div>
	</div>
	<div class="content">

		<p id="p1">AfterWork Basket-ball est une ligue de basket-ball pour les travailleurs qui désirent pratiquer
			leur sport favori avec leurs collègues et compétitionner avec d’autres travailleurs de diverses entreprises.
			Il n’y a pas de niveau préétabli mais le plaisir est de mise.</p><br /><br /> <br /><br />
		<p>La saison comprend: </p><br />

		<p>· 10 parties arbitrées <div class="eng">(10 games with referee)</div>
		</p><br />

		<p>· 1 Jersey </p><br />

		<p>· Statistiques individuelles et par équipe <div class="eng">(Individual and team stats)</div>
		</p><br />

		<p>· Prix pour l’équipe gagnante <div class="eng">(Price for the winning team)</div>
		</p><br />

		<p>Certains employeurs remboursent les frais reliés à de l'activité physique. Les ligues de sports sont
			généralement comprises. Vérifiez auprès de votre employeur.</p><br />
	</div>

	<!---Ou nous trouver--->

	<div class="container-fluid top-space bottom-space">
		<div class="where">
			<div class="text">
				<h1>Où nous trouver ?</h1>
				<div class="line"></div>
			</div>
		</div>
	</div>

	<!---Map--->
	<div class="content" id="where">
		<img id="map_img"
			src="https://www.reine-marie.qc.ca/wp-content/themes/2019/images/college-reine-marie.png"></img>
		<div id="map"></div>
		<br />
		<a id="a2"
			href="https://www.google.com/maps/place/9300+Boulevard+Saint-Michel,+Montr%C3%A9al,+QC+H1Z+3H1/@45.5728828,-73.6347273,17z/data=!3m1!4b1!4m5!3m4!1s0x4cc91f300c59a3e5:0xe9c05c928a439490!8m2!3d45.5728828!4d-73.6325386?hl=en">9300
			boul Saint-Michel, Montréal, QC H1Z 3H1 </a>
		<p id="p2"> Note : Entrée est sur la rue Champdoré</p>
	</div>
	<script>
		function initMap() {
			var reineMarie = { lat: 45.5731117, lng: -73.6323584 };
			var map = new google.maps.Map(
				document.getElementById('map'), { zoom: 15, center: reineMarie });
			var marqueur = new google.maps.Marker({ position: reineMarie, map: map });
		}
	</script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfncen6RJhqMnNiXkuortAJeMBAQ834Fg&callback=initMap">
		</script>
	<!--- Contact--->
	<div id="contact" class="container-fluid top-space bottom-space">
		<div class="interet">
			<div class="text">
				<h1>Intéressé(es) ?</h1>
				<div class="line"></div>
			</div>
		</div>
	</div>

	<section>
		<div class="content">
			<h2> Contactez-Nous!</h2><br />
			<div id="after_submit"> </div>
			<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
				<div class="row" id="contact">
					<label class="required" for="name">Votre Nom</label><br />
					<input id="name" class="input" name="name" type="text" value="" size="30" /><br />
					<span id="name_validation" class="error_message"></span>
				</div>
				<div class="row">
					<label class="required" for="email">Votre email</label><br />
					<input id="email" class="input" name="email" type="text" value="" size="30" /><br />
					<span id="email_validation" class="error_message"></span>
				</div>
				<div class="row">
					<label class="required" for="sujet">Sujet</label><br />
					<input id="sujet" class="input" name="sujet" type="text" value="" size="30" /><br />
					<span id="sujet_validation" class="error_message"></span>
				</div>
				<div class="row">
					<label class="required" for="message">Votre Message</label><br />
					<textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
					<span id="message_validation" class="error_message"></span>
				</div>

				<input id="submit_button" type="submit" value="Envoyer email" />
			</form>
		</div>
	</section>
</body>

<!---Footer--->
<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/footer.inc.php');
?>

</html>
