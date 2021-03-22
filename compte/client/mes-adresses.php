<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Mes adresses";
			if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			}
		?>
		<title>Mes adresses | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-4 panneau-clair">
				<!-- Profil -->
				<div class="container mt-5 mb-5">
					<div class="row">
						<!-- Panneau de gauche -->
						<div class="col-md-4 d-none d-sm-none d-md-block">
							<img class="mx-auto d-block img-fluid petite-image-produit" id="Avatar" src="../../images/avatar.png" alt="Avatar">
							<!-- Choix des adresses pour vue pc -->
							<div class="container p-0">
								<!-- Bouton adresse -->
								<span id="boutons_adresse_pc"></span>
								<!-- Bouton nouvelle adresse -->
								<div class="row text-center mt-2">
									<div class="col-sm-4 mt-2 mt-sm-0 col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1">
										<!-- Nouvelle adresse -->
										<a class="text-dark lien-sans-decoration" id="nouveau" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place=nouveau">
											<div class="container p-3 bordures panneau-clair panneau-arrondi" id="bouton_nv">
												<p class="m-0 petit-texte">Nouvelle adresse</p>
											</div>
										</a>
										<span id="boutons_adresse_pc"></span>
									</div>
								</div>
							</div>
						</div>
						<!-- Panneau de droite -->
						<div class="col-md-8">
							<!-- Panneau de navigation -->
							<div class="row">
								<!-- Mon profil -->
								<div class="col-sm-6 p-0">
									<a class="lien-sans-decoration" href="mon-profil.php">
										<p class="text-center titre-cache">Mon profil</p>
										<hr class="separateur-panier-cache">
									</a>
								</div>
								<!-- Mes adresses -->
								<div class="col-sm-6 p-0">
									<a class="lien-sans-decoration" href="mes-adresses-livraison.php">
										<p class="text-center titre">Mes adresses</p>
										<hr id="separateur-panier-actif">
									</a>
								</div>
							</div>
							<!-- Séparateur semi-visible -->
							<div class="container w-100 d-block d-sm-none"></div>
							<form method="post" action="#">
								<!-- Panneau de navigation 2 -->
								<div class="row">
									<!-- Adresse de livraison -->
									<div class="col-sm-6 p-0">
										<p class="text-center d-sm-none d-md-block titre">
											<input class="form-check-input mt-3" id="formulaire-livraison" name="livraison" type="checkbox" value="livraison">
											Adresse de livraison
										</p>
										<p class="text-center d-none d-sm-block d-md-none titre">Adresse de<br>livraison</p>
										<hr id="separateur-panier-actif">
									</div>
									<!-- Adresse de facturation -->
									<div class="col-sm-6 p-0">
										<p class="text-center titre">
											<input class="form-check-input mt-3" id="formulaire-facturation" name="facturation" type="checkbox" value="facturation">
											Adresse de facturation
										</p>
										<hr id="separateur-panier-actif">
									</div>
								</div>
								<!-- Choix des adresses pour vue mobile -->
								<div class="container d-block d-sm-block d-md-none p-0">
									<div class="container p-0">
										<div class="row text-center">
											<!-- Nouvelle adresse -->
											<div class="col-sm-4 col-xl-3 col-md-3 col-lg-4 mt-2 mt-sm-0" >
												<a class="text-dark lien-sans-decoration" id="nouveau" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place=nouveau">
													<div class="container p-3 bordures panneau-clair panneau-arrondi" id="bouton_nv">
														<p class="m-0 petit-texte">Nouvelle adresse</p>
													</div>
												</a>
											</div>
											<span id="boutons_adresse_mobile"></span>
										</div>
									</div>
								</div>
								<input type="hidden" id="nb">
								<hr class="d-block d-sm-block d-md-none">
								<!-- Nom et prénom -->
								<div class="form-group">
									<div class="row">
										<!-- Nom -->
										<div class="col-sm-6">
											<label for="formulaire-nom">Nom<p class="d-inline texte rouge">*</p></label><span id="NomErreur"></span>
											<input class="form-control bordures" id="formulaire-nom" name="nom" type="text" maxlength="30" required>
										</div>
										<!-- Prénom -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<label for="formulaire-prenom">Prénom<p class="d-inline texte rouge">*</p></label><span id="PrenomErreur"></span>
											<input class="form-control bordures" id="formulaire-prenom" name="prenom" type="text" maxlength="30" required>
										</div>
									</div>
								</div>
								<!-- Adresse -->
								<div class="form-group">
									<label for="formulaire-adresse">Adresse<p class="d-inline texte rouge">*</p></label><span id="AdresseErreur"></span>
									<input class="form-control bordures" id="formulaire-adresse" name="adresse" type="text" required>
								</div>
								<!-- Complément d'adresse -->
								<div class="form-group">
									<label for="formulaire-complement-adresse">Complément d'adresse</label>
									<input class="form-control bordures" id="formulaire-complement-adresse" name="complement-adresse" type="text">
								</div>
								<!-- Ville et code postal -->
								<div class="form-group">
									<div class="row">
										<!-- Ville -->
										<div class="col-sm-8">
											<label for="formulaire-ville">Ville<p class="d-inline texte rouge">*</p></label><span id="VilleErreur"></span>
											<input class="form-control bordures" id="formulaire-ville" name="ville" type="text" maxlength="50" required>
										</div>
										<!-- Code postal -->
										<div class="col-sm-4 mt-3 mt-sm-0">
											<label for="formulaire-code-postal">Code postal<p class="d-inline texte rouge">*</p></label><span id="CPErreur"></span>
											<input class="form-control bordures sans-fleches" id="formulaire-code-postal" name="code-postal" type="number" min"00000" max="99999" required>
										</div>
									</div>
								</div>
								<!-- Téléphone portable et téléphone fixe -->
								<div class="form-group">
									<div class="row">
										<!-- Téléphone portable -->
										<div class="col-sm-6">
											<label for="formulaire-tel-portable">Téléphone portable<p class="d-inline texte rouge">*</p></label><span id="TelephoneErreur"></span>
											<input class="form-control bordures sans-fleches" id="formulaire-tel-portable" name="tel-portable" required>
										</div>
										<!-- Téléphone fixe -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<label for="formulaire-tel-fixe">Téléphone fixe</label><span id="TelephoneFixErreur"></span>
											<input class="form-control bordures sans-fleches" id="formulaire-tel-fixe" name="tel-fixe">
										</div>
									</div>
								</div>

								<!-- Boutons -->
								<div class="form-group pt-4">
									<div class="row text-center">
										<!-- Bouton de modification -->
										<div class="col-sm-6">
											<button class="btn btn-primary pl-3 pr-3 float-md-right" type="submit" id="submit">Modifier l'adresse</button>
										</div>
										<!-- Bouton de retour -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<a class="btn btn-secondary pl-5 pr-5 float-md-left" href="mon-profil.php">Retour</a>
										</div>
									</div>
								</div>
								<div class="container text-center">
									<a class="btn btn-secondary pl-4 pr-4 mb-4 text-danger" id="suppression" style="display: none">Supprimer</a>
								</div><br>
								<span id="alert"></span>
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

		<!--remplissage page -->
		<script>
			$(document).ready(function(){
				var id = "<?php echo $identifiant; ?>";
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
				$.ajax({
					type: 'POST',
					url: 'bdd/nbAdresseUtilisateur.php',
					dataType: 'text',
					data : {
					Identifiant : id
				},
					success: function(data){
						var contenu_result = "<?php if(empty($_GET["place"]) == "0") {echo $_GET["place"];} else {echo "";} ?>";

						if(data < contenu_result && contenu_result !== "nouveau"){
							document.location.href="https://ananke.minarox.fr/compte/client/mes-adresses.php";
						}
						if(data !== "0"){
							$.ajax({
								type: 'POST',
								url: 'bdd/adresseUtilisateur.php',
								dataType: 'text',
								data : {
								Identifiant : id
							},
							//.attr('class', 'newClass');
								success: function(data){
									tableau = JSON.parse(data);
									var contenu_result = "<?php if(empty($_GET["place"]) == "0") {echo $_GET["place"];} else {echo "";} ?>";
									$.each(tableau,function(i,obj){
									if(contenu_result == obj.nombre || (contenu_result === "" && i == 0)){
											//Choix des adresses pour vue mobile,panneau-clair et panneau-gris -->
											$("#boutons_adresse_mobile").append('<div class="col-sm-4 col-xl-3 col-md-3 col-lg-4 mt-2 mt-sm-0" ><a class="text-dark lien-sans-decoration" id="'+obj.nombre+'" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place='+obj.nombre+'"><div class="container p-3 bordures panneau-clair panneau-arrondi"><p class="m-0 petit-texte">Adresse '+obj.nombre+'</p></div></a></div>');
											//Choix des adresses pour vue pc -->
											$("#boutons_adresse_pc").append('<div class="row text-center mt-2"><div class="col-sm-4 mt-2 mt-sm-0 col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1"><a class="text-dark lien-sans-decoration" id="'+obj.nombre+'" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place='+obj.nombre+'"><div class="container p-3 bordures panneau-clair panneau-arrondi"><p class="m-0 petit-texte">Adresse '+obj.nombre+'</p></div></a></div></div>');
											$("#formulaire-nom").val(obj.Nom);
											$("#formulaire-prenom").val(obj.Prenom);
											$("#formulaire-adresse").val(obj.Adresse);
											$("#formulaire-complement-adresse").val(obj.ComplementAdresse);
											$("#formulaire-ville").val(obj.Ville);
											$("#formulaire-code-postal").val(obj.CodePostal);
											$("#formulaire-tel-portable").val(obj.TelephonePortable);
											$("#formulaire-tel-fixe").val(obj.Telephone);
											$("#nb").val(obj.id);
											if(obj.Facturation == '1'){
													$("#formulaire-facturation").prop("checked", true);
											}
											else{
													$("#formulaire-facturation").prop("checked", false);
											}
											if(obj.Livraison == '1'){
													$("#formulaire-livraison").prop("checked", true);
											}
											else{
													$("#formulaire-livraison").prop("checked", false);
											}

										} else {
											//Choix des adresses pour vue mobile,panneau-clair et panneau-gris -->
											$("#boutons_adresse_mobile").append('<div class="col-sm-4 col-xl-3 col-md-3 col-lg-4 mt-2 mt-sm-0" ><a class="text-dark lien-sans-decoration" id="'+obj.nombre+'" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place='+obj.nombre+'"><div class="container p-3 bordures panneau-gris panneau-arrondi"><p class="m-0 petit-texte">Adresse '+obj.nombre+'</p></div></a></div>');
											//Choix des adresses pour vue pc -->
											$("#boutons_adresse_pc").append('<div class="row text-center mt-2"><div class="col-sm-4 mt-2 mt-sm-0 col-xl-6 offset-xl-3 offset-lg-2 col-lg-8 col-md-10 offset-md-1"><a class="text-dark lien-sans-decoration" id="'+obj.nombre+'" href="https://ananke.minarox.fr/compte/client/mes-adresses.php?place='+obj.nombre+'"><div class="container p-3 bordures panneau-gris panneau-arrondi"><p class="m-0 petit-texte">Adresse '+obj.nombre+'</p></div></a></div></div>');

										}
									});
								},
								error: function(){
									alert("erreur");
								}
							});
						}
						if(data == 0 || contenu_result === "nouveau"){
							$("#bouton_nv").attr('class', "container p-3 bordures panneau-clair panneau-arrondi");
							$("#submit").text("Ajouter l'adresse");
						} else {
							$("#bouton_nv").attr('class', "container p-3 bordures panneau-gris panneau-arrondi");

							$("#suppression").show();
							$("#suppression").click(function(){
								$.ajax({
									type: 'POST',
									url: 'bdd/suppressionAdresse.php',
									dataType: 'text',
									data : {
									id: $("#nb").val()
								},
									success: function(data){
									},
									error: function(){
										alert("erreur");
									}
								});
							});
						}
					},
					error: function(){
					}
				});
			});
			</script>
			<!--gestion Boutons-->
			<script>
			$(document).ready(function(){
				var id = "<?php echo $identifiant; ?>";
				var contenu_result = "<?php if(empty($_GET["place"]) == "0") {echo $_GET["place"];} else {echo "";} ?>";
				$("#submit").click(function(event){
					event.preventDefault();
				});
				$("#suppression").click(function(event){
					event.preventDefault();
				});
				$("#alert").text(" ");
				$("#submit").click(function(){
					var compteur = 0;
					if($("#formulaire-nom").val().trim() == ""){
						$("#NomErreur").text("Le nom est obligatoire.");
						$("#NomErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#NomErreur").text(" ");
					}
					if($("#formulaire-prenom").val().trim() == ""){
						$("#PrenomErreur").text("Le prénom est obligatoire.");
						$("#PrenomErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#PrenomErreur").text(" ");
					}
					if($("#formulaire-ville").val().trim() == ""){
						$("#VilleErreur").text("La ville est obligatoire.");
						$("#VilleErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#VilleErreur").text(" ");
					}
					if($("#formulaire-adresse").val().trim() == ""){
						$("#AdresseErreur").text("L'adresse est obligatoire.");
						$("#AdresseErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#AdresseErreur").text(" ");
					}
					if($("#formulaire-code-postal").val().trim() == ""){
						$("#CPErreur").text("Le code postal est obligatoire.");
						$("#CPErreur").css('color', 'red');
					}
					else{
						$.ajax({
							type: 'POST',
							url: 'bdd/verificationCP.php',
							dataType: 'text',
							async: false,
							data :{
							cp: $("#formulaire-code-postal").val()
						},
							success: function(data){
								if(data != 0){
									compteur+=1;
									$("#CPErreur").text(" ");
								}
								else {
									$("#CPErreur").text("Code Postal Inexistant.");
									$("#CPErreur").css('color', 'red');
								}
							},
							error: function(){
								alert("erreur");
							}
						});

					}
					if($("#formulaire-tel-portable").val().indexOf('+33')!=-1){num = $("#formulaire-tel-portable").val().replace('+33', '0')}else{num = $("#formulaire-tel-portable").val()};
					var re = /^0[1-7]\d{8}$/;
					if($("#formulaire-tel-portable").val().trim() == "" || !re.test(num)){
						$("#TelephoneErreur").text("Un numéro de téléphone portable est obligatoire.");
						$("#TelephoneErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#TelephoneErreur").text(" ");
					}
					if($("#formulaire-tel-fixe").val().indexOf('+33')!=-1){num = $("#formulaire-tel-fixe").val().replace('+33', '0')}else{num = $("#formulaire-tel-fixe").val()};
					var re = /^0[1-7]\d{8}$/;
					if(!$("#formulaire-tel-fixe").val().trim() == "" && !re.test(num)){
						$("#TelephoneFixErreur").text("Le numéro n'est pas conforme.");
						$("#TelephoneFixErreur").css('color', 'red');
					}
					else{
						compteur+=1;
						$("#TelephoneFixErreur").text(" ");
					}
					if(compteur == 7){
						$.ajax({
							type: 'POST',
							url: 'bdd/modificationAdresse.php',
							dataType: 'text',
							data : {
							Identifiant : id,
							Nom :$("#formulaire-nom").val(),
							Prenom : $("#formulaire-prenom").val(),
							Adresse : $("#formulaire-adresse").val(),
							ComplementAdresse : $("#formulaire-complement-adresse").val(),
							Ville : $("#formulaire-ville").val(),
							CodePostal : $("#formulaire-code-postal").val(),
							TelPortable : $("#formulaire-tel-portable").val(),
							TelFixe : $("#formulaire-tel-fixe").val(),
							Livraison : $("#formulaire-livraison").prop("checked"),
							Facturation : $("#formulaire-facturation").prop("checked"),
							Emplacement : contenu_result,
							id_adresse : $("#nb").val()
						},
							success: function(data){
								$("#alert").text(data);
								if($("#alert").text() == "Données modifiées" || $("#alert").text() == "Données ajoutées"){
									if($("#alert").text() == "Données ajoutées"){
										setTimeout(document.location.href="https://ananke.minarox.fr/compte/client/mes-adresses.php", 2000);
									}
									$("#alert").css('color','green');
								}else{
									$("#alert").css('color','red');
								}
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
