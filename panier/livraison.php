<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			include('../global/panierFonction.php');
			$localisation = "Panier - Livraison";
			if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			}
		?>
		<title>Panier - Livraison | Ananké</title>
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
							<div class="col-md-5 p-0">
								<p class="text-center titre">2. Adresse de livraison</p>
								<hr id="separateur-panier-actif">
							</div>
							<!-- Paiement -->
							<div class="col-md p-0 d-sm-none d-md-block d-none">
								<p class="text-center titre-cache">3. Paiement</p>
								<hr class="separateur-panier-cache">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Livraison -->
			<div class="container pt-4 pb-4">
				<div class="row">
					<div class="col-lg-8">
						<!-- Adresse de livraison -->
						<p class="titre-moyen">Adresse de livraison :</p>
						<hr>
						<!-- Choix des adresses -->

						<div class="container p-0">
							<div class="row text-center" id="adresse-liste">
								<div class="col-sm-4 col-xl-3 col-md-3 col-lg-4 mt-2 mt-sm-0">
									<!-- Nouvelle adresse -->
									<a class="text-dark lien-sans-decoration" href="#">
										<div class="container p-3 bordures panneau-gris panneau-arrondi" id="nouvelle-adresse">
											<p class="m-0 petit-texte" id="nouvelle-adresse text">Nouvelle adresse</p>
										</div>
									</a>
								</div>
							</div>

						</div>
						<hr>
						<!-- Adresse -->
						<form method="post" action="#">
							<!-- Nom et prénom -->
							<div class="form-group">
								<div class="row">
									<!-- Nom -->
									<div class="col-sm-6">
										<input class="form-control bordures" name="nom" type="text" maxlength="30" placeholder="Nom" required id="formulaire-nom">
									</div>
									<!-- Prénom -->
									<div class="col-sm-6 mt-3 mt-sm-0">
										<input class="form-control bordures" name="prenom" type="text" maxlength="30" placeholder="Prénom" required id="formulaire-prenom">
									</div>
								</div>
							</div>
							<!-- Adresse -->
							<div class="form-group">
								<input class="form-control bordures" name="adresse" type="text" placeholder="Adresse" required id="formulaire-adresse">
							</div>
							<!-- Complément d'adresse -->
							<div class="form-group">
								<input class="form-control bordures" name="complement-adresse" type="text" placeholder="Complément d'adresse" id="formulaire-complement-adresse">
							</div>
							<!-- Ville et code postal -->
							<div class="form-group">
								<div class="row">
									<!-- Ville -->
									<div class="col-sm-8">
										<input class="form-control bordures" name="ville" type="text" maxlength="50" placeholder="Ville" required id="formulaire-ville">
									</div>
									<!-- Code postal -->
									<div class="col-sm-4 mt-3 mt-sm-0">
										<input class="form-control bordures sans-fleches" name="code-postal" type="number" min"00000" max="99999" placeholder="Code postal" required id="formulaire-code-postal">
									</div>
								</div>
							</div>
							<!-- Téléphone portable et téléphone fixe -->
							<div class="form-group">
								<div class="row">
									<!-- Téléphone portable -->
									<div class="col-sm-6">
										<input class="form-control bordures sans-fleches" name="tel-portable" type="number" min="0" max="9999999999" placeholder="Téléphone portable" required id="formulaire-tel-portable">
									</div>
									<!-- Téléphone fixe -->
									<div class="col-sm-6 mt-3 mt-sm-0">
										<input class="form-control bordures sans-fleches" name="tel-fixe" type="number" min="0" max="9999999999" placeholder="Téléphone fixe" id="formulaire-tel-fixe">
									</div>
								</div>
							</div>
							<hr>
							<!-- Méthodes de livraison -->
							<div class="row">
								<div class="col-md-6">
									<!-- Livraison normale -->
									<div class="container p-3 bordures panneau-gris" id="livraison-normale-cadre">
										<div class="row">
											<div class="col-1 m-0 p-0 ml-2 align-self-center">
												<div class="form-check m-0 p-0 pl-4 mb-1 pb-3">
													<input class="form-check-input" name="livraison-normale" type="checkbox" value="livraison-normale"id="livraison-normale">
												</div>
											</div>
											<div class="col m-0 p-0 align-self-center">
												<p class="m-0 p-0 texte">Livraison normale</p>
												<p class="m-0 p-0 tres-petit-texte">2 à 5 jours d'attente</p>
											</div>
											<div class="col-2 m-0 p-0 mr-3 align-self-center text-right">
												<p class="m-0 p-0 texte">Gratuit</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<!-- Livraison rapide -->
									<div class="container mt-2 mt-md-0 p-3 bordures panneau-gris" id="livraison-rapide-cadre">
										<div class="row">
											<div class="col-1 m-0 p-0 ml-2 align-self-center">
												<div class="form-check m-0 p-0 pl-4 mb-1 pb-3">
													<input class="form-check-input" type="checkbox" name="livraison-rapide" value="livraison-rapide" id="livraison-rapide">
												</div>
											</div>
											<div class="col m-0 p-0 align-self-center">
												<p class="m-0 p-0 texte">Livraison rapide</p>
												<p class="m-0 p-0 tres-petit-texte">24 à 48 heures d'attente</p>
											</div>
											<div class="col-2 m-0 p-0 mr-3 align-self-center text-right">
												<p class="m-0 p-0 texte">+ 10€</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<!-- Texte d'information -->
						<p class="petit-texte">Par défaut, l'adresse de facturation est identique à l'adresse de livraison. Si vous souhaitez modifier l'adresse de facturation, vous devez vous rendre dans "<a class="petit-lien" href="../compte/client/mes-adresses.php">Mes adresses</a>".</p>
						<!-- Grand séparateur pour vue téléphone -->
						<hr class="mt-4 mb-4 d-md-block d-lg-none d-xl-none separateur-large">
						<!-- Boutons de navigation pour vue pc -->
						<div class="clearfix pb-5 d-sm-none d-md-none d-lg-block d-none">
							<button class="btn btn-primary float-left pl-5 pr-5 mr-3" id="submit" type="submit">Suivant</button>
							<a class="btn btn-secondary pl-5 pr-5 float-left" href="panier.php">Retour</a>
							<a class="btn btn-secondary pl-4 pr-4 float-right" id="vider" href="#">Vider le panier</a>
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
							<p class="m-1 float-right texte-panier" id="soustotal"></p>
						</div>
						<!-- Taxes -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Taxes</p>
							<p class="m-1 float-right texte-panier" id="taxes"></p>
						</div>
						<!-- Expédition -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Expédition</p>
							<p class="m-1 float-right texte-panier" id="expedition">0 €</p>
						</div>
						<!-- Frais de paiement -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Frais de paiement</p>
							<p class="m-1 float-right texte-panier">A estimer</p>
						</div>
						<hr>
						<!-- Total -->
						<div class="clearfix">
							<p class="float-left total-panier">Total</p>
							<p class="float-right total-panier" id="total"></p>
						</div>
					</div>
					<!-- Boutons de navigation pour vue téléphone -->
					<div class="row w-100 p-0 m-0 mt-1 mb-3 d-lg-none d-xl-none text-center">
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-primary pl-5 pr-5" href="/paiement.php" id="submit-a">Suivant</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-5 pr-5" href="panier.php">Retour</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-4 pr-4" href="#" id="vider">Vider le panier</a>
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


		<script>
			$(document).ready(function(){
				//Permet d'initialiser la livraison en classique
					$.ajax({
						type: 'POST',
						url: 'bdd/prixLivraison.php',
						dataType: 'text',
						data : {
							Livraison : "0"
						},
						success: function(data){
						},
						error: function(){
						}
					});
					ticket = "<?php echo $ticket ?>";
					//Permet d'initialiser le résumé
					$("#soustotal").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal();}else{echo "0";} ?> + " €");
					$("#taxes").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal() * 0.2;}else{echo"0";} ?> + " €");
					$("#total").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal() * 1.2;}else{echo "0";} ?> + " €");
					//Si il y a un compte de connecté
					if(ticket != "Rien"){
						//On regarde le nombre d'adresse
						$.ajax({
							type: 'POST',
							url: 'bdd/nbAdresseUtilisateur.php',
							dataType: 'text',
							data : {
							Identifiant : "<?php if(empty($identifiant) == "0") {echo $identifiant;} else {echo "";} ?>"
							},
							success: function(data){
								//Si il y a au moins une adresse lié au compte
								if(data !== "0"){
									$.ajax({
										type: 'POST',
										url: 'bdd/adresseUtilisateur.php',
										dataType: 'text',
										data : {
										Identifiant : "<?php if(empty($identifiant) == "0") {echo $identifiant;} else {echo "";} ?>"
									},
									success: function(data){
										tableau = JSON.parse(data);
										$.each(tableau,function(i,obj){
											//On rempli la liste des boutosn d'adresse
											//Si le compte est celui de livraison, on l'affiche par défaut
											if(obj.Livraison == '1'){
												$("#formulaire-nom").val(obj.Nom);
												$("#formulaire-prenom").val(obj.Prenom);
												$("#formulaire-adresse").val(obj.Adresse);
												$("#formulaire-complement-adresse").val(obj.ComplementAdresse);
												$("#formulaire-ville").val(obj.Ville);
												$("#formulaire-code-postal").val(obj.CodePostal);
												$("#formulaire-tel-portable").val(obj.TelephonePortable);
												$("#formulaire-tel-fixe").val(obj.Telephone);
												$("#adresse-liste").append('<div class="col-sm-4 col-xl-3 col-lg-3 col-md-3"><!-- Adresse --><a class="text-dark lien-sans-decoration"  href="#"><div class="container p-3 bordures panneau-gris panneau-arrondi" id="adresse '+obj.id+'"><p class="m-0 petit-texte" id="text '+obj.id+'">Adresse '+obj.nombre+'</p></div></a></div>');

											} else {
												$("#adresse-liste").append('<div class="col-sm-4 col-xl-3 col-lg-3 col-md-3"><!-- Adresse --><a class="text-dark lien-sans-decoration"  href="#"><div class="container p-3 bordures panneau-gris panneau-arrondi" id="adresse '+obj.id+'"><p class="m-0 petit-texte" id="text '+obj.id+'">Adresse '+obj.nombre+'</p></div></a></div>');
											}
										});
									},
									error: function(){
										alert("erreur");
									}
								});
								}
							},
							error: function(){
								alert("erreur");
							}
						});
						var tab = document.getElementById("adresse-liste");
						// placer le gestionnaire d'évènements sur tab, qui contient toutes les cellules
						tab.onclick=function(e) {
								if(e.target.id.split(' ')[0] === "text"|| e.target.id.split(' ')[0] === "adresse"){
									$.ajax({
										type: 'POST',
										url: 'bdd/adresseUtilisateurId.php',
										dataType: 'text',
										data : {
										Identifiant :e.target.id.split(' ')[1]
									},
									success: function(data){

										tableau = JSON.parse(data);
										$.each(tableau,function(i,obj){
											//On rempli la liste des boutosn d'adresse
												$("#formulaire-nom").val(obj.Nom);
												$("#formulaire-prenom").val(obj.Prenom);
												$("#formulaire-adresse").val(obj.Adresse);
												$("#formulaire-complement-adresse").val(obj.ComplementAdresse);
												$("#formulaire-ville").val(obj.Ville);
												$("#formulaire-code-postal").val(obj.CodePostal);
												$("#formulaire-tel-portable").val(obj.TelephonePortable);
												$("#formulaire-tel-fixe").val(obj.Telephone);
										});
									},
									error: function(){
										alert("erreur");
									}
								});
							} else if(e.target.id.split(' ')[0] === "nouvelle-adresse"){
								$("#formulaire-nom").val(" ");
								$("#formulaire-prenom").val(" ");
								$("#formulaire-adresse").val(" ");
								$("#formulaire-complement-adresse").val(" ");
								$("#formulaire-ville").val(" ");
								$("#formulaire-code-postal").val(" ");
								$("#formulaire-tel-portable").val(" ");
								$("#formulaire-tel-fixe").val(" ");
							}
						}
					}
					//Permet d'éviter le rechargement des pages
					$("#vider").click(function(event){
						event.preventDefault();
					});
					//Vide le panier après un message de confirmation, redirige ensuite vers la page panier
					$("#vider").click(function(){
						if ( confirm( "Voulez vous vraiment vider votre panier ?" ) ) {
							$.ajax({
								type: 'POST',
								url: 'bdd/suppressionPanier.php',
								dataType: 'text',
								data : {
								},
								success: function(data){
									document.location.href="https://ananke.minarox.fr/panier/panier.php";
								},
								error: function(){
									alert("erreur");
								}
							});
					 }else{}
					});
					//Gère les boutons de choix de mode de livraison
				$("#livraison-rapide").click(function(event){
					if($("#livraison-rapide").is(':checked') == true){
						$.ajax({
							type: 'POST',
							url: 'bdd/prixLivraison.php',
							dataType: 'text',
							data : {
								Livraison : "10"
							},
							success: function(data){
								$("#expedition").text("10 €");
								$("#total").text(data  * 1.2 + 10 + " €");
								$("#livraison-normale").prop("checked", false);
							},
							error: function(){
								alert("erreur");
							}
						});
					} else {
						$.ajax({
							type: 'POST',
							url: 'bdd/prixLivraison.php',
							dataType: 'text',
							data : {
								Livraison : "0"
							},
							success: function(data){
								$("#expedition").text("0 €");
								$("#total").text(data * 1.2 + " €");
							},
							error: function(){
								alert("erreur");
							}
						});

					}
				});
				$("#livraison-normale").click(function(event){
					if($("#livraison-normale").is(':checked') == true){
						$.ajax({
							type: 'POST',
							url: 'bdd/prixLivraison.php',
							dataType: 'text',
							data : {
								Livraison : "0"
							},
							success: function(data){
								$("#expedition").text("0 €");
								$("#total").text(data  * 1.2 + " €");
								$("#livraison-rapide").prop("checked", false);
							},
							error: function(){
								alert("erreur");
							}
						});
					}
				});


			});
		</script>
	</body>
</html>
