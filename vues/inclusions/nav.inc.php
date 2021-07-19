<?php
function afficherMenu($tabOptionMenu, $tabLogin, $tabAbout) {

	echo"
				<div class='collapse navbar-collapse' id='navbarResponsive'>
				<ul class='navbar-nav ml-auto custom-text'>";
					foreach($tabOptionMenu as $option) {
						$tab = explode("||", $option);
						echo "<li class='nav-item'>
							<a class='nav-link text-body ".$tab[2]."' href='".$tab[0]."'>".$tab[1]."</a>
							</li>";
					}
				$tab1 = explode ("||", $tabAbout);
			echo"<li class='nav-item'>
						<div class='dropdown'>
							<a class='nav-link text-body ".$tab1[2]."' href='".$tab1[0]."'>".$tab1[1]."</a>
							<div class='dropdown-content'>
								<a href='?action=voirPhotos'>Photos</a>
								<a href='?action=voirReglements'>Règlements</a>
							</div>
						</div>
					</li>";
				$tab2 = explode ("||", $tabLogin);
			echo	"<li class='nav-item'>
						<a class='nav-link text-body ".$tab2[2]."'	href=".$tab2[0].">".$tab2[1]."</a>
					</li>
				</ul>
			</div>
		";
	}

?>
