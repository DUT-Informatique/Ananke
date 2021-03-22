<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Inscription";
		?>
		<title>Inscription | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container pt-4 pb-2">
					<h1 class="text-center titre">Inscription</h1>
					<hr id="petit-separateur">
					<p class="text-center texte">Vous avez déjà un compte ?<br>
						<a class="lien" href="connexion.php">Connexion</a>
					</p>
				</div>
			</div>

			<!-- Formulaire d'inscription -->
			<div class="container p-5">
				<form method="post" action="#">
					<!-- Nom -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="nom">Nom</label>
						<input class="form-control bordures" type="text" maxlength="30" id="nom" name="nom" required>
						<span id="nomErreur"></span>
					</div>
					<!-- Prénom -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="prenom">Prénom</label>
						<input class="form-control bordures" type="text" maxlength="30" id="prenom" name="prenom" required>
						<span id="prenomErreur"></span>
					</div>
					<!-- Adresse mail -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="adresse-mail">Adresse mail</label>
						<input class="form-control bordures" type="email" id="adresse-mail" name="adresse-mail" required>
						<span id="adresse-mailErreur"></span>
					</div>
					<!-- Mot de passe -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="mdp">Mot de passe</label>
						<input class="form-control bordures" type="password" id="mdp" name="mdp" required>
					</div>
					<!-- Texte du format du mot de passe -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<p class="m-0 texte">Règles concernant le mot de passe :</p>
						<p class="m-0 texte"><span id="nbCaract">❌</span> doit comporter au moins 10 caractères</p>
						<p class="m-0 texte"><span id="minuscule">❌</span> doit comporter au moins une minuscule</p>
						<p class="m-0 texte"><span id="majuscule">❌</span> doit comporter au moins une majuscule</p>
						<p class="m-0 texte"><span id="special">❌</span> doit comporter au moins un caractère spécial</p>
					</div>
					<!-- Confirmation du mot de passe -->
					<div class="form-group col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<label for="conf-mdp">Confirmation du mot de passe</label>
						<input class="form-control bordures" type="password" name="mdp-verif" id="mdp-verif" required>
						<span id="mdp-verifErreur"></span>
					</div>
					<!-- Case à cocher pour les conditions -->
					<div class="form-group form-check col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
						<input class="form-check-input" type="checkbox" name="conditions" id="conditions" required>
						<label class="form-check-label" for="conditions">J'accepte les <a class="texte-conditions" href="../mentions/mentions-legales.php" onclick="window.open(this.href); return false;">mentions légales</a> ainsi que la <a class="texte-conditions" href="../mentions/politique-confidentialite.php" onclick="window.open(this.href); return false;">politique de confidentialité</a> de Ananké.</label>
						<span id="conditionsErreur"></span>
					</div>
					<!-- Bouton de création du compte -->
					<div class="form-group pt-4 text-center">
						<button class="btn btn-primary pl-4 pr-4" id="submit" type="submit">Créer mon compte</button>
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
			$(document).ready(function(){
				$('#mdp').bind('paste', function (e) {
						e.preventDefault();
				});
				$('#mdp-verif').bind('paste', function (e) {
						e.preventDefault();
				});
				function ajaxMDP(){
					$.ajax({
						type: 'POST',
						url: 'bdd/verificationmdp.php',
						dataType: 'text',
						data : {
							password:$("#mdp").val()
						},
						success: function(data){
							var table = JSON.parse(data);
							if (table.spec == "1"){
								$("#special").text("✅");
							} else {
								$("#special").text("❌");
							}
							if (table.min == "1"){
								$("#minuscule").text("✅");
							} else {
								$("#minuscule").text("❌");
							}
							if (table.maj == "1"){
								$("#majuscule").text("✅");
							} else {
								$("#majuscule").text("❌");
							}
							if (table.nbCar == "1"){
								$("#nbCaract").text("✅");
							} else {
								$("#nbCaract").text("❌");
							}
						},
						error: function(){
							alert("erreurMDP");
						}
					});
				}
				$('#submit').keypress(function(e){
					if(e.which == 13){
							$('#submit').click(); //Simule le clic sur le bouton Envoyer
					}
				});
				$("#submit").click(function(event){
					event.preventDefault();
				});
					console.log("documentready");
					ajaxMDP();
					$('#mdp').keyup(function(e){
						if(e.which == 13){
								$('#submit').click();
						}
						ajaxMDP();
					});
					$(document).on('input', "#mdp", function (){
						ajaxMDP();
					});
					//if(valeuruser.length != 0 && valeurmdp.length != 0 && valeurprenom.length != 0 && valeurnom.length != 0 && valeurmdp == $("#mdp-verif").val() && $("#conditions").checked == true){
						$('#submit').click(function() {
							$.ajax({
								type: 'POST',
								url: 'bdd/verificationmdp.php',
								dataType: 'text',
								async: false,
								data : {
									password:$("#mdp").val()
								},
								success: function(data){
									var compteur = 0;
									var table = JSON.parse(data);
									console.log(table);
									var tmp = 0;
									if (table.spec == "1"){
										tmp += 1;
									}
									if (table.min == "1"){
										tmp+=1;
									}
									if (table.maj == "1"){
										tmp+=1;
									}
									if (table.nbCar == "1"){
										tmp+=1;
									}
									if(tmp == 4){
										compteur +=1;
									}
									var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
									if($("#adresse-mail").val().trim() == "" || regex.test($("#adresse-mail").val()) == false){
										$("#adresse-mailErreur").text("Saisissez une adresse mail valide.");
										$("#adresse-mailErreur").css('color', 'red');

									}
									else{
										compteur+=1;
										$("#adresse-mailErreur").text("");
									}
									if($("#prenom").val().trim() == ""){
										$("#prenomErreur").text("Le prénom est obligatoire.");
										$("#prenomErreur").css('color', 'red');
									}
									else{
										compteur+=1;
										$("#prenomErreur").text("");
									}
									if($("#nom").val().trim() == ""){
										$("#nomErreur").text("Le nom est obligatoire.");
										$("#nomErreur").css('color', 'red');
									}
									else{
										compteur+=1;
										$("#nomErreur").text("");
									}
									if( $('#conditions').is(":checked")){
									   compteur+=1
										 $("#conditionsErreur").text("");
									} else {
										$("#conditionsErreur").text("Veuillez accepter ces conditions.");
										$("#conditionsErreur").css('color', 'red');
									}
									if($("#mdp").val() !== $("#mdp-verif").val()){
										console.log("Pas égaux");
										$("#mdp-verifErreur").text("Le mot de passe n'est pas identique.");
										$("#mdp-verifErreur").css('color', 'red');
									}
									else{
										console.log("égaux");
										$("#mdp-verifErreur").text(" ");
										compteur+=1;
									}

									if(compteur == "6"){
										$.ajax({
											type: 'POST',
											url: 'bdd/inscriptscript.php',
											dataType: 'text',
											data : {username:$("#adresse-mail").val(),
											password:$("#mdp").val(),
											prenom:$("#prenom").val(),
											nom:$("#nom").val(),
											async: false,
											},
											success: function(data){

												if(data == "erreurExistant"){
													$("#adresse-mailErreur").text("Il existe déjà un compte avec cette adresse mail !");
													$("#adresse-mailErreur").css('color', 'red');
												}
												else{
													console.log("redir");
													window.location="https://ananke.minarox.fr/compte/validation-mail.php";
												}
											},
											error: function(){
												alert("erreur");
											}
										});
									}
								},
								error: function(){
									alert("erreurMDP");
								}
							});

						});
				});
		</script>
	</body>
</html>
