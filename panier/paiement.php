<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Panier - Paiement";
            if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			}
		?>
		<title>Panier - Paiement | Ananké</title>
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
			<!-- Paiement -->
			<div class="container pt-4 pb-4">
				<div class="row">
					<div class="col-lg-8">
						<!-- Méthodes de paiement -->
						<p class="titre-moyen">Méthodes de paiement :</p>
						<hr>
						<!-- Choix de la méthode -->
						<form method="post" action="#">
							<!-- Carte de crédit -->
							<div class="container pt-3 pb-1 mb-3 bordures panneau-clair">
								<div class="row mb-3">
									<div class="col-1 p-0 pl-2 mr-n3 align-self-center">
										<div class="form-check m-0 p-0 ml-md-4 ml-sm-3 ml-3 mb-xl-1 pl-1 pb-3">
											<input class="form-check-input" name="carte-credit" type="radio" value="carte-credit">
										</div>
									</div>
									<div class="col-5 p-0 align-self-center">
										<p class="m-0 p-0 ml-3 ml-sm-2 ml-md-0 texte">Carte de crédit</p>
										<p class="m-0 p-0 ml-3 ml-sm-2 ml-md-0 tres-petit-texte">La transaction apparaitra sous 2 à 5 jours</p>
									</div>
									<div class="col-5 p-0 ml-4 ml-md-5 align-self-center text-right">
										<p class="m-0 p-0 texte">Aucun frais supplémentaire</p>
									</div>
								</div>
								<!-- Formulaire pour carte de crédit -->
								<div class="container p-0">
									<!-- Titulaire de la carte -->
									<div class="form-group">
										<input class="form-control bordures" name="titulaire-carte" type="text" maxlength="60" placeholder="Titulaire de la carte" required>
									</div>
									<div class="form-group">
										<div class="row">
											<!-- Numéro de carte -->
											<div class="col pr-3 pr-sm-0 pr-md-3">
												<input class="form-control bordures sans-fleches" name="numero-carte" type="number" min="0" max="9999999999999999" placeholder="Numéro de carte" required>
											</div>
											<!-- Date d'expiration pour vue pc -->
											<div class="col-3 pr-1 pl-1 pr-md-3 pl-md-3 d-none d-sm-block">
												<input class="form-control bordures sans-fleches" name="expiration" type="month" placeholder="Expiration">
											</div>
											<!-- CVV pour vue pc -->
											<div class="col-2 pl-0 pl-md-3 d-none d-sm-block">
												<input class="form-control bordures sans-fleches" name="cvv" type="number" min="0" max="999" placeholder="CVV">
											</div>
											
											<div class="col-sm d-block d-sm-none">
												<div class="row mt-3">
													<!-- Date d'expiration pour vue mobile -->
													<div class="col pr-1">
														<input class="form-control bordures sans-fleches" name="expiration" type="month" placeholder="Expiration">
													</div>
													<!-- CVV pour vue mobile -->
													<div class="col pl-1">
														<input class="form-control bordures sans-fleches" name="cvv" type="number" min="0" max="999" placeholder="CVV">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Paypal -->
							<div class="container pt-3 pb-1 mb-3 bordures panneau-gris">
								<div class="row mb-3">
									<div class="col-1 p-0 pl-2 mr-n3 align-self-center">
										<div class="form-check m-0 p-0 ml-md-4 ml-sm-3 ml-3 mb-xl-1 pl-1 pb-3">
											<input class="form-check-input" name="paypal" type="radio" value="paypal">
										</div>
									</div>
									<div class="col-5 p-0 align-self-center">
										<p class="m-0 p-0 ml-3 ml-sm-2 ml-md-0 texte">Paypal</p>
										<p class="m-0 p-0 ml-3 ml-sm-2 ml-md-0 tres-petit-texte">La transaction apparaitra instantanément</p>
									</div>
									<div class="col-5 p-0 ml-4 ml-md-5 align-self-center text-right">
										<p class="m-0 p-0 texte">2% de frais</p>
									</div>
								</div>
							</div>
						</form>						
						<!-- Séparateur pour vue pc -->
						<hr class="d-sm-none d-md-none d-lg-block d-none">
						<!-- Grand séparateur pour vue téléphone -->
						<hr class="mt-4 mb-4 d-md-block d-lg-none d-xl-none separateur-large">
						<!-- Boutons de navigation pour vue pc -->
						<div class="clearfix pb-5 d-sm-none d-md-none d-lg-block d-none">
							<button class="btn btn-primary float-left pl-5 pr-5 mr-3" id="submit" type="submit">Suivant</button>
							<a class="btn btn-secondary pl-5 pr-5 float-left" href="livraison.php">Retour</a>
							<a class="btn btn-secondary pl-4 pr-4 float-right" id="vider-panier" href="#">Vider le panier</a>
						</div>
					</div>
					<!-- Résumé prix -->
					<div class="col-lg">
						<!-- Titre -->
						<p class="titre-moyen">Résumé :</p>
						<hr>
						<!-- Sous-total -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Sous-total</p>
							<p class="m-1 float-right texte-panier">40€</p>
						</div>
						<!-- Taxes -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Taxes</p>
							<p class="m-1 float-right texte-panier">8€</p>
						</div>
						<!-- Expédition -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Expédition</p>
							<p class="m-1 float-right texte-panier">0€</p>
						</div>
						<!-- Frais de paiement -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Frais de paiement</p>
							<p class="m-1 float-right texte-panier">0€</p>
						</div>
						<hr>
						<!-- Total -->
						<div class="clearfix">
							<p class="float-left total-panier">Total</p>
							<p class="float-right total-panier">48€</p>
						</div>
					</div>
					<!-- Boutons de navigation pour vue téléphone -->
					<div class="row w-100 p-0 m-0 mt-1 mb-3 d-lg-none d-xl-none text-center">
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-primary pl-5 pr-5" href="confirmation.php">Suivant</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-5 pr-5" href="livraison.php">Retour</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-4 pr-4" href="#">Vider le panier</a>
						</div>
					</div>
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
