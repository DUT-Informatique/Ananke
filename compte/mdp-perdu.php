<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Mot de passe perdu";
		?>
		<title>Mot de passe perdu | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte de mot de passe perdu -->
				<div class="container p-4">
					<h1 class="text-center titre">Mot de passe oublié</h1>
					<hr id="petit-separateur">
					<p class="text-center texte">Entrez l'adresse mail de votre compte</p>
				</div>
			</div>

			<!-- Formulaire de mot de passe perdu -->
			<div class="container p-5">
				<form method="post" action="#">
					<!-- Adresse mail -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="adresse-mail">Adresse mail</label>
						<input class="form-control" type="email" id="adresse-mail" name="adresse-mail" required>
						<span id="adresse-mailErreur"></span>
					</div>
					<!-- Bouton de récupération de mot de passe -->
					<div class="form-group pt-4 text-center">
						<button class="btn btn-primary pl-4 pr-4" id="submit" type="submit">Récupérer le mot de passe</button>
					</div>
					<!-- Bouton de retour -->
					<div class="form-group text-center">
					  <a class="btn btn-secondary pl-5 pr-5" href="connexion.php">Retour</a>
				  	</div>
				</form>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('../global/footer.php');
			include('../global/header.php');
		?>
		
		<script>
			$("#submit").click(function(event){
				event.preventDefault();
			});
			$("#submit").click(function(){
				$.ajax({
					type: 'POST',
					url: 'bdd/mailverification.php',
					dataType: 'text',
					data : {username:$("#adresse-mail").val()
					},
					success: function(data){
						if(data === "erreurNonExistant"){
							$("#adresse-mailErreur").text("L'adresse n'existe pas !");
							$("#adresse-mailErreur").css('color', 'red');
							console.log(data);
						}
						else{
							$("#adresse-mailErreur").text("Mail envoyé !");
							$("#adresse-mailErreur").css('color', 'Green');
							console.log(data);
						}
					},
					error: function(){
						alert("erreur");
					}
				});
			});
		</script>
	</body>
</html>
