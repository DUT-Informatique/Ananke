<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Modification du mot de passe";
			if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			}
		?>
		<title>Modification du mot de passe | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-4 panneau-clair">
				<!-- Profil -->
				<div class="container mt-5 mb-5">
					<div class="row">
						<!-- Modification avatar -->
						<div class="col-md-4 d-none d-sm-none d-md-block">
							<img class="mx-auto d-block img-fluid petite-image-produit" src="../../images/avatar.png" id="Avatar" alt="Avatar">
						</div>
						<!-- Mon profil -->
						<div class="col-md-8">
							<!-- Panneau de navigation -->
							<div class="row">
								<!-- Mon profil -->
								<div class="col-sm p-0">
									<a class="lien-sans-decoration" href="mon-profil.php">
										<p class="text-center titre">Mon profil</p>
										<hr id="separateur-panier-actif">
									</a>
								</div>
								<!-- Mes adresses -->
								<div class="col-sm p-0 affichage-client">
									<a class="lien-sans-decoration" href="mes-adresses.php">
										<p class="text-center titre-cache">Mes adresses</p>
										<hr class="separateur-panier-cache">
									</a>
								</div>
							</div>
							<form method="post" action="#">
								<!-- Ancien mot de passe -->
								<div class="form-group">
									<label for="formulaire-ancien-mdp">Ancien mot de passe</label><span id="ancien-mdpErreur"></span>
									<input class="form-control bordures" id="formulaire-ancien-mdp" name="ancien-mdp" type="password" required>
									<span id="ancien-mdpErreur"></span>
								</div>
								<!-- Nouveau mot de passe -->
								<div class="form-group">
									<label for="formulaire-nouveau-mdp">Nouveau mot de passe</label><span id="mdpErreur"></span>
									<input class="form-control bordures" id="formulaire-nouveau-mdp" name="nouveau-mdp" type="password" required>
								</div>
								<!-- Texte du format du mot de passe -->
								<div class="form-group">
									<p class="m-0 texte">Règles concernant le mot de passe :</p>
									<p class="m-0 texte"><span id="nbCaract">❌</span> doit comporter au moins 10 caractères</p>
									<p class="m-0 texte"><span id="minuscule">❌</span> doit comporter au moins une minuscule</p>
									<p class="m-0 texte"><span id="majuscule">❌</span> doit comporter au moins une majuscule</p>
									<p class="m-0 texte"><span id="special">❌</span> doit comporter au moins un caractère spécial</p>
								</div>
								<!-- Confirmation du nouveau mot de passe -->
								<div class="form-group">
									<label for="formulaire-confirmation-nouveau-mdp">Confirmation du nouveau mot de passe</label><span id="confirmation-mdpErreur"></span>
									<input class="form-control bordures" id="formulaire-confirmation-nouveau-mdp" name="confirmation-nouveau-mdp" type="password" required>
									<span id="mdp-verifErreur"></span>
								</div>
								<!-- Boutons -->
								<div class="form-group pt-4">
									<div class="row text-center">
										<!-- Bouton de modification -->
										<div class="col-sm-6">
											<button class="btn btn-primary pl-3 pr-3 float-md-right" type="submit" id="submit">Changer le mot de passe</button>
										</div>
										<!-- Boutons de changement de mot de passe -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<a class="btn btn-secondary pl-4 pr-4 float-md-left" href="mon-profil.php">Annuler</a>
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
		$(document).ready(function(){
				cle="<?php echo $ticket; ?>";
				grade="<?php echo $grade; ?>";
				if (cle != "Rien" && grade >= 1) {
					$(".affichage-client").remove();
				}
				var id = "<?php echo $identifiant; ?>";
				$("#submit").click(function(event){
					event.preventDefault();
				});
				$('#formulaire-ancien-mdp').bind('paste', function (e) {
						e.preventDefault();
				});
				$('#formulaire-nouveau-mdp').bind('paste', function (e) {
						e.preventDefault();
				});
				$('#fformulaire-confirmation-nouveau-mdp').bind('paste', function (e) {
						e.preventDefault();
				});
				$.ajax({
					type: 'POST',
					url: 'bdd/affichageImage.php',
					dataType: 'text',
					data : {
					Identifiant:id
				},
					success: function(data){
						if(data !== ""){
							$('#Avatar').attr('src',data);
						}

					},
					error: function(){
						alert("erreur");
					}
				});
				function ajaxMDP(){
					$.ajax({
						type: 'POST',
						url: 'bdd/verificationmdp.php',
						dataType: 'text',
						data : {
							password:$("#formulaire-nouveau-mdp").val()
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
					ajaxMDP();
					$('#formulaire-nouveau-mdp').keyup(function(e){
						if(e.which == 13){
								$('#submit').click();
						}
						ajaxMDP();
					});
					$(document).on('input', "#formulaire-nouveau-mdp", function (){
						ajaxMDP();
					});
					$('#submit').click(function() {
							$.ajax({
								type: 'POST',
								url: 'bdd/verificationmdp.php',
								dataType: 'text',
								async: false,
								data : {
									password:$("#formulaire-nouveau-mdp").val()
								},
								success: function(data){
									var compteur = 0;
									var table = JSON.parse(data);
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

									if($("#formulaire-nouveau-mdp").val() !== $("#formulaire-confirmation-nouveau-mdp").val()){
										$("#mdp-verifErreur").text("Le mot de passe n'est pas identique.");
										$("#mdp-verifErreur").css('color', 'red');
									}
									else{
										$("#mdp-verifErreur").text(" ");
										compteur+=1;
									}
									$.ajax({
										type: 'POST',
										url: 'bdd/verificationAncienMDP.php',
										dataType: 'text',
										async: false,
										data : {
										id:id,
										password:$("#formulaire-ancien-mdp").val()
										},
										success: function(data){
											if(compteur == "2" && data == 1){
												$.ajax({
													type: 'POST',
													url: 'bdd/modificationMDP.php',
													dataType: 'text',
													data : {id:id,
													password:$("#formulaire-nouveau-mdp").val()
													},
													success: function(data){
														$("#mdp-verifErreur").text(data);
														$("#mdp-verifErreur").css("color","green");
													},
													error: function(){
														alert("erreur");
													}
												});
											} else if(data === 0){
												$("#mdp-verifErreur").text("Changement impossible");
												$("#mdp-verifErreur").css("color","red");
											}
										},
										error: function(){
											alert("erreur");
										}
									});
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
