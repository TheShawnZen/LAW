<link href="<?php echo DOSSIER_BASE_LIENS;?>/css/admin_style.css" rel="stylesheet">
	<div id="popup_login_admin" class="modal login">
		<form class="modal-content animate login" action="vues/accueil.php" method="post">
			<div class="imgcontainer login">
				<span onclick="document.getElementById('popup_login_admin').style.display='none'" class="close login"
					title="Close Modal">&times;</span>
			</div>
			<div class="container login">
				<?php
					include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/affichage_erreurs.inc.php");
					if (count($controleur->getMessagesErreur()) != 0) {
						afficherListeErreurs($controleur->getMessagesErreur());
					}
				?>
				<label for="uname" class="login"><b>Nom d'utilisateur</b></label>
				<input name="utilisateur" type="text" class="login" placeholder="Saisir votre nom d'utilisateur" name="uname" required>

				<label for="psw"><b>Mot de passe</b></label>
				<input name="motPasse" type="password" class="login" placeholder="Saisir votre mot de passe" name="psw" required>

				<button type="submit" class="login">Se connecter</button>
				<label>
					<input type="checkbox" class="login" checked="checked" name="remember"> Se souvenir de moi
				</label>
			</div>

			<div class="container login" style="background-color:#f1f1f1">
				<button type="button" class="login cancelbtn"
					onclick="document.getElementById('popup_login_admin').style.display='none'">Annuler</button>
				<span class="psw login"><a href="#">Mot de passe oublié?</a></span>
			</div>
		</form>
	</div>