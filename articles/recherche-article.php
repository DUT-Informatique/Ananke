<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Recherche d'articles";
		?>
		<title>Recherche d'articles | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container p-4">
					<h1 class="text-center titre">Que cherchez vous ?</h1>
					<!-- Zone de recherche grande -->
					<div class="recherche-page mt-3 mx-auto">
						<form action="#" method="post">
							<input class="shadow" id="zone-recherche" type="text" placeholder="Recherche...">
							<svg id="icon-recherche-page" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
								<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
							</svg>
						</form>
					</div>
				</div>
			</div>
			<!-- Recherche d'articles -->
			<div class="container-lg">
				<div class="row">
					<!-- Filtres de recherche -->
					<div class="col-md-4 panneau-gris">
						<!-- Titre -->
						<div class="container mt-4">
							<p class="petit-titre">Filtres de recherche :</p>
							<form class="d-none d-sm-none d-md-block" method="post" action="#">
								<!-- Filtrer par -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-filtre-pc">Filtrer par</label>
									<select class="form-control bordures" id="formulaire-filtre-pc" name="filtre">
										<option value=""></option>
										<option value="prix-croissant">Prix croissant</option>
										<option value="prix-décroissant">Prix décroissant</option>
									</select>
								</div>
								<!-- Type -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-categorie-pc">Catégorie</label>
									<select class="form-control bordures" id="formulaire-categorie-pc" name="categorie">
										<option value=""></option>
										<option value="femme">Femme</option>
										<option value="homme">Homme</option>
										<option value="enfant">Enfant</option>
									</select>
								</div>
								<!-- Type -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-type-pc">Type</label>
									<select class="form-control bordures" id="formulaire-type-pc" name="type">
										<option value=""></option>
										<option value="pantalons">Pantalons</option>
										<option value="chaussures">Chaussures</option>
										<option value="sweatshirts">Sweatshirts</option>
										<option value="pulls">Pulls</option>
										<option value="vestes">Vestes</option>
										<option value="t-shirts">T-Shirts</option>
										<option value="survetement-sport">Survêtement de sport</option>
										<option value="shorts">Shorts</option>
										<option value="sous-vetements">Sous-vêtements</option>
										<option value="chemises">Chemises</option>
									</select>
								</div>
								<!-- Options -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-options-pc">Options</label>
									<select class="form-control bordures" id="formulaire-options-pc" name="options">
										<option value=""></option>
									</select>
								</div>
								<!-- Prix -->
								<div class="form-group">
									<div class="row">
										<div class="col-lg">
											<label class="m-0 petit-texte" for="formulaire-prix-min-pc">Prix minimal</label>
											<input class="form-control bordures" id="formulaire-prix-min-pc" name="prix-min" type="number" min="0" step="1">
										</div>
										<div class="col-lg mt-md-3 mt-lg-0">
											<label class="m-0 petit-texte" for="formulaire-prix-max-pc">Prix maximal</label>
											<input class="form-control bordures" id="formulaire-prix-max-pc" name="prix-max" type="number" min="1" step="1">
										</div>
									</div>
								</div>
								<!-- Bouton pour appliquer les filtres -->
								<div class="form-group text-center">
									<button class="btn btn-primary pl-4 pr-4" id="submit-pc" type="submit">Appliquer les filtres</button>
								</div>
								<!-- Bouton pour réinitialiser les filtres -->
								<div class="form-group text-center">
									<button class="btn btn-secondary pl-4 pr-4" id="reset-pc" type="reset">Effacer les filtres</button>
								</div>
								<!-- Bouton d'ajout d'un article -->
								<div class="form-group text-center bouton-employe">
									<a class="btn btn-primary mb-3 pl-4 pr-4" href="ajout-article.php">Ajouter un article</a>
								</div>
							</form>
							<form class="d-block d-sm-block d-md-none" method="post" action="#">
								<div class="row mb-3">
									<!-- Filtrer par -->
									<div class="col-sm">
										<label class="m-0 petit-texte" for="formulaire-filtre-tel">Filtrer par</label>
										<select class="form-control bordures" id="formulaire-filtre-tel" name="filtre">
											<option value=""></option>
											<option value="prix-croissant">Prix croissant</option>
											<option value="prix-décroissant">Prix décroissant</option>
										</select>
									</div>
									<!-- Taille -->
									<div class="col-sm mt-3 mt-sm-0">
										<label class="m-0 petit-texte" for="formulaire-categorie-tel">Catégorie</label>
										<select class="form-control bordures" id="formulaire-categorie-tel" name="categorie">
											<option value=""></option>
											<option value="femme">Femme</option>
											<option value="homme">Homme</option>
											<option value="enfant">Enfant</option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
									<!-- Couleur -->
									<div class="col-sm">
										<label class="m-0 petit-texte" for="formulaire-type-tel">Type</label>
										<select class="form-control bordures" id="formulaire-type-tel" name="type">
											<option value=""></option>
											<option value="pantalons">Pantalons</option>
											<option value="chaussures">Chaussures</option>
											<option value="sweatshirts">Sweatshirts</option>
											<option value="pulls">Pulls</option>
											<option value="vestes">Vestes</option>
											<option value="t-shirts">T-Shirts</option>
											<option value="survetement-sport">Survêtement de sport</option>
											<option value="shorts">Shorts</option>
											<option value="sous-vetements">Sous-vêtements</option>
											<option value="chemises">Chemises</option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
									<!-- Options -->
									<div class="col-sm mt-3 mt-sm-0">
										<label class="m-0 petit-texte" for="formulaire-options-tel">Options</label>
										<select class="form-control bordures" id="formulaire-options-tel" name="options">
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm">
										<label class="m-0 petit-texte" for="formulaire-prix-min-tel">Prix minimal</label>
										<input class="form-control bordures" id="formulaire-prix-min-tel" name="prix-min" type="number" min="0" step="1"	>
									</div>
									<div class="col-sm mt-3 mt-sm-0">
										<label class="m-0 petit-texte" for="formulaire-prix-max-tel">Prix maximal</label>
										<input class="form-control bordures" id="formulaire-prix-max-tel" name="prix-max" type="number" min="0" step="1">
									</div>
								</div>
								<!-- Bouton pour appliquer les filtres -->
								<div class="form-group text-center">
									<button class="btn btn-primary mt-2 pl-4 pr-4" id="submit-tel" type="submit">Appliquer les filtres</button>
								</div>
								<!-- Bouton pour effacer les filtres -->
								<div class="form-group text-center">
									<button class="btn btn-secondary pl-4 pr-4" id="reset-tel" type="reset">Effacer les filtres</button>
								</div>
								<!-- Bouton d'ajout d'un article -->
								<div class="form-group text-center bouton-employe">
									<a class="btn btn-primary mb-3 pl-4 pr-4" href="ajout-article.php">Ajouter un article</a>
								</div>
							</form>
						</div>
					</div>
					<!-- Articles -->
					<div class="col-md pt-4 pt-md-0">
						<span id="Articles"></span>
							<!--Fin article-->
					</div>
				</div>
			</div>
		</div>

		<!-- Ajout du header et footer -->
		<?php
			include('../global/footer.php');
			include('../global/header.php');
			// On récupère la valeur des paramètres de l'url
			if (array_key_exists("categorie", $_GET)) {
				$categorie = $_GET['categorie'];
			}
			if (array_key_exists("type", $_GET)) {
				$type = $_GET['type'];
			}
			if (array_key_exists("recherche", $_POST)) {
				$recherche = $_POST['recherche'];
			}
		?>

		<script>
			// Récupération des variables de comptes
			cle = "<?php echo $ticket; ?>";
			grade = "<?php echo $grade; ?>";
			// Cacher des éléments en fonction de l'utilisateur
			if (cle === "Rien") {							// Si le visiteur n'est pas connecté
				$(".bouton-employe").remove();
			} else if (cle != "Rien" && grade == 0) {		// Si le client est connecté
				$(".bouton-employe").remove();
			}

			// On récupère les paramètres de l'url dans javascript
			categorie = "<?php if(!empty($categorie)){echo $categorie;}else{ echo "";}; ?>";
			type = "<?php if(!empty($type)){echo $type;}else{echo "";} ?>";
			recherche = "<?php if(!empty($recherche)){echo $recherche;}else{echo "";}?>";
			console.log(recherche);
			$("#zone-recherche").val(recherche);

			// Mise à jour de la sélection "Catégorie"
			if (categorie === "femme") {
				document.getElementById("formulaire-categorie-pc").value = "femme";
				document.getElementById("formulaire-categorie-tel").value = "femme";
			} else if (categorie === "homme") {
				document.getElementById("formulaire-categorie-pc").value = "homme";
				document.getElementById("formulaire-categorie-tel").value = "homme";
			} else if (categorie === "enfant") {
				document.getElementById("formulaire-categorie-pc").value = "enfant";
				document.getElementById("formulaire-categorie-tel").value = "enfant";
			}
			// Mise à jour de la sélection "Type"
			if (type === "pantalons") {
				document.getElementById("formulaire-type-pc").value = "pantalons";
				document.getElementById("formulaire-type-tel").value = "pantalons";
			} else if (type === "chaussures") {
				document.getElementById("formulaire-type-pc").value = "chaussures";
				document.getElementById("formulaire-type-tel").value = "chaussures";
			} else if (type === "sweatshirts") {
				document.getElementById("formulaire-type-pc").value = "sweatshirts";
				document.getElementById("formulaire-type-tel").value = "sweatshirts";
			} else if (type === "pulls") {
				document.getElementById("formulaire-type-pc").value = "pulls";
				document.getElementById("formulaire-type-tel").value = "pulls";
			} else if (type === "vestes") {
				document.getElementById("formulaire-type-pc").value = "vestes";
				document.getElementById("formulaire-type-tel").value = "vestes";
			} else if (type === "t-shirts") {
				document.getElementById("formulaire-type-pc").value = "t-shirts";
				document.getElementById("formulaire-type-tel").value = "t-shirts";
			} else if (type === "survetement-sport") {
				document.getElementById("formulaire-type-pc").value = "survetement-sport";
				document.getElementById("formulaire-type-tel").value = "survetement-sport";
			} else if (type === "shorts") {
				document.getElementById("formulaire-type-pc").value = "shorts";
				document.getElementById("formulaire-type-tel").value = "shorts";
			} else if (type === "sous-vetements") {
				document.getElementById("formulaire-type-pc").value = "sous-vetements";
				document.getElementById("formulaire-type-tel").value = "sous-vetements";
			} else if (type === "chemises") {
				document.getElementById("formulaire-type-pc").value = "chemises";
				document.getElementById("formulaire-type-tel").value = "chemises";
			}

			function etoiles(nbEtoilesMoyennes){
				var r = Math.round(nbEtoilesMoyennes*2)*0.5;
				var debut = '<div class="container p-0 mt-1">';
				var fin = '</div>';
				var vide = '<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/></svg>';
				var demi = '<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/></svg>';
				var plein = '<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
				if ( r == 0) {
						string = debut + vide + vide + vide + vide + vide + fin ;

				} else if( r == 0.5 ) {
						string = debut + demi + vide + vide + vide + vide + fin;
					} else if( r == 1 ) {
						string = debut + plein + vide + vide + vide + vide + fin;
				}	else if( r == 1.5 ) {
						string = debut + plein + demi + vide + vide + vide + fin;
					}	else if( r == 2 ) {
						string = debut + plein + plein + vide + vide + vide + fin;
					}	else if( r == 2.5 ) {
						string = debut + plein + plein + demi + vide + vide + fin;
					}	else if( r == 3 ) {
						string = debut + plein + plein + plein + vide + vide + fin;
				}	else if( r == 3.5 ) {
					string = debut + plein + plein + plein + demi + vide + fin;
					}	else if( r == 4 ) {
						string = debut + plein + plein + plein + plein + vide + fin;
					}	else if( r == 4.5 ) {
						string = debut + plein + plein + plein + plein + demi + fin;
					}	else if( r == 5 ) {
						string = debut + plein + plein + plein + plein + plein + fin;
					} else { string = ""; }
				return string;
			}
			function gestionFiltre(){
				//PC
				var estMobile = window.matchMedia("only screen and (max-width: 760px)");
				if (!estMobile.matches)
				{
					if($("#formulaire-filtre-pc").val() === "prix-croissant"){
						filtre = " ASC ";
					} else if($("#formulaire-filtre-pc").val() === "prix-décroissant"){
						filtre = " DESC ";
					} else {
						filtre =  $("#formulaire-filtre-pc").val();
					}
					var tabPC = [$("#formulaire-categorie-pc").val(),$("#formulaire-type-pc").val(),$("#formulaire-options-pc").val(),$("#formulaire-prix-min-pc").val(),$("#formulaire-prix-max-pc").val(),filtre];
					var tab1PC = [" CIBLE = ", " TYPE = ", " SOUSTYPE = ",  " PRIX BETWEEN ", " ", " ORDER BY PRIX "];
					var tabValeursPC=[];
					var tabCategoriePC=[];
					for(let i = 0; i < 6; i++){
						if(tabPC[i] !== ""){
							tabCategoriePC.push(tab1PC[i]);
							tabValeursPC.push(tabPC[i]);
						}
					}
					$.ajax({
						type: 'POST',
						url: 'bdd/ArticlesRemplissageRecherche.php',
						dataType: 'text',
						data : {
							Recherche:$("#zone-recherche").val(),
							Categorie : tabCategoriePC,
							Valeurs : tabValeursPC
						},
						success: function(data){
							if(data != "0"){
								tableau = JSON.parse(data);
								$("#Articles").text(" ");
								tmp=0;
								tmp1=0;
								$.each(tableau,function(i,obj){
									tmp+=1;
									$.ajax({
										type: 'POST',
										url: 'bdd/AffichageImag.php',
										dataType: 'text',
										async: false,
										data : {
											id : obj.ID
										},
										success: function(data){
											if(tmp == 1){
												$("#Articles").append('<!--lignes contenant deux articles en lignes--><div class="row pt-0 pt-md-4" id="ArticlesRow'+tmp1+'"></div>');
												$("#ArticlesRow"+tmp1+"").append('<div class="col-lg ml-3 mr-3 mr-lg-0 pb-3 pb-lg-0"><a class="text-dark lien-sans-decoration" href="article.php?id='+obj.ID+'"><div class="row"><!-- Image --><div class="col-5"><img class="mx-auto d-block img-fluid petite-image-produit" src="'+data+'" alt="T-Shirt"></div><!-- Nom, prix et notation --><div class="col-7"><!-- Nom et prix --><p class="petit-titre m-0">'+obj.TITRE+'</p><p class="petit-texte m-0 mt-n1">'+obj.PRIX+'€</p><!--Notations-->'+etoiles((parseFloat(obj.NBNOTES1)*1 +parseFloat(obj.NBNOTES2)*2 +parseFloat(obj.NBNOTES3)*3 +parseFloat(obj.NBNOTES4)*4 +parseFloat(obj.NBNOTES5)*5 )/((parseFloat(obj.NBNOTES1) +parseFloat(obj.NBNOTES2) +parseFloat(obj.NBNOTES3) +parseFloat(obj.NBNOTES4) +parseFloat(obj.NBNOTES5))) )+'</div></div></a></div>');
											} else if(tmp == 2){
												$("#ArticlesRow"+tmp1+"").append('<div class="col-lg ml-3 mr-3 mr-lg-0 pb-3 pb-lg-0"><a class="text-dark lien-sans-decoration" href="article.php?id='+obj.ID+'"><div class="row"><!-- Image --><div class="col-5"><img class="mx-auto d-block img-fluid petite-image-produit" src="'+data+'" alt="T-Shirt"></div><!-- Nom, prix et notation --><div class="col-7"><!-- Nom et prix --><p class="petit-titre m-0">'+obj.TITRE+'</p><p class="petit-texte m-0 mt-n1">'+obj.PRIX+'€</p><!--Notations-->'+etoiles((parseFloat(obj.NBNOTES1)*1 +parseFloat(obj.NBNOTES2)*2 +parseFloat(obj.NBNOTES3)*3 +parseFloat(obj.NBNOTES4)*4 +parseFloat(obj.NBNOTES5)*5 )/((parseFloat(obj.NBNOTES1) +parseFloat(obj.NBNOTES2) +parseFloat(obj.NBNOTES3) +parseFloat(obj.NBNOTES4) +parseFloat(obj.NBNOTES5))))+'</div></div></a></div>');
												tmp = 0;
												tmp1+=1;
											}
										},
										error: function(){
											alert("erreur");
										}
									});
								});
							} else {
								$("#Articles").text(" ");
							}

						},
						error: function(){
							alert("erreur");
						}
					});
				} else {
					//Mobile
					if($("#formulaire-filtre-tel").val() === "Prix croissant"){
						filtre = $("#formulaire-filtre-tel").val() + "ASC"
					} else if($("#formulaire-filtre-tel").val() === "Prix décroissant"){
						filtre = $("#formulaire-filtre-tel").val() + "DESC";
					} else {
						filtre =  $("#formulaire-filtre-tel").val();
					}
					var tabMobile= [$("#formulaire-categorie-tel").val(),$("#formulaire-type-tel").val(),$("#formulaire-options-tel").val(),$("#formulaire-prix-min-tel").val(),$("#formulaire-prix-max-tel").val(),filtre];
					var tab1Mobile = [" CIBLE = ", " TYPE = ", " SOUSTYPE = ",  " PRIX BETWEEN ", " ", " ORDER BY PRIX "];
					var tabValeursMobile=[];
					var tabCategorieMobile=[];
					for(let i = 0; i < 6; i++){
						if(tabMobile[i] !== ""){
							tabCategorieMobile.push(tab1Mobile[i]);
							tabValeursMobile.push(tabMobile[i]);
						}
					}
					$.ajax({
						type: 'POST',
						url: 'bdd/ArticlesRemplissageRecherche.php',
						dataType: 'text',
						data : {
							Recherche:$("#zone-recherche").val(),
							Categorie : tabCategorieMobile,
							Valeurs : tabValeursMobile
						},
						success: function(data){
							if(data != 0){
								tableau = JSON.parse(data);
								$("#Articles").text(" ");
								tmp=0;
								tmp1=0;
								$.each(tableau,function(i,obj){
									tmp+=1;
									$.ajax({
										type: 'POST',
										url: 'bdd/AffichageImag.php',
										dataType: 'text',
										async: false,
										data : {
											id : obj.ID
										},
										success: function(data){
											if(tmp == 1){
												$("#Articles").append('<!--lignes contenant deux articles en lignes--><div class="row pt-0 pt-md-4" id="ArticlesRow'+tmp1+'"></div>');
												$("#ArticlesRow"+tmp1+"").append('<div class="col-lg ml-3 mr-3 mr-lg-0 pb-3 pb-lg-0"><a class="text-dark lien-sans-decoration" href="article.php?id='+obj.ID+'"><div class="row"><!-- Image --><div class="col-5"><img class="mx-auto d-block img-fluid petite-image-produit" src="'+data+'" alt="T-Shirt"></div><!-- Nom, prix et notation --><div class="col-7"><!-- Nom et prix --><p class="petit-titre m-0">'+obj.TITRE+'</p><p class="petit-texte m-0 mt-n1">'+obj.PRIX+'€</p><!--Notations-->'+etoiles((parseFloat(obj.NBNOTES1)*1 +parseFloat(obj.NBNOTES2)*2 +parseFloat(obj.NBNOTES3)*3 +parseFloat(obj.NBNOTES4)*4 +parseFloat(obj.NBNOTES5)*5 )/((parseFloat(obj.NBNOTES1) +parseFloat(obj.NBNOTES2) +parseFloat(obj.NBNOTES3) +parseFloat(obj.NBNOTES4) +parseFloat(obj.NBNOTES5))) )+'</div><!--Notations--></div></a></div>');
											} else if(tmp == 2){
												$("#ArticlesRow"+tmp1+"").append('<div class="col-lg ml-3 mr-3 mr-lg-0 pb-3 pb-lg-0"><a class="text-dark lien-sans-decoration" href="article.php?id='+obj.ID+'"><div class="row"><!-- Image --><div class="col-5"><img class="mx-auto d-block img-fluid petite-image-produit" src="'+data+'" alt="T-Shirt"></div><!-- Nom, prix et notation --><div class="col-7"><!-- Nom et prix --><p class="petit-titre m-0">'+obj.TITRE+'</p><p class="petit-texte m-0 mt-n1">'+obj.PRIX+'€</p><!--Notations-->'+etoiles((parseFloat(obj.NBNOTES1)*1 +parseFloat(obj.NBNOTES2)*2 +parseFloat(obj.NBNOTES3)*3 +parseFloat(obj.NBNOTES4)*4 +parseFloat(obj.NBNOTES5)*5 )/((parseFloat(obj.NBNOTES1) +parseFloat(obj.NBNOTES2) +parseFloat(obj.NBNOTES3) +parseFloat(obj.NBNOTES4) +parseFloat(obj.NBNOTES5))) )+'</div><!--Notations--></div></a></div>');
												tmp = 0;
												tmp1+=1;
											}
										},
										error: function(){
											alert("erreur");
										}
									});
								});
							} else {
								$("#Articles").text(" ");
							}

						},
						error: function(){
							alert("erreur");
						}
					});
				}
			}
			$('#zone-recherche').keypress(function(e){
				if(e.which == 13){
							e.preventDefault();
								gestionFiltre();
					}
			});
			gestionFiltre();
			$("#submit-pc").click(function(){
				gestionFiltre();
			});
			$("#submit-tel").click(function(event){
				event.preventDefault();
			});
			$("#submit-pc").click(function(event){
				event.preventDefault();
			});
			$("#submit-tel").click(function(){
				gestionFiltre();
			});
			$.ajax({
				type: 'POST',
				url: 'bdd/FiltresRemplissage.php',
				dataType: 'text',
				data : {
					type : type
				},

				success: function(data){
					tableau = JSON.parse(data);
					$.each(tableau,function(i,obj){
						$("#formulaire-options-pc").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
						$("#formulaire-options-tel").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
					});
				},
				//
				error: function(){
					alert("erreur");
				}
			});
			$("#formulaire-options-pc").change(function(){
				$.ajax({
					type: 'POST',
					url: 'bdd/FiltresRemplissage.php',
					dataType: 'text',
					data : {
						type : type
					},

					success: function(data){
						tableau = JSON.parse(data);
						$.each(tableau,function(i,obj){
							$("#formulaire-options-pc").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
							$("#formulaire-options-tel").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
						});
					},
					//
					error: function(){
						alert("erreur");
					}
				});
			});
			$("#formulaire-options-tel").change(function(){
				$.ajax({
					type: 'POST',
					url: 'bdd/FiltresRemplissage.php',
					dataType: 'text',
					data : {
						type : type
					},

					success: function(data){
						tableau = JSON.parse(data);
						$.each(tableau,function(i,obj){
							$("#formulaire-options-pc").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
							$("#formulaire-options-tel").append("<option value='"+obj.SOUSTYPE+"'>"+obj.SOUSTYPE+"</option>");
						});
					},
					//
					error: function(){
						alert("erreur");
					}
				});
			});
			$("#formulaire-prix-min-pc").change(function() {
				$("#formulaire-prix-min-pc").attr({"max" : $("#formulaire-prix-max-pc").val()});
				if($("#formulaire-prix-min-pc").val() > $("#formulaire-prix-max-pc").val()){
					$("#formulaire-prix-max-pc").val($("#formulaire-prix-min-pc").val());
				}
				$("#formulaire-prix-max-pc").attr({"min" : $("#formulaire-prix-min-pc").val()});
			});
			$("#formulaire-prix-max-pc").change(function() {
				if($("#formulaire-prix-min-pc").val() > $("#formulaire-prix-max-pc").val()){
					$("#formulaire-prix-max-pc").val($("#formulaire-prix-min-pc").val());
				}
				$("#formulaire-prix-min-pc").attr({"max" : $("#formulaire-prix-max-pc").val()});
				$("#formulaire-prix-max-pc").attr({"min" : $("#formulaire-prix-min-pc").val()});
			});
			$("#formulaire-prix-min-tel").change(function() {
				if($("#formulaire-prix-min-tel").val() > $("#formulaire-prix-max-tel").val()){
					$("#formulaire-prix-max-tel").val($("#formulaire-prix-min-tel").val());
				}
				$("#formulaire-prix-min-tel").attr({"max" : $("#formulaire-prix-max-tel").val()});
				$("#formulaire-prix-max-tel").attr({"min" : $("#formulaire-prix-min-tel").val()});
			});
			$("#formulaire-prix-max-tel").change(function() {
				if($("#formulaire-prix-min-tel").val() > $("#formulaire-prix-max-tel").val()){
					$("#formulaire-prix-max-tel").val($("#formulaire-prix-min-tel").val());
				}
				$("#formulaire-prix-min-tel").attr({"max" : $("#formulaire-prix-max-tel").val()});
				$("#formulaire-prix-max-tel").attr({"min" : $("#formulaire-prix-min-tel").val()});
			});
		</script>
	</body>
</html>
