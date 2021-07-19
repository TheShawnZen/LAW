<?php if (!isset($controleur)) {
	header("Location: ../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nos Équipes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS; ?>/css/equipes_style.css" rel="stylesheet">
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
				DOSSIER_BASE_LIENS . "?action=gererMatchs||Gérer Équipes||active_nav",
				DOSSIER_BASE_LIENS . "?action=gererEquipes||Gérer Matchs||",
				DOSSIER_BASE_LIENS . "?action=voirClassement||Classement||"
			];
			$tabAbout = DOSSIER_BASE_LIENS . "?action=voirAPropos||À Propos||";
			$tabLogin = DOSSIER_BASE_LIENS . "?action=seDeconnecter||Se Déconnecter||";

			// modification pour utilisateur
			if ($controleur->getActeur() == "visiteur") {
				$tabOptions[2] = DOSSIER_BASE_LIENS . "?action=voirEquipes||Nos Équipes||active_nav";
				$tabOptions[3] = DOSSIER_BASE_LIENS . "?action=voirMatchs||Horaire|| ";
				$tabLogin = DOSSIER_BASE_LIENS . "?action=seConnecter||Se connecter||";
			}
			afficherMenu($tabOptions, $tabLogin, $tabAbout);
			?>
		</div>
	</nav>

	<div id="contenu">
		<div class="content">
			<h2>Équipes</h2>
			<p>Cliquez sur une équipe pour voir la liste des joueurs:</p>
			<?php
			$tabEquipes = $controleur->getTabEquipes();
			$tabJoueurs = $controleur->getTabJoueurs();
			$tabFicheJoueurs = $controleur->getTabFicheJoueurs();
			?>

			<div class="tab" id="boutons">

			</div>

			<div id="equipes">

			</div>

			<div class="legende">
				<table>
					<tr>
						<th colspan="2">Légende</th>
					</tr>
					<tr>
						<td>PJ:</td>
						<td>Parties jouées</td>
					</tr>
					<tr>
						<td id="tdd">P:</td>
						<td>Points</td>
					</tr>
					<tr>
						<td>LE:</td>
						<td>Lancer entré</td>
					</tr>
					<tr>
						<td>TP:</td>
						<td>Trois points</td>
					</tr>
					<tr>
						<td>LFE:</td>
						<td>Lancer franc entré</td>
					</tr>
					<tr>
						<td>LFL:</td>
						<td>Lancer franc lancé</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var equipes = [];

		// pour chaque équipe, on prend les statistiques qui nous intéressent de chacun de ses joueurs
		<?php foreach ($tabEquipes as $equipes => $v) { ?>
			equipes.push({
				nom: "<?php echo ($v->getNom()); ?>",
				id: "<?php echo ($v->getId()); ?>",
				joueurs: [
					<?php foreach ($tabJoueurs as $joueurs => $joueur) {
						if ($v->getId() == $joueur->getIdequipe() && $joueur) {
							echo "{idJoueur:'" . $joueur->getIdJoueur() . "'," . "nom:'" . $joueur->getNom() . "'," . "idequipe:'" . $joueur->getIdequipe() . "'," . "fiche:{";
							foreach ($tabFicheJoueurs as $fiches => $fiche) {
								if ($fiche->getIdJoueur() == $joueur->getIdJoueur()) {
									echo "Nom:'" . ($joueur->getNom() ? $joueur->getNom() : "") . "',";
									echo "PJ:'" . ($fiche->getNombreMatch() ? $fiche->getNombreMatch() : $fiche->getNombreMatch()) . "',";
									echo "P:'" . ($fiche->getPoints() ? $fiche->getPoints() : $fiche->getPoints()) . "',";
									echo "LE:'" . ($fiche->getLancerEntre() ? $fiche->getLancerEntre() : $fiche->getLancerEntre()) . "',";
									echo "TP:'" . ($fiche->getTroisPoints() ? $fiche->getTroisPoints() : $fiche->getTroisPoints()) . "',";
									echo "LFE:'" . ($fiche->getLancerFrancEntre() ? $fiche->getLancerFrancEntre() : $fiche->getLancerFrancEntre()) . "',";
									echo "LFL:'" . ($fiche->getLancerFrancLance() ? $fiche->getLancerFrancLance() : $fiche->getLancerFrancLance()) . "'";
								}
							}
							echo "}},";
						}
					} ?>
				]
			});
		<?php } ?>

		// crée les boutons ayant le nom de chaque équipe ainsi que les tables respectives
		const créerDivs = () => {
			for (let i = 0; i < equipes.length; i++) {
				document.getElementById("boutons").innerHTML += `<button class="tablinks" onclick="ouvreClassement(event, ${(equipes[i].nom).split(" ").join("")})">${equipes[i].nom}</button>`;
			}
			for (let i = 0; i < equipes.length; i++) {
				document.getElementById("equipes").innerHTML += `
						<div id="${equipes[i].nom.split(" ").join("")}" class="tabcontent">
							<h3>${equipes[i].nom}</h3>
							<table class="classement" id="table${equipes[i].nom.split(" ").join("")}"></table>
						</div>`;
			}
		}

		// titre de colonnes
		function generateTableHead() {
			equipes.forEach(e => {
				let table = document.getElementById("table" + e.nom.split(" ").join(""));
				let data = e.joueurs.length > 0 ? Object.keys(e.joueurs[0].fiche) : "Aucun joueur";
				let thead = table.createTHead();
				let row = thead.insertRow();
				if (e.joueurs.length > 0) {
					for (let key of data) {
						let th = document.createElement("th");
						let text = document.createTextNode(key);
						th.appendChild(text);
						row.appendChild(th);
					}
				} else {
					let th = document.createElement("th");
					let text = document.createTextNode("Aucun joueur");
					th.appendChild(text);
					row.appendChild(th);
				}
			});
		}

		// lignes
		function generateTable() {
			equipes.forEach(equipe => {
				let table = document.getElementById("table" + equipe.nom.split(" ").join(""));
				for (let joueur of equipe.joueurs) {
					let row = table.insertRow();
					for (key in joueur.fiche) {
						let cell = row.insertCell();
						let text = document.createTextNode(joueur.fiche[key]);
						cell.appendChild(text);
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