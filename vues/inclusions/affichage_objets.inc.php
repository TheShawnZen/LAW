<?php

function afficherListeJoueurs($tabJoueurs) {
	echo "<h1>Liste des Joueurs</h1>";
	echo "<ul>";
	foreach ($tabJoueurs as $joueur){
		echo "<li>".$joueur."</li>";
	}
	echo "</ul>";
}

function afficherListeMatchs($tabMatchs) {
	echo "<h1>Liste des matchs</h1>";
	echo "<table class='listtab' border=1>";
	echo "<thead><th>ID</th><th>Domicile</th><th>Visiteur</th><th>Score D</th><th>Score V</th><th id='ddate'>Date</th><th>Match fini</th></thead>";
	foreach ($tabMatchs as $match ) {
		echo "<tr><td>".$match->getId()."</td><td>".$match->getIdDomicile()."</td><td>".$match->getIdVisiteur()."</td>
			<td>".$match->getScoreDomicile()."</td><td>".$match->getScoreVisiteur()."</td><td>".$match->getDateMatch()."</td><td>".$match->getResultatFinal()."</td></tr>";
	}
	echo "</table>";
}
function afficherListeEquipes($tabEquipes) {
	echo "<h1>Liste des équipes</h1>";
	echo "<table class='listtab' border=1>";
	echo "<thead><th>ID</th><th class='tnom'>Nom</th></thead>";
	echo "<tbody>";
	foreach ($tabEquipes as $equipe ) {
		echo "<tr><td>".$equipe->getId()."</td><td>".$equipe->getNom()."</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
}

?>
