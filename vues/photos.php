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
	<title>Photos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/photos_style.css" rel="stylesheet">
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
						DOSSIER_BASE_LIENS."||||",
						DOSSIER_BASE_LIENS."||Accueil||",
						DOSSIER_BASE_LIENS."?action=gererMatchs||Gérer Équipes|| ",
						DOSSIER_BASE_LIENS."?action=gererEquipes||Gérer Matchs|| ",
					    DOSSIER_BASE_LIENS."?action=voirClassement||Classement||"];
		$tabAbout = DOSSIER_BASE_LIENS."?action=voirAPropos||À Propos||active_nav";
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
		<h2 style="text-align:center;margin-bottom: 1em;">Galerie</h2>

		<div class="row">
			<div class="column">
				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/1.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/33.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/2.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/Roberta.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/ricky.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/team-aw-banc.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/noise.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/07.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/pic-1.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0781.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/10.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/03.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/11.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/12.jpg" style="width: 100% ">
			</div>
			<div class="column">
				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/15.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/17.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/18.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/19.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/06.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0930.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/08.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/01.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/pic-2.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_222823.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_222825.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_222844.jpg" style="width: 100% ">
			</div>
			<div class="column">
				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0809.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/09.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/pic-4.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_222929_1.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/ricky.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_2230310.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/pic-5.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0651.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_223045.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/20171214_223110.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/noise.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0948.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/team-aw-banc.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14463028_300225217012813_2212161150207430153_n.jpg"
					style="width: 100% ">
			</div>
			<div class="column">
				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14449982_300225137012821_2010619979040869613_n.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/Fly-ballers.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14390820_300225163679485_8537859794513501569_n.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14440824_300225143679487_184250953387079070_n.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/Bouteilles-Porte-Rouge.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/junior-bonhomme.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14484939_300225170346151_6142149437457061249_n.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/Pat-Deschamps.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/04.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0629.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/14355678_299151483786853_885629631927222374_n.jpg"
					style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0686.jpg" style="width: 100% ">

				<img src="https://s3.amazonaws.com/my.llfiles.com/00306069/SAM_0915.jpg" style="width: 100% ">
			</div>
		</div>
	</div>
</body>
<!---Footer--->
<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/footer.inc.php');
?>

</html>
