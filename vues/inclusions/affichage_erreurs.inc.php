<?php

function afficherListeErreurs($listeErreurs) {
	echo "<h2 class='erreur'>Erreurs</h2>";
	echo "<ul class='erreur'>";
	foreach ($listeErreurs as $erreur){
		echo "<li>".$erreur."</li>";
	}
	echo "</ul>";
}

?>