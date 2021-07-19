<?php
if (!isset($controleur)) {

	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Horaire</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/_horaire_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/footer.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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
			include_once(DOSSIER_BASE_INCLUDE . 'vues/inclusions/nav.inc.php');
			//admin
			$tabOptions = [
				DOSSIER_BASE_LIENS . "||||",
				DOSSIER_BASE_LIENS . "||Accueil||",
				DOSSIER_BASE_LIENS . "?action=gererMatchs||Gérer Équipes|| ",
				DOSSIER_BASE_LIENS . "?action=gererEquipes||Gérer Matchs|| active_nav",
				DOSSIER_BASE_LIENS . "?action=voirClassement||Classement||"
			];
			$tabAbout = DOSSIER_BASE_LIENS . "?action=voirAPropos||À Propos||";
			$tabLogin = DOSSIER_BASE_LIENS . "?action=seDeconnecter||Se Déconnecter||";

			// modification pour utilisateur
			if ($controleur->getActeur() == "visiteur") {
				$tabOptions[2] = DOSSIER_BASE_LIENS . "?action=voirEquipes||Nos Équipes||";
				$tabOptions[3] = DOSSIER_BASE_LIENS . "?action=voirMatchs||Horaire||active_nav";
				$tabLogin = DOSSIER_BASE_LIENS . "?action=seConnecter||Se connecter||";
			}
			afficherMenu($tabOptions, $tabLogin, $tabAbout);

			?>
		</div>
	</nav>

	<div class="content">
		<h2 class="active">Matchs à venir</h2>
		<div class="divtable">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Date</th>
						<th>Heure</th>
						<th>Domicile</th>
						<th>Visiteur</th>
					</tr>
				</thead>
				<tbody id="tablebody">

				</tbody>
			</table>
		</div>
	</div>

	<script>
		<?php
		$tabMatchs = $controleur->getTabMatchs();
		$tabEquipes = $controleur->getTabEquipes();
		?>
		var equipes = {}, matchs = [];
		var mois = [
			"01", "02", "03",
			"04", "05", "06", "07",
			"08", "09", "10",
			"11", "12"
		];

		// on fait un tableau d'équipes avec le format ID:NOM pour faciliter les étapes suivantes
		<?php foreach ($tabEquipes as $equipes => $e) { ?>
			equipes[<?php echo '"' . $e->getId() . '"' ?>] = <?php echo '"' . $e->getNom() . '";';
		} ?>

		// pour chaque match de la BD, nous mettons les informations dont nous avons besoin dans le tableau des matchs
		<?php foreach ($tabMatchs as $matchs => $m) { ?>
			matchs.push({
				id: "<?php echo $m->getId(); ?>",
				domicileID: "<?php echo $m->getIdDomicile(); ?>",
				visiteurID: "<?php echo $m->getIdVisiteur(); ?>",
				dateMatch: new Date("<?php echo $m->getDateMatch(); ?>")});
		<?php } ?>

		// trie l'horaire en fonction de la date d'aujourd'hui face à celle du match en question
		matchs.sort(function(a, b){
			return a.dateMatch - b.dateMatch;
		});

		// pour chaque match, on fait un tableau qui montre la date et les équipes qui jouent
		matchs.forEach(match => {
			var ajd = new Date();
			ajd.setHours(0);
			ajd.setMinutes(1);
			if (ajd <= match.dateMatch) {
				document.getElementById("tablebody").innerHTML +=
					`<tr>
						<td>${match.dateMatch.getFullYear()}-${mois[match.dateMatch.getMonth()]}-${match.dateMatch.getDate().toString().length<2?"0"+match.dateMatch.getDate().toString():match.dateMatch.getDate()}</td>
						<td>${match.dateMatch.getHours().toString().length<2?"0"+match.dateMatch.getHours().toString():match.dateMatch.getHours()}:${match.dateMatch.getMinutes().toString().length<2?"0"+match.dateMatch.getMinutes().toString():match.dateMatch.getMinutes()}</td>
						<td>${equipes[match.domicileID]}</td>
						<td>${equipes[match.visiteurID]}</td>
					</tr>`;
			}
		});
	</script>

</body>
<!---Footer--->

<?php
include_once(DOSSIER_BASE_INCLUDE . 'vues/inclusions/footer.inc.php');
?>

</html>