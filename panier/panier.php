<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			include('../global/panierFonction.php');
			$localisation = "Panier";
            if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			}
		?>
		<title>Panier | Ananké</title>
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
							<div class="col-md p-0">
								<p class="text-center titre">1. Panier</p>
								<hr id="separateur-panier-actif">
							</div>
							<!-- Adresse de livraison -->
							<div class="col-md-5 p-0 d-sm-none d-md-block d-none">
								<p class="text-center titre-cache">2. Adresse de livraison</p>
								<hr class="separateur-panier-cache">
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
			<!-- Articles -->
			<div class="container pt-4 pb-4">
				<div class="row">
					<div class="col-lg-8">
						<!-- Liste des articles -->
						<p class="titre-moyen">Liste des articles :</p>
						<hr>
						<span id="PanierArticle"></span>
						<!-- Séparateur pour vue pc -->
						<hr class="d-sm-none d-md-none d-lg-block d-none">
						<!-- Grand séparateur pour vue téléphone -->
						<hr class="mt-4 mb-4 d-md-block d-lg-none d-xl-none separateur-large">
						<!-- Boutons de navigation pour vue pc -->
						<div class="clearfix pb-5 d-sm-none d-md-none d-lg-block d-none">
							<button class="btn btn-primary float-left pl-5 pr-5 mr-3" id="submit" type="submit">Suivant</button>
							<a class="btn btn-secondary pl-5 pr-5 float-left" href="../index.php">Retour</a>
							<a class="btn btn-secondary pl-4 pr-4 float-right" id="vider">Vider le panier</a>
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
							<p class="m-1 float-right texte-panier" id="sous-total"></p>
						</div>
						<!-- Taxes -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Taxes</p>
							<p class="m-1 float-right texte-panier" id="taxes"></p>
						</div>
						<!-- Expédition -->
						<div class="clearfix">
							<p class="m-1 float-left texte-panier">Expédition</p>
							<p class="m-1 float-right texte-panier">A estimer</p>
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
							<a class="btn btn-primary pl-5 pr-5" id="submit-a">Suivant</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-5 pr-5" href="../index.php">Retour</a>
						</div>
						<div class="col-sm-4 mt-2 mt-sm-0">
							<a class="btn btn-secondary pl-4 pr-4" id="vider">Vider le panier</a>
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
		<!-- Ajout du header et footer -->
		<script>
		  presenceSession = "<?php if(empty($_SESSION['panier'])){echo "false"; }else{echo "true";} ?>";
			if(presenceSession == "true"){
				tableau = JSON.parse(JSON.stringify(<?php if(!empty($_SESSION['panier'])){echo json_encode($_SESSION['panier']); }else{echo " ";} ?>));
				tailleTab = "<?php echo compterArticles() ?>";
				$("#PanierArticle").text(" ");
				$("#sous-total").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal();}else{echo "0";} ?> + " €");
				$("#taxes").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal() * 0.2;}else{echo"0";} ?> + " €");
				$("#total").text(<?php if(!empty($_SESSION['panier'])){echo MontantGlobal() * 1.2;}else{echo "0";} ?> + " €");
				for(let i = 0; i < tailleTab; i++){
					idProduit = tableau['idProduit'][i].split(' ')[0];
					$.ajax({
						type: 'POST',
						url: 'bdd/AffichageImag.php',
						dataType: 'text',
						async: false,
						data : {
							id : idProduit
						},
						success: function(data){
							$("#PanierArticle").append('<!-- Article 1 --><div class="container pt-1 pb-1"><div class="row"><!-- Photo --><div class="col-md-2"><img class="mx-auto d-block img-fluid petite-image-panier" src="'+data+'" alt="T-Shirt"></div><!-- Nom et prix --><div class="col-md p-0 p-md-3 align-self-center"><p class="m-0 petit-titre-produit">'+tableau["libelleProduit"][i]+' en '+tableau["tailleProduit"][i]+'</p><p class="m-0 petit-prix-produit">'+tableau["prixProduit"][i]+' €</p></div><!-- Quantité --><div class="col-md-4 m-0 p-0 align-self-center"><form method="post"><div class="form-group m-0"><div class="clearfix"><p class="float-left m-0 ml-md-4 pt-1 pl-xl-4 pl-md-2 texte">Quantité :</p><a class="float-right text-dark align-self-center ml-2 p-1 texte lien-sans-decoration" ><svg class="bi bi-x-circle-fill" width="1.1em" height="1.1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z" id="supprimer-'+idProduit+'-'+tableau["tailleProduit"][i]+'"/></svg></a><input class="form-control float-right m-0 p-2 float-right quantite-produit" id="quantite-produit-'+idProduit+'-'+tableau["tailleProduit"][i]+'" name="quantite-produit" type="number" value="'+tableau["qteProduit"][i]+'" min="1" max="10"></div></div></form></div></div></div>');
						},
						error: function(){
							alert("erreur");
						}
					});
				}
				var tab = document.getElementById("PanierArticle");
				// placer le gestionnaire d'évènements sur tab, qui contient toutes les cellules
				tab.onchange=function(e) {
					if(e.target.id.split('-')[0] + '-' + e.target.id.split('-')[1] === "quantite-produit"){
						idreel = e.target.id.split('-')[2] + " " + e.target.id.split('-')[3];
						$.ajax({
							type: 'POST',
							url: 'bdd/changementQtePanier.php',
							dataType: 'text',
							data : {
								idProduit:idreel,
								qteProduit: $("#"+e.target.id).val()
							},
							success: function(data){
								$("#sous-total").text(data + " €");
								$("#taxes").text(data *0.2 + " €");
								$("#total").text(data * 1.2 + " €");
							},
							error: function(){
								alert("erreur");
							}
						});

					}}
				tab.onclick=function(e){
						console.log(e.target.id);
						if(e.target.id.split('-')[0] === "supprimer"){
							idreel = e.target.id.split('-')[1] + " " + e.target.id.split('-')[2];
							if ( confirm( "Voulez vous vraiment supprimer cette article ?" ) ) {
								$.ajax({
									type: 'POST',
									url: 'bdd/suppressionArticlePanier.php',
									dataType: 'text',
									data : {
										idProduit:idreel,
									},
									success: function(data){
										document.location.href="https://ananke.minarox.fr/panier/panier.php";
									},
									error: function(){
										alert("erreur");
									}
								});
							} else {

							}
						}
				}
				$("#vider").click(function(event){
					event.preventDefault();
				});
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
				nbArticlePanier = "<?php echo compterArticles(); ?>";

			}
			$("#submit").click(function(event){
				if(nbArticlePanier == "0" || presenceSession == "false"){
					event.preventDefault();
				}else{
					window.location.href = "https://ananke.minarox.fr/panier/livraison.php";
				}
			});
			$("#submit-a").click(function(event){
				if(nbArticlePanier == "0" || presenceSession == "false"){
					event.preventDefault();
				}else{
					window.location.href = "https://ananke.minarox.fr/panier/livraison.php";
				}
			});

		</script>
	</body>
</html>
