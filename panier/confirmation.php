<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Panier - Confirmation d'achat";
            if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			}
		?>
		<title>Panier - Confirmation d'achat | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Barre d'avancée de la commande -->
				<div class="container-lg p-4">
					<div class="container-lg">
						<div class="row">
							<!-- Panier -->
							<div class="col-md p-0 d-sm-none d-md-block d-none">
								<p class="text-center titre-cache">1. Panier</p>
								<hr class="separateur-panier-cache">
							</div>
							<!-- Adresse de livraison -->
							<div class="col-md-5 p-0 d-sm-none d-md-block d-none">
								<p class="text-center titre-cache">2. Adresse de livraison</p>
								<hr class="separateur-panier-cache">
							</div>
							<!-- Paiement -->
							<div class="col-md p-0">
								<p class="text-center titre">3. Paiement</p>
								<hr id="separateur-panier-actif">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Texte de confirmation -->
			<div class="container-md pt-5 pb-4">
				<!-- Titre confirmation achat -->
				<p class="text-center titre">Merci de votre achat !</p>
				<!-- Texte confirmation achat -->
				<p class="text-center texte">Votre commande à bien été accepté et vos articles sont en cours de préparation.<br>
				Un mail récapitulatif vient de vous être envoyé.</p>
				<!-- Bouton de retour -->
				<div class="form-group pt-5 text-center">
					<a class="btn btn-secondary pl-5 pr-5" href="../index.php">Retour</a>
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
