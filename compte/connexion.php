<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Connexion";
		?>
		<title>Connexion | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container pt-4 pb-2">
					<h1 class="text-center titre">Connexion</h1>
					<hr id="petit-separateur">
					<p class="text-center texte">Vous n'avez pas de compte ?<br>
						<a class="lien" href="inscription.php">Créer mon compte</a>
					</p>
				</div>
			</div>

			<!-- Formulaire de connexion -->
			<div class="container pt-5 pb-4">
				<form method="post" action="#">
					<!-- Adresse mail -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="adresse-mail">Adresse mail</label>
						<input class="form-control bordures" id="adresse-mail" type="email" name="adresse-mail" required>
					</div>
					<!-- Mot de passe -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="mdp">Mot de passe</label>
						<input class="form-control bordures" type="password" id="mdp" name="mdp" required>
						<a class="lien" id="mdp-oublie" href="mdp-perdu.php" >Mot de passe oublié ?</a>
					</div>
					<!-- Bouton de connexion -->
					<div class="form-group pt-4 text-center">
						<button class="btn btn-primary pl-4 pr-4" type="submit" id="submit">Se connecter</button><br />
						<span id="compte_inactif"></span>
					</div>
				</form>
			</div>
		</div>

		<!-- Ajout du header et footer -->
		<?php
			include('../global/footer.php');
			include('../global/header.php');
		?>

		<!-- Scripts -->
		<script>
			$("#submit").click(function(event){
				event.preventDefault();
			});
			$('#submit').keypress(function(e){
				if(e.which == 13){
						$('#submit').click(); //Simule le clic sur le bouton Envoyer
				}
			});
			$(document).ready(function() {
				$('#mdp').bind('paste', function (e) {
						e.preventDefault();
				});
				$('#submit').click(function() {
					valeuruser = $("#adresse-mail").val();
					valeurmdp = $("#mdp").val();
					console.log(valeuruser);
					$.ajax({
						type: 'POST',
						url: 'bdd/coscript.php',
						dataType: 'text',
						data : {username:valeuruser,
						password:valeurmdp},

						success: function(data){
							console.lo
							if(data === "correct"){
								window.location="https://ananke.minarox.fr/index.php";
							}
							else{
								$("#compte_inactif").text(data);
								$("#compte_inactif").css('color', 'red');
							}
						},
						error: function(){
							alert("erreur");
						}
					});
				});
			});
		</script>
	</body>
</html>
