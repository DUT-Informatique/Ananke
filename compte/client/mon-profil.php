<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Mon profil";
			if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			}
		?>
		<title>Mon profil | Ananké</title>
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
							<img class="mx-auto d-block img-fluid petite-image-produit" id="Avatar" src="../../images/avatar.png" alt="Avatar">
							<form method="POST" class="form-group pt-4 text-center" action="bdd/upload.php" enctype="multipart/form-data">
									 <input type="hidden" name="MAX_FILE_SIZE" value="500000">
									 Fichier : <input type="file" name="avatar">
									 <input type="hidden" name="identifiant" value="<?php echo $identifiant?>">
									 <input type="submit" name="envoyer" value="Envoyer le fichier">
							</form>
							<div class="form-group text-center">

								<a class="btn btn-secondary pl-5 pr-5" id="EffacerAvatar" href="bdd/suppressionImage.php?identifiant=<?php echo $identifiant?>">Effacer</a><br>
								<span id="statutImage"></span>
							</div>
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
										<p class="text-center titre-cache" href="">Mes adresses</p>
										<hr class="separateur-panier-cache">
									</a>
								</div>
							</div>
							<form method="post" action="#">
								<!-- Nom -->
								<div class="form-group">
									<label for="formulaire-nom">Nom</label><span id="NomErreur"></span>
									<input class="form-control bordures" id="formulaire-nom" name="nom" type="text" maxlength="30" required>
								</div>
								<!-- Prénom -->
								<div class="form-group">
									<label for="formulaire-prenom">Prénom</label><span id="PrenomErreur"></span>
									<input class="form-control bordures" id="formulaire-prenom" name="prenom" type="text" maxlength="30" required>
								</div>
								<!-- Adresse mail -->
								<div class="form-group">
									<label for="formulaire-adresse-mail">Adresse mail</label><span id="Adresse-MailErreur"></span>
									<input class="form-control bordures" id="formulaire-adresse-mail" name="adresse-mail" type="email" required>
								</div>
								<!-- Boutons -->
								<div class="form-group pt-4">
									<div class="row text-center">
										<!-- Bouton de modification -->
										<div class="col-sm-6">
											<button class="btn btn-primary pl-2 pr-2 float-sm-right" id="ModifierInfo" type="submit">Modifier les informations</button>
										</div>
										<!-- Boutons de changement de mot de passe -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<a class="btn btn-primary pl-2 pr-2 float-sm-left" id="ModifierMDP" href="modification-mdp.php">Changer le mot de passe</a>
										</div>
									</div>
								</div>
							</form>
							<!-- Boutons de suppression du compte -->
							<div class="container text-center affichage-client">
								<a class="btn btn-secondary pl-2 pr-2 mb-4" id="suppression-compte" href="#">Supprimer mon compte</a><br>
								<span id="notif-modification-info"></span>
							</div>
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

		<!--remplissage page -->
		<script>
		cle="<?php echo $ticket; ?>";
		grade="<?php echo $grade; ?>";
		if (cle != "Rien" && grade >= 1) {
			$(".affichage-client").remove();
		}
		$("#formulaire-nom").val("<?php echo $nom; ?>");
		$("#formulaire-prenom").val("<?php echo $prenom; ?>");
		$("#formulaire-adresse-mail").val("<?php echo $identifiant; ?>");
		$.ajax({
			type: 'POST',
			url: 'bdd/affichageImage.php',
			dataType: 'text',
			data : {
			Identifiant:$("#formulaire-adresse-mail").val()
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

		</script>
		<!--Boutons-->
		<script>
			$("#suppression-compte").click(function(event){
				event.preventDefault();
			});
			$("#ModifierInfo").click(function(event){
				event.preventDefault();
			});
			$(document).ready(function() {
				var contenu_result_upload = "<?php if(empty($_GET["id"]) == "0") {echo $_GET["id"];} else {echo "";} ?>";
				ancien_mail = $("#formulaire-adresse-mail").val();
				$("#statutImage").text(contenu_result_upload);
				if(contenu_result_upload === "Success"){
					$("#statutImage").css('color', 'green');
				} else {
					$("#statutImage").css('color', 'red');
				}
				$('#ModifierInfo').click(function() {
					var compteur = 0;
					$("#notif-modification-info").text("");
					var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if($("#formulaire-adresse-mail").val().trim() == "" || regex.test($("#formulaire-adresse-mail").val()) == false){
						$("#Adresse-MailErreur").text("Saisissez une adresse mail valide.");
						$("#Adresse-MailErreur").css('color', 'red');
					} else {
						$("#Adresse-MailErreur").text(" ");
						compteur += 1;
					}
					if($("#formulaire-prenom").val().trim() == ""){
						$("#PrenomErreur").text("Le prénom est obligatoire.");
						$("#PrenomErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#prenomErreur").text(" ");
					}
					if($("#formulaire-nom").val().trim() == ""){
						$("#NomErreur").text("Le prénom est obligatoire.");
						$("#NomErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#NomErreur").text(" ");
					}
					if(compteur == 3){
						$.ajax({
							type: 'POST',
							url: 'bdd/modificationProfil.php',
							dataType: 'text',
							data : {
							AncienMail : ancien_mail,
							Identifiant:$("#formulaire-adresse-mail").val(),
							Nom:$("#formulaire-nom").val(),
							Prenom:$("#formulaire-prenom").val()
						},
							success: function(data){
								$("#notif-modification-info").text(data);
								if(data === "Données identiques : changement impossible" || data === "Mail existant : changement impossible" ){
									$("#notif-modification-info").css('color', 'red');
								} else {
									$("#notif-modification-info").css('color', 'green');
								}
							},
							error: function(){
								alert("erreur");
							}
						});
					}
				});

				$('#suppression-compte').click(function() {
					if ( confirm( "Voulez vous vraiment supprimer votre compte ? Aucune récupération ne sera possible." ) ) {
						$.ajax({
							type: 'POST',
							url: 'bdd/suppressionCompte.php',
							dataType: 'text',
							data : {
							Identifiant:$("#formulaire-adresse-mail").val()
						},
							success: function(data){
								document.location.href="https://ananke.minarox.fr";
							},
						});
					}
				});
			});
		</script>
	</body>
</html>
