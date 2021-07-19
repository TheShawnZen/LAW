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
	<title>Classement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/admin_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/classement_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/footer.css" rel="stylesheet">
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
			include_once(DOSSIER_BASE_INCLUDE . 'vues/inclusions/nav.inc.php');
			//admin
			$tabOptions = [
				DOSSIER_BASE_LIENS . "||||",
				DOSSIER_BASE_LIENS . "||Accueil||",
				DOSSIER_BASE_LIENS . "?action=gererMatchs||Gérer Équipes|| ",
				DOSSIER_BASE_LIENS . "?action=gererEquipes||Gérer Matchs|| ",
				DOSSIER_BASE_LIENS . "?action=voirClassement||Classement||active_nav"
			];
			$tabAbout = DOSSIER_BASE_LIENS . "?action=voirAPropos||À Propos ||";
			$tabLogin = DOSSIER_BASE_LIENS . "?action=seDeconnecter||Se Déconnecter ||";

			// modification pour utilisateur
			if ($controleur->getActeur() == "visiteur") {
				$tabOptions[2] = DOSSIER_BASE_LIENS . "?action=voirEquipes||Nos Équipes|| ";
				$tabOptions[3] = DOSSIER_BASE_LIENS . "?action=voirMatchs||Horaire||";
				$tabLogin = DOSSIER_BASE_LIENS . "?action=seConnecter||Se connecter||";
			}
			afficherMenu($tabOptions, $tabLogin, $tabAbout);

			?>
		</div>
	</nav>

	<div class="content">
		<h2>Classement</h2>
		<p>Cliquez sur une saison pour voir le classement:</p>

		<?php
		$tabMatchs = $controleur->getTabMatchs();
		$tabEquipes = $controleur->getTabEquipes();
		$tabSaisons = $controleur->getTabSaisons();
		?>

		<div class="tab" id="boutons">

		</div>

		<div id="saisons">

		</div>
	</div>
	<script>
		var matchs = [],
			equipesParSaison = {};
		var iter0 = 0;
		
		// mettre les objets litéraux matchs dans le tableau match
		<?php foreach ($tabMatchs as $matchs => $m) { ?>
			matchs.push({
				id: "<?php echo $m->getId(); ?>",
				saison: "<?php echo $m->getSession(); ?>",
				domicileID: "<?php echo $m->getIdDomicile(); ?>",
				visiteurID: "<?php echo $m->getIdVisiteur(); ?>",
				domicileScore: "<?php echo $m->getScoreDomicile(); ?>",
				visiteurScore: "<?php echo $m->getScoreVisiteur(); ?>",
				gagnantId: <?php
					if ($m->getResultatFinal()) {
						if ($m->getScoreDomicile() > $m->getScoreVisiteur()) {
							echo $m->getIdDomicile();
						} elseif ($m->getScoreDomicile() < $m->getScoreVisiteur()) {
							echo $m->getIdVisiteur();
						} else {
							echo "'NUL'";
						}
					} else echo "'NA'"; ?>
			});
		<?php } ?>

		// peupler tableau des saisons
		var peupler1 = () => {
			<?php foreach ($tabSaisons as $saisons => $s) { ?>
				equipesParSaison[<?php echo '"' . $s->getSession() . '"' ?>] = [];
			<?php } ?>
		};
		var peupler2 = () => {
			<?php foreach ($tabSaisons as $saisons => $s) {
				foreach ($tabEquipes as $equipes => $e) { ?>
					equipesParSaison[<?php echo '"' . $s->getSession() . '"' ?>].push({
						<?php echo '"ID":"' . $e->getId() . '","Nom"' ?>: <?php echo '"' . $e->getNom() . '", "Points":0, "Victoires":0, "Défaites":0, "Nuls":0' ?>
					});
				<?php } ?>
			<?php } ?>
			iter0 = 0;
		};

		peupler1();
		peupler2();

		// pour chaque match et équipe, on remplit les informations de chaque partie
		// en comptabilisant les points (2 points par victoire, un par match nul) et les 
		// victoires/défaites respectives par équipe
		matchs.forEach(match => {
			Object.keys(equipesParSaison).forEach(saison => {
				if (match.gagnantId != "NA" && match.saison == saison) {
					var gagnantID = match.gagnantId;
					var dom = match.domicileID,
						vis = match.visiteurID;

					equipesParSaison[saison].forEach(equipe => {
						if (gagnantID == "NUL" && (equipe.ID == dom || equipe.ID == vis)) {
							if (equipe["Nuls"]) {
								equipe["Points"] ? equipe["Points"]++ : equipe["Points"] = 1;
								equipe["Nuls"]++;
							} else equipe["Nuls"] = 1;
						} else if (equipe.ID == gagnantID && (equipe.ID == dom || equipe.ID == vis)) {
							equipe["Victoires"] ? equipe["Victoires"]++ : equipe["Victoires"] = 1;
						} else if ((equipe.ID == dom || equipe.ID == vis) && equipe.ID != gagnantID) {
							equipe["Défaites"] ? equipe["Défaites"]++ : equipe["Défaites"] = 1;
						}
						equipe["Points"] = equipe["Victoires"] * 2 + equipe["Nuls"];
					});
				}
			});
		});

		// trier le classement (de chaque saison) en fonction des points
		Object.keys(equipesParSaison).forEach(saison => {
			equipesParSaison[saison].sort(function(a, b) {
				return b["Points"] - a["Points"];
			});
		});

		// création des boutons saisons
		const créerDivs = () => {
			Object.keys(equipesParSaison).forEach(saison => {
				document.getElementById("boutons").innerHTML += `<button class="tablinks" onclick="ouvreClassement(event, ${saison.split(" ").join("")})">${saison}</button>`;
			});
			Object.keys(equipesParSaison).forEach(saison => {
				document.getElementById("saisons").innerHTML += `
					<div id="${saison.split(" ").join("")}" class="tabcontent">
						<h3>${saison}</h3>
						<table class="classement" id="table${saison.split(" ").join("")}"></table>
					</div>`;
			});
		}

		// titre de colonnes (thead)
		function generateTableHead() {
			Object.keys(equipesParSaison).forEach(saison => {
				let table = document.getElementById("table" + saison.split(" ").join(""));
				let data = Object.keys(equipesParSaison[saison][0]);
				let thead = table.createTHead();
				let row = thead.insertRow();
				for (let key of data) {
					if(key!="ID") {
						let th = document.createElement("th");
						let text = document.createTextNode(key);
						th.appendChild(text);
						row.appendChild(th);
					}
				}
			});
		}

		// lignes
		function generateTable() {
			Object.keys(equipesParSaison).forEach(saison => {
				let table = document.getElementById("table" + saison.split(" ").join(""));
				for (let equipe of equipesParSaison[saison]) {
					let row = table.insertRow();
					if ((equipe["Victoires"]!=0 || equipe["Défaites"]!=0 || equipe["Nuls"]!=0)){
						for (key in equipe) {
							if(key!="ID") {
								let cell = row.insertCell();
								let text = document.createTextNode(equipe[key]);
								cell.appendChild(text);
							}
						}
					}
				}
			});
		}

		//pour changer de tableau quand click sur bouton
		function ouvreClassement(evt, nom) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(nom.querySelector("table").id.toString().substring(5)).style.display = "block";
			evt.currentTarget.className += " active";
		}

		créerDivs();
		generateTableHead();
		generateTable();
	</script>
</body>
<!---Footer--->
<?php
include_once(DOSSIER_BASE_INCLUDE . 'vues/inclusions/footer.inc.php');
?>

</html>