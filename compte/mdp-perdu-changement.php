<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Changement de mot de passe";
		?>
		<title>Changement mot de passe | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container p-4">
					<h1 class="text-center titre">Changement de mot de passe</h1>
				</div>
			</div>
			<!-- Formulaire d'inscription -->
			<div class="container p-5" id="Redirection">
				<form method="post" action="#">
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
					<!-- Bouton de modification mot de passe -->
					<div class="form-group pt-4 text-center">
						<button class="btn btn-primary pl-4 pr-4" id="submit" type="submit">Changer de mot de passe</button>
					</div>
				</form>
			</div>
		</div>

    	<?php
			include('../global/footer.php');
			include('../global/header.php');
		 	 $result;
			 if(!isset($_GET['log'])|| !isset($_GET['cle'])){
			 	 //Recupération des donnnées utiles dans l'adresse url
			 	 $result="La page que vous recherchez n'est pas accessible";
			}
			else{
				$login = $_GET['log'];
				$cle = $_GET['cle'];
			 	 //Recupération de la clé correspondant au $login dans la base de données
			 	 $requeteClef = $dbh->prepare("SELECT clemdp,verification FROM Usager WHERE Identifiant = ?");
			 	 if($requeteClef->execute(array($login)) && $row = $requeteClef->fetch()){
			 		 $clebdd = $row['clemdp'];
			 		 $actif = $row['verification'];
			 	 }

			 	 //On teste la valeur de la variable $actif récupérée dans la bdd
			 	 if($actif == '1'){
			 		 $result = "Votre compte n'a pas demandé de modification de mot de passe !";
			 	 }
			 	 else if($actif == '0'){
					 $result = "Votre compte n'est pas actif";
				 }
				 else{
			 		 if($cle === $clebdd){
			 			 $result = "Modification mot de passe";
			 		 }
			 		 else{
			 			 $result = "Erreur ...";
			 		 }
			 	 }
			 }
	  	?>

		<script>
			var resultat = "<?php echo $result ?>";
			console.log(resultat);
			if(resultat !== "Modification mot de passe"){
				$("#Redirection").text(resultat);
			}
			else {
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
	      $(document).ready(function() {
					$('#mdp').bind('paste', function (e) {
							e.preventDefault();
		 			});
					$('#mdp-verif').bind('paste', function (e) {
							e.preventDefault();
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
									if($("#mdp").val() !== $("#mdp-verif").val()){
										console.log("Pas égaux");
										$("#mdp-verifErreur").text("Mot de passe non identique");
										$("#mdp-verifErreur").css('color', 'red');
									}
									else{
										console.log("égaux");
										$("#mdp-verifErreur").text(" ");
										compteur+=1;
									}
	                if(compteur == 2 && resultat === "Modification mot de passe"){
										tmp = "<?php echo $_GET['log'] ?>";
	                  $.ajax({
	                    type: 'POST',
	                    url: 'bdd/mdpchangementscript.php',
	                    dataType: 'text',
	                    data : {username: tmp,
	                    password:$("#mdp").val()},

	                    success: function(data){
												console.log(data);
	                      if(data !== "erreurNonExistant"){
													$("#mdp-verifErreur").text("Changement effectué !");
	                        $("#mdp-verifErreur").css('color', 'green');
	                      }
	                      else{
	                        $("#mdp-verifErreur").text("Erreur !");
	                        $("#mdp-verifErreur").css('color', 'red');
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
			}
		</script>
	</body>
</html>
