<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Ajout d'un compte";
            if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			} elseif ($grade == 0 || $grade == 1) {
				header('Location: https://ananke.minarox.fr/');
			}
		?>
		<title>Ajout d'un compte | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-5 panneau-clair">
				<p class="mt-5 text-center titre">Ajout d'un compte</p>
				<hr>
				<!-- Ajout d'un compte -->
				<div class="container mb-5">
					<div class="row">
						<!-- Avatar de base -->
						<div class="col-md-4 d-none d-sm-none d-md-block">
							<img class="mx-auto d-block img-fluid petite-image-produit" src="../../images/avatar.png" alt="Avatar">
						</div>
						<!-- Informations du compte -->
						<div class="col-md-8">
							<form method="post" action="#">
								<!-- Nom -->
								<div class="form-group">
									<label for="formulaire-nom">Nom</label>
									<input class="form-control bordures" id="formulaire-nom" name="nomNouveauCompte" type="text" maxlength="30" required>
                                    <span id="nomErreur"></span>
								</div>
								<!-- Prénom -->
								<div class="form-group">
									<label for="formulaire-prenom">Prénom</label>
									<input class="form-control bordures" id="formulaire-prenom" name="prenomNouveauCompte" type="text" maxlength="30" required>
                                    <span id="prenomErreur"></span>
								</div>
								<!-- Adresse mail -->
								<div class="form-group">
									<label for="formulaire-adresse-mail">Adresse mail</label>
									<input class="form-control bordures" id="formulaire-adresse-mail" name="adresseMailNouveauCompte" type="email" required>
                                    <span id="adresse-mailErreur"></span>
								</div>
                                <!-- Mot de passe -->
								<div class="form-group">
									<label for="formulaire-mdp">Mot de passe</label>
									<input class="form-control bordures" id="formulaire-mdp" name="mdpNouveauCompte" type="password" required>
								</div>
                                <!-- Texte mot de passe -->
								<div class="form-group">
									<p class="m-0 texte">Règles concernant le mot de passe :</p>
                                    <p class="m-0 texte"><span id="nbCaract">❌</span> doit comporter au moins 10 caractères</p>
                                    <p class="m-0 texte"><span id="minuscule">❌</span> doit comporter au moins une minuscule</p>
                                    <p class="m-0 texte"><span id="majuscule">❌</span> doit comporter au moins une majuscule</p>
                                    <p class="m-0 texte"><span id="special">❌</span> doit comporter au moins un caractère spécial</p>
								</div>
                                
                                <!-- Confirmation du mot de passe -->
								<div class="form-group">
									<label for="formulaire-mdp-confirmation">Confirmation du mot de passe</label>
									<input class="form-control bordures" id="formulaire-mdp-confirmation" name="mdpConfirmationNouveauCompte" type="password" required>
                                    <span id="mdp-verifErreur"></span>
								</div>
                                <!-- Type de compte -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-type-compte">Type de compte</label>
									<select class="form-control bordures" id="formulaire-type-compte" name="gradeNouveauCompte" required>
										<option value=""></option>
										<option value="1">Employé</option>
										<option value="2">Administrateur</option>
									</select>
                                    <span id="typeCompteErreur"></span>
								</div>
								<!-- Boutons -->
								<div class="form-group pt-5">
									<div class="row text-center">
										<!-- Bouton d'ajout du compte -->
										<div class="col-sm-6">
											<button class="btn btn-primary pl-3 pr-3 float-sm-right" id="submit" type="submit">Ajouter le compte</button>
										</div>
										<!-- Bouton de retour -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<a class="btn btn-secondary pl-4 pr-4 float-sm-left" href="gestion-comptes.php">Retour</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('../../global/footer.php');
			include('../../global/header.php');
		?>
        
        <script>
			$(document).ready(function() {
				function ajaxMDP() {
					$.ajax({
						type: 'POST',
						url: '../bdd/verificationmdp.php',
						dataType: 'text',
						data: {
							password:$("#formulaire-mdp").val()
						},
						success: function(data) {
							var table = JSON.parse(data);
							if (table.spec == "1") {
								$("#special").text("✅");
							} else {
								$("#special").text("❌");
							}
							if (table.min == "1") {
								$("#minuscule").text("✅");
							} else {
								$("#minuscule").text("❌");
							}
							if (table.maj == "1") {
								$("#majuscule").text("✅");
							} else {
								$("#majuscule").text("❌");
							}
							if (table.nbCar == "1") {
								$("#nbCaract").text("✅");
							} else {
								$("#nbCaract").text("❌");
							}
						},
						error: function() {
							alert("erreurMDP");
						}
					});
				}
				$('#submit').keypress(function(e) {
					if (e.which == 13) {
							$('#submit').click(); //Simule le clic sur le bouton Envoyer
					}
				});
				$("#submit").click(function(event) {
					event.preventDefault();
				});
					console.log("documentready");
					ajaxMDP();
					$('#formulaire-mdp').keyup(function(e) {
						if(e.which == 13) {
								$('#submit').click();
						}
						ajaxMDP();
					});
					$(document).on('input', "#formulaire-mdp", function () {
						ajaxMDP();
					});
					//if(valeuruser.length != 0 && valeurmdp.length != 0 && valeurprenom.length != 0 && valeurnom.length != 0 && valeurmdp == $("#mdp-verif").val() && $("#conditions").checked == true){
						$('#submit').click(function() {
							$.ajax({
								type: 'POST',
								url: '../bdd/verificationmdp.php',
								dataType: 'text',
								async: false,
								data: {
									password:$("#formulaire-mdp").val()
								},
								success: function(data) {
									var compteur = 0;
									var table = JSON.parse(data);
									console.log(table);
									var tmp = 0;
									if (table.spec == "1") {
										tmp += 1;
									}
									if (table.min == "1") {
										tmp+=1;
									}
									if (table.maj == "1") {
										tmp+=1;
									}
									if (table.nbCar == "1") {
										tmp+=1;
									}
									if(tmp == 4) {
										compteur +=1;
									}
									var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
									if($("#formulaire-adresse-mail").val().trim() == "" || regex.test($("#formulaire-adresse-mail").val()) == false) {
										$("#adresse-mailErreur").text("Saisissez une adresse mail valide.");
										$("#adresse-mailErreur").css('color', 'red');
									} else {
										compteur+=1;
										$("#adresse-mailErreur").text("");
									}
									if($("#formulaire-prenom").val().trim() == "") {
										$("#prenomErreur").text("Le prénom est obligatoire.");
										$("#prenomErreur").css('color', 'red');
									} else {
										compteur+=1;
										$("#prenomErreur").text("");
									}
									if($("#formulaire-nom").val().trim() == "") {
										$("#nomErreur").text("Le nom est obligatoire.");
										$("#nomErreur").css('color', 'red');
									} else {
										compteur+=1;
										$("#nomErreur").text("");
									}
									if($("#formulaire-mdp").val() !== $("#formulaire-mdp-confirmation").val()) {
										console.log("Pas égaux");
										$("#mdp-verifErreur").text("Le mot de passe n'est pas identique.");
										$("#mdp-verifErreur").css('color', 'red');
									} else {
										console.log("égaux");
										$("#mdp-verifErreur").text(" ");
										compteur+=1;
									}
                                    if($("#formulaire-type-compte").val().trim() == "") {
										$("#typeCompteErreur").text("Aucun type de compte sélectionné.");
										$("#typeCompteErreur").css('color', 'red');
									} else {
										compteur+=1;
										$("#typeCompteErreur").text("");
									}
									if(compteur == "6") {
										$.ajax({
											type: 'POST',
											url: '../bdd/inscriptscript.php',
											dataType: 'text',
											data: {
                                                username:$("#formulaire-adresse-mail").val(),
								                password:$("#formulaire-mdp").val(),
                                                prenom:$("#formulaire-prenom").val(),
                                                nom:$("#formulaire-nom").val(),
                                                grade:$("#formulaire-type-compte").val(),
                                                async: false,
											},
											success: function(data) {
												if(data == "erreurExistant") {
													$("#adresse-mailErreur").text("Il existe déjà un compte avec cette adresse mail !");
													$("#adresse-mailErreur").css('color', 'red');
												} else {
													console.log("redir");
													window.location="https://ananke.minarox.fr/compte/staff/gestion-comptes.php";
												}
											},
											error: function() {
												alert("erreur");
											}
										});
									}
								},
								error: function() {
									alert("erreurMDP");
								}
							});
						});
				});
		</script>
	</body>
</html>
