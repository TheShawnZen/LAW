<?php
	// Définition des constantes pour les chemins absolus 
	define("DOSSIER_BASE_LIENS", "/LAW"); 
	define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."/LAW/");
	//Inclusion de la manufacture de controleur
	include_once(DOSSIER_BASE_INCLUDE."controleurs/manufactureControleur.class.php");
	
	
	//Obtenir le bon controleur
	if (!ISSET($_GET['action'])) {
		$action = ""; 
	} else {
		$action = $_GET['action'];
	}
	
	$controleur = ManufactureControleur::creerControleur($action);
	
	// Executer l'action et obtener le nom de la vue
	$nomVue=$controleur->executerAction();
	
	// inclure la bonne vue
	include_once(DOSSIER_BASE_INCLUDE."vues/".$nomVue.".php");
?>
