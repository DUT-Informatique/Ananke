<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('global/head.php');
			require('global/bd.php');
			include('global/gestionSession.php');
			$localisation = "A propos";
		?>
		<title>A propos | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container p-4">
					<h1 class="text-center titre">A propos de Ananké</h1>
				</div>
			</div>
			
			<!-- Textes et adresse -->
			<div class="container-lg pt-5 pb-4">
				<!-- Description de l'entreprise -->
				<p class="text-center texte">Ananke est une jeune entreprise vendant tout style de vêtements,<br>
                    allant des pantalons aux chaussures en passant par les pulls,<br>
                    pour les hommes, les femmes, et les enfants, vous trouverez tout ce que vous voudrez ici.<br>
                    L'entreprise est tout le temps à votre écoute si vous avez le moindre problème.<br>
                    N'hésitez pas à noter nos produits !
                </p>
				<hr>
				<!-- Adresse de l'entreprise -->
				<div class="container-md" id="panneau-carte">
					<div class="row">
						<div class="col-md text-right">
							<!-- Carte -->
							<div id="carte">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.4744995996352!2d3.86501181571407!3d43.57583196544777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b6afc80bf9fcb1%3A0x687a784645025bc9!2zQW5hbmvDqQ!5e0!3m2!1sfr!2sfr!4v1591571468615!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
								</iframe>
							</div>
						</div>
						<!-- Informations adresse -->
						<div class="col-md pt-xl-3 text-left">
							<h3 class="titre-moyen">Adresse :</h3>
							<p class="texte">1400 Rue de la Castelle</p>
							<p class="texte">34070, Montpellier</p>
							<p class="texte">(+33) 04 90 34 56 46</p>
							<p class="texte">contact@minarox.fr</p>
						</div>
					</div>
				</div>
				<hr>
				<!-- Termes et conditions et politique de confidentialité -->
				<div class="row">
					<div class="col-sm mr-sm-2 text-center">
						<a class="texte-conditions" href="mentions/mentions-legales.php" onclick="window.open(this.href); return false;">Mentions légales</a>
					</div>
					<div class="col-sm ml-sm-2 text-center mt-2 mt-sm-0">
						<a class="texte-conditions" href="mentions/politique-confidentialite.php" onclick="window.open(this.href); return false;">Politique de confidentialité</a>
					</div>
				</div>
				<!-- Bouton de retour -->
				<div class="form-group pt-5 text-center">
					<a class="btn btn-secondary pl-5 pr-5" href="index.php">Retour</a>
				</div>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('global/footer.php');
			include('global/header.php');
		?>
	</body>
</html>
