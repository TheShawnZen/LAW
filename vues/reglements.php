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
	<title>Règlements</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/AW_mini_icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/nav_style.css" rel="stylesheet">
	<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/reglements_style.css" rel="stylesheet">
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
		<h1>Règlements généraux<h1>

<h4>AfterWork Basketball est une ligue de basketball pour les travailleurs qui désirent pratiquer leur sport favori avec leurs collègues et compétitionner avec

d'autres travailleurs de diverses entreprises.  Les équipes d'amis sont également acceptée.  Il n’y a pas de niveau préetabli mais le plaisir est de mise.</h4>

<h3>La saison comprend</h3>

<p>10 parties arbirtrees</p>

<p>Series eliminatoires pour les equipes qui se qualifient</p>

<p>1 Jersey</p>

<p>Statistiques individuelles et par equipe</p>

<p>Prix pour l'équipe gagnante</p>



<h3>Qui peut jouer</h3>

<p>Tout personne de 18 ans et plus qui veut jouer au basketball dans un environnement encadre et securitaire.</p>



<h2>Composition d'une équipe</h2>

<p>Une equipe est formee de 10 joueurs minimum *OBLIGATOIRE* et de 15 joueurs au maximum.  2 filles/femmes au minimum doivent faire partie de lequipe.</p>



<h3>Inscription</h3>

<p>L'inscription doit se faire sur le site www.afterworkleagues.com. Chaque joueur devra completer son inscription et acquitter les frais d'inscription pour

pouvoir jouer dans la ligue *AU MOINS 2 SEMAINES AVANT LE DEBUT DE LA SAISON*.  Seules les équipes de 10 joueurs minimum seront acceptees.</p>



<h3>Deroulement d'un match</h3>

<p>Les parties debutent a lheure indiquee sur lhoraire. Les joueurs peuvent se presenter 10 minutes avant le début du match afin de se réchauffer.  Toutes les parties se jouent 5 joueurs contre 5 joueurs.  1 fille doit être en tout temps sur le terrain.  Une partie est constituée de 4 periodes de 8 minutes chacune.

Un arbitre appellera les fautes et dirigera la partie.  Les points seront comptabilisés par les officiels  mineurs d'AW.  Une feuille de pointage sera completée par partie.  A defaut davoir le nombre de joueurs adequats sur le terrain soit 1 joueuse minimum et 4 joueurs, une equipe aura jusqu'a la fin de la premiere mi-temps pour remplir ces exigences ou elle perdra automatiquement la partie.  La partie sera jouee tout de même.</p>



<h3>Règles</h3>

<p>Les règles générales du basketball s'appliquent.  Un panier reussi vaut 2 points et un lancer derriere la ligne de 3pts la plus eloignée vaut 3 points</p>



<p>Les équipes disposent de 2 temps d'arrêt dans la premiere demie et de 3 temps darret a la 2e demie.  Lequipe perd un temps darret sil nest pas utilise avant les 2 dernieres minutes du match.

Chaque partie jouee rapporte 1 POINT DETHIQUE automatique a l'equipe; une victoire rapporte 2 points supplementaires. Une equipe qui recoit 2 fautes techniques lors de la meme partie perd automatiquement son POINT DETHIQUE . En cas degalite au classement finale de la saison reguliere, une equipe avec un nombre superieur de POINTS DETHIQUE  aura l'avantage sur les autres équipes.</p>



<p>Un joueur doit avoir joue au moins 4 parties durant la session pour pouvoir jouer dans les séries eliminatoires.


Un joueur qui démontre une attitude anti sportive pourra être éjecté de la partie par l'arbitre ou par un employé d'AW.</p>



<h3>Statistiques<h3>

<p>1 victoire sans technique =         2 points</p>

<p>1 defaite sans technique  =         0 point</p>

<p>1 nulle sans technique     =         1 points </p>



<h3>Comportement/attitude</h3>

<p>Une attitude adequate est requise en tout temps.  Le respect des autres, de l'équipement, des lieux et du personnel dAW est de mise.  Aucun ecart de conduite ne sera tolere.  Les fautifs pourront etre ejecte dune partie et/ou de la ligue sans remboursement.</p>





<h3>Site internet</h3>

<p>AW sengage a mettre le site internet à jour avec les pointages d'équipe, les pointages individuels, classements, horaires, etc. au maximum 48h après une partie jouée.</p>




<h3>Structure des series éliminatoires</h3>

<p>Voir l'horaire de la saison</p>



<h4>Programme remboursement des frais d'activité physique par l'employeur

Certains employeurs offrent la possibilité de vous rembourser une partie des frais reliés a de lactivite physique.  Verifiez aupres de votre employeur.</h4>



<h3>Accidents/blessure</h3>

<p>Il est primordial de jouer de façon securitaire.  Un rapport d'événement sera rempli pour tout accident et blessure.</p>





 ********************************************ENGLISH*******************************************

<h1>General Rules</h1>

<h4>AfterWork Basketball is a basketball league for workers who wants to practice their favorite sport with their colleagues and compete with other workers from other companies.  Teams composed of friends are also accepted. Theres no pre-established level but fun is guaranteed.</h4>  <h3>The season includes</h3>

<p>10 games with referees</p>

<p>Playoffs for qualifying teams</p>

<p>1 Jersey</p>

<p>Individual and team stats</p>

<p>Website with pics and more</p>

<p>Price for winning team</p>



<h3>Who can play?</h3>

<p>Anyone over 18 years who wants to play basketball in a safe and regulated environment. </p>



<h2>Team</h2>

<p>A team is composed of a minimum 10 players (MANDATORY) and a maximum of 15 players. At least 2 girls must be part of the team.</p>



<h3>Registration</h3>

<p>Registration must be complete on AWs website : www.afterworkleagues.com.  Each player must have completed his registration  and must have paid the fees in

order to play in the league *AT THE LATEST 2 WEEKS BEFORE THE BEGINNING OF THE SEASON*..  Teams must be minimum 10 players.</p>



<h3>Course of a game</h3>

<p>A game starts at the indicated time on the schedule. Every game are played 5 on 5 with 1 girl on the court at all-time.  A game is 4 periods of 8 minutes each.  A federated referee will lead the game.  Points will be accounted for by AWs minor officials.  A score sheet will be completed for each game.  Teams without the required amount of player will  have until the end of the first half or they willautomatically lose the game by forfeit.  The game will still be played.<p>



<h3>Rules</h3>

<p>General basketball rules are applicables.  A basket made is 2 points and a basket made from downtown (farest line) is 3 points. A player with an unsportsmanlike attitude could be ejected from the game or the league by a referee or an AW employee.</p>

<p>Teams have 2 timeouts in the first half and 3 in the second half.  A timeout is lost if not taken before the last 2 minutes of the game.

Each game played gives 1 ETHICAL POINT.  A win gives you 2 more points.  A team that gets 2 technical fouls in a game will automatically lose 1 ETHICAL POINT.  In case of a draw in the standings, the team with the most ETHICAL POINT will have the advantage over the other teams.</p>

To be elligle to play in the playoffs, a player must have played at least 4 games in the regular season.</p>

<h3>Website</h3>

<p>Website will be updated with scores, individual stats, ranking, schedule, etc.. in a maximum of 48h after a game is played.</p>



<h3>Stats</h3>

<p>1 win without any technical fouls=           2 points</p>

<p>1 loss without any technical fouls=          0 point</p>

<p>1 tie without any technical fouls=            1 point</p>



<h3>Playoffs</h3>

<p>See schedule</p>



<h4>Employers reimbursement for physical activities program

Some employers offer a reimbursement for physical activities such as leagues.Verify with your employer.</h4>



<h3>Accidents</h3>

<p>You must play safe.  An event report will be filled in case of an accident.</p>
	</div>


</body>
<!---Footer--->
<?php
	include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/footer.inc.php');
?>

</html>
