<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('global/head.php');
			require('global/bd.php');
			include('global/gestionSession.php');
			$localisation = "Accueil";
		?>
		<title>Accueil | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Actualités -->
				<div class="container-lg p-4">
					<div class="row">
						<!-- Textes et bouton -->
						<div class="col align-self-center">
							<h1 class="titre">Bienvenue sur le site d'Ananké</h1>
							<p class="texte">Ananke est une jeune entreprise vendant tout style de vêtements,<br>
                                allant des pantalons aux chaussures en passant par les pulls,<br>
                                pour les hommes, les femmes, et les enfants,<br>
                                vous trouverez tout ce que vous voudrez ici.
                            </p>
							<a class="btn btn-primary pl-4 pr-4" href="a-propos.php">
								A propos
							</a>
						</div>
						<!-- Image -->
						<div class="col d-none d-sm-block align-self-center">
							<img class="mx-auto d-block img-fluid" src="images/vetements.jpg" alt="T-Shirt">
						</div>
					</div>
				</div>
			</div>
			<!-- Produits en vedette -->
			<div class="container-md pt-4 pb-4 p-0">
				<h2 class="text-center titre">Produits en vedette</h2>
				<!-- Choix de produits -->
				<div class="container-md pl-5 pr-5">
					<div class="row">
						<!-- Grand produit -->
						<div class="col-md align-self-center">
							<a class="text-black lien-sans-decoration" href="#">
								<img class="mx-auto d-block img-fluid" src="images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
								<!-- Produit -->
								<p class="m-0 petit-titre-produit">Produit</p>
								<!-- Prix -->
								<p class="petit-prix-produit">10€</p>
								<!-- Notation -->
								<div class="m-0 mt-n4 pt-1 petit-titre-produit">
									<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
									</svg>
									<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
									</svg>
									<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
									</svg>
									<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
									</svg>
									<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
									</svg>
								</div>
							</a>
						</div>
						<div class="col-md-7">
							<div class="row mt-3 mt-md-0">
								<!-- Petit produit -->
								<div class="col">
									<a class="text-black lien-sans-decoration" href="#">
										<img class="mx-auto d-block img-fluid petite-image-produit" src="images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
										<!-- Produit -->
										<p class="m-0 petit-titre-produit">Produit</p>
										<!-- Prix -->
										<p class="petit-prix-produit">10€</p>
										<!-- Notation -->
										<div class="m-0 mt-n4 pt-1 petit-titre-produit">
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
											</svg>
											<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
											</svg>
										</div>
									</a>
								</div>
								<!-- Petit produit -->
								<div class="col">
									<a class="text-black lien-sans-decoration" href="#">
										<img class="mx-auto d-block img-fluid petite-image-produit" src="images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
										<!-- Produit -->
										<p class="m-0 petit-titre-produit">Produit</p>
										<!-- Prix -->
										<p class="petit-prix-produit">10€</p>
										<!-- Notation -->
										<div class="m-0 mt-n4 pt-1 petit-titre-produit">
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
											</svg>
											<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
											</svg>
										</div>
									</a>
								</div>
							</div>
							<div class="row mt-xl-3 mt-lg-1 mt-md-0 mt-3">
								<!-- Petit produit -->
								<div class="col">
									<a class="text-black lien-sans-decoration" href="#">
										<img class="mx-auto d-block img-fluid petite-image-produit" src="images/TeeShirtFrontBlackChild.png" alt="T-Shirt" height="100px">
										<!-- Produit -->
										<p class="m-0 petit-titre-produit">Produit</p>
										<!-- Prix -->
										<p class="petit-prix-produit">10€</p>
										<!-- Notation -->
										<div class="m-0 mt-n4 pt-1 petit-titre-produit">
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
											</svg>
											<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
											</svg>
										</div>
									</a>
								</div>
								<!-- Petit produit -->
								<div class="col">
									<a class="text-black lien-sans-decoration" href="#">
										<img class="mx-auto d-block img-fluid petite-image-produit" src="images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
										<!-- Produit -->
										<p class="m-0 petit-titre-produit">Produit</p>
										<!-- Prix -->
										<p class="petit-prix-produit">10€</p>
										<!-- Notation -->
										<div class="m-0 mt-n4 pt-1 petit-titre-produit">
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
											</svg>
											<svg class="bi bi-star-half" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.519.519 0 0 1-.146.05c-.341.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.171-.403.59.59 0 0 1 .084-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027c.08 0 .16.018.232.056l3.686 1.894-.694-3.957a.564.564 0 0 1 .163-.505l2.906-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.002 2.223 8 2.226v9.8z"/>
											</svg>
											<svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
											</svg>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Nouveautés -->
			<div class="container-fluid m-0 p-0 shadow panneau-sombre">
				<!-- Nouveautés -->
				<div class="container-lg p-4">
					<h1 class="petit-titre blanc">Nouveautés :</h1>
                    <div class="d-flex justify-content-center">
						  <?php
                            // Récupération des derniers articles
                            $requeteNouveautes = $dbh->query("SELECT ID, TITRE FROM Articles ORDER BY DATEAJOUT DESC LIMIT 5");
                            $compteur = 0;
                            // Affichage des articles
                            while ($ligneNouveautes = $requeteNouveautes->fetch()) {
                                $requeteImageNouveautes = $dbh->prepare("SELECT Image FROM ArticlesImages WHERE ID_Articles = ? AND Principale = 1 LIMIT 1");
                                $requeteImageNouveautes->execute(array($ligneNouveautes[0]));
                                $Image = $requeteImageNouveautes->fetch();
                                // Placement en fonction du compteur pour s'adapter aux différents affichages
                                if ($compteur == 2) {
                                    ?>
                                    <div class="col-md-2 mr-md-4">
                                        <a class="text-white lien-sans-decoration" href="articles/article.php?id=<?php echo $ligneNouveautes[0]; ?>">
                                            <img class="mx-auto d-block img-fluid petite-image-panier" src="<?php echo $Image[0]; ?>" alt="T-Shirt">
                                            <p class="text-center mb-0 petit-texte blanc"><?php echo $ligneNouveautes[1]; ?></p>
                                        </a>
                                    </div>
                                    <?php
                                } elseif ($compteur == 3) {
                                    ?>
                                    <div class="col-md-2 mr-lg-4 d-none d-sm-none d-md-block">
                                        <a class="text-white lien-sans-decoration" href="articles/article.php?id=<?php echo $ligneNouveautes[0]; ?>">
                                            <img class="mx-auto d-block img-fluid petite-image-panier" src="<?php echo $Image[0]; ?>" alt="T-Shirt">
                                            <p class="text-center mb-0 petit-texte blanc"><?php echo $ligneNouveautes[1]; ?></p>
                                        </a>
                                    </div>
                                    <?php
                                } elseif ($compteur == 4) {
                                    ?>
                                    <div class="col-md-2 d-none d-sm-none d-md-none d-lg-block">
                                        <a class="text-white lien-sans-decoration" href="articles/article.php?id=<?php echo $ligneNouveautes[0]; ?>">
                                            <img class="mx-auto d-block img-fluid petite-image-panier" src="<?php echo $Image[0]; ?>" alt="T-Shirt">
                                            <p class="text-center mb-0 petit-texte blanc"><?php echo $ligneNouveautes[1]; ?></p>
                                        </a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-2 mr-4">
                                         <a class="text-white lien-sans-decoration" href="articles/article.php?id=<?php echo $ligneNouveautes[0]; ?>">
                                            <img class="mx-auto d-block img-fluid petite-image-panier" src="<?php echo $Image[0]; ?>" alt="T-Shirt">
                                            <p class="text-center mb-0 petit-texte blanc"><?php echo $ligneNouveautes[1]; ?></p>
                                         </a>
                                    </div>
                                    <?php
                                }
                                $compteur += 1;
                            }
                            $requeteNouveautes->closeCursor(); // Termine le traitement de la requête
                        ?>
					</div>
				</div>
			</div>
			<!-- Meilleures ventes -->
			<h2 class="text-center titre mt-3">Meilleures ventes</h2>
			<div class="container-md">
				<div class="row pt-2">
					<!-- Catégorie femme -->
					<div class="col-sm p-0">
						<p class="text-center petit-titre">Catégorie Femme</p>
                        <?php
                            // Récupération de l'article le plus vendu
                            $requeteFemme = $dbh->query("SELECT ID, TITRE, PRIX FROM Articles WHERE CIBLE = 'femme' ORDER BY SOLDES DESC LIMIT 1");
                            $ligneFemme = $requeteFemme->fetch();
                            $idArticleFemme = $ligneFemme[0];
                            $titreArticleFemme = $ligneFemme[1];
                            $prixArticleFemme = $ligneFemme[2];
                            // Récupération de l'image de l'article
                            $requeteImgFemme = $dbh->prepare("SELECT Image FROM ArticlesImages WHERE ID_Articles = ? AND Principale = '1' LIMIT 1");
                            $requeteImgFemme->execute(array($idArticleFemme));
                            $ligneImgFemme = $requeteImgFemme->fetch();
                            $imageArticleFemme = $ligneImgFemme[0];
                        ?>
						<a class="text-black lien-sans-decoration" href="articles/article.php?id=<?php echo $idArticleFemme; ?>">
							<img class="mx-auto d-block img-fluid" src="<?php echo $imageArticleFemme; ?>" alt="T-Shirt">
							<p class="m-0 text-center petit-titre-produit"><?php echo $titreArticleFemme; ?></p>
							<p class="text-center petit-prix-produit"><?php echo $prixArticleFemme; ?>€</p>
						</a>
					</div>
					<!-- Catégorie homme -->
					<div class="col-sm p-0">
						<p class="text-center petit-titre">Catégorie Homme</p>
						<?php
                            // Récupération de l'article le plus vendu
                            $requeteHomme = $dbh->query("SELECT ID, TITRE, PRIX FROM Articles WHERE CIBLE = 'homme' ORDER BY SOLDES DESC LIMIT 1");
                            $ligneHomme = $requeteHomme->fetch();
                            $idArticleHomme = $ligneHomme[0];
                            $titreArticleHomme = $ligneHomme[1];
                            $prixArticleHomme = $ligneHomme[2];
                            // Récupération de l'image de l'article
                            $requeteImgHomme = $dbh->prepare("SELECT Image FROM ArticlesImages WHERE ID_Articles = ? AND Principale = '1' LIMIT 1");
                            $requeteImgHomme->execute(array($idArticleHomme));
                            $ligneImgHomme = $requeteImgHomme->fetch();
                            $imageArticleHomme = $ligneImgHomme[0];
                        ?>
						<a class="text-black lien-sans-decoration" href="articles/article.php?id=<?php echo $idArticleHomme; ?>">
							<img class="mx-auto d-block img-fluid" src="<?php echo $imageArticleHomme; ?>" alt="T-Shirt">
							<p class="m-0 text-center petit-titre-produit"><?php echo $titreArticleHomme; ?></p>
							<p class="text-center petit-prix-produit"><?php echo $prixArticleHomme; ?>€</p>
						</a>
					</div>
					<!-- Catégorie enfant -->
					<div class="col-sm p-0">
						<p class="text-center petit-titre">Catégorie Enfant</p>
						<?php
                            // Récupération de l'article le plus vendu
                            $requeteEnfant = $dbh->query("SELECT ID, TITRE, PRIX FROM Articles WHERE CIBLE = 'enfant' ORDER BY SOLDES DESC LIMIT 1");
                            $ligneEnfant = $requeteEnfant->fetch();
                            $idArticleEnfant = $ligneEnfant[0];
                            $titreArticleEnfant = $ligneEnfant[1];
                            $prixArticleEnfant = $ligneEnfant[2];
                            // Récupération de l'image de l'article
                            $requeteImgEnfant = $dbh->prepare("SELECT Image FROM ArticlesImages WHERE ID_Articles = ? AND Principale = '1' LIMIT 1");
                            $requeteImgEnfant->execute(array($idArticleEnfant));
                            $ligneImgEnfant = $requeteImgEnfant->fetch();
                            $imageArticleEnfant = $ligneImgEnfant[0];
                        ?>
						<a class="text-black lien-sans-decoration" href="articles/article.php?id=<?php echo $idArticleEnfant; ?>">
							<img class="mx-auto d-block img-fluid" src="<?php echo $imageArticleEnfant; ?>" alt="T-Shirt">
							<p class="m-0 text-center petit-titre-produit"><?php echo $titreArticleEnfant; ?></p>
							<p class="text-center petit-prix-produit"><?php echo $prixArticleEnfant; ?>€</p>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Ajout du header et footer -->
		<?php
			include('global/footer.php');
			include('global/header.php');
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
		</script>
	</body>
</html>
