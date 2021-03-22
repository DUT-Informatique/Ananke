<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Panier - Erreur";
            if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			}
		?>
		<title>Panier - Erreur | Ananké</title>
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
			<!-- Texte d'erreur -->
			<div class="container pt-5 pb-4">
				<!-- Titre d'erreur achat -->
				<p class="text-center titre">Il y a eu un problème...</p>
				<!-- Texte d'erreur achat -->
				<p class="text-center texte">La commande ne s'est pas bien déroulé et à été annulée.<br>
				Vous n'avez pas été débité.</p>
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
