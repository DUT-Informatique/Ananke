<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Confirmation de l'adresse mail";
		?>
		<title>Confirmation de l'adresse mail | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte de connexion -->
				<div class="container p-4">
					<h1 class="text-center titre">Validation de l'inscription</h1>
				</div>
			</div>
			<!-- Texte de confirmation -->
			<div class="container-md pt-5 pb-4">
				<!-- Texte confirmation -->
				<p class="text-center texte">Votre inscription à bien été prise en compte.<br>
				Vous devez a présent valider et activer votre compte en cliquant sur le lien présent dans le mail que nous vous avons envoyé.</p>
				<!-- Bouton de retour -->
				<div class="form-group pt-5 text-center">
					<a class="btn btn-secondary pl-5 pr-5" href="../../index.php">Retour</a>
				</div>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('../global/footer.php');
			include('../global/header.php');
		?>
	</body>
</html>
