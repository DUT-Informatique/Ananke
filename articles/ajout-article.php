<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Ajout d'un article";
			if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			} elseif ($ticket != "Rien" && $grade == 0) {
				header('Location: https://ananke.minarox.fr/');
			}
		?>
		<title>Ajout d'un article | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-4 panneau-clair">
				<!-- Modification d'une actualité -->
				<div class="container mt-5 mb-5">
					<h1 class="text-center titre">Ajout d'un article</h1>
					<hr>
					<!-- Ajout d'un article -->
					<div class="container p-0">
						<p class="petit-titre">Photos :</p>
						<!-- Ajout / modification des photos -->
						<div class="container p-0">
							<div class="row">
								<div class="offset-xl-0 offset-lg-0 offset-md-0 mt-2 mt-md-0 text-center align-self-center col-md-1 col-lg-1 col-xl-1 col-sm-1">
									<!-- Ajout d'une photo -->
									<a class="text-dark lien-sans-decoration" href="#">
										<svg class="bi bi-plus-circle-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<form method="post" action="bdd/gestionArticle.php?ajouterArticle">
						<div class="row">
						  <div class="col-md">
								<!-- Titre -->
								<div class="form-group">
									<label for="formulaire-titre">Titre</label>
									<input class="form-control bordures" id="formulaire-titre" name="titre" type="text" required>
								</div>
								<div class="row mt-0 mt-md-4">
									<div class="col-md">
										<!-- Marque -->
										<div class="form-group">
											<label for="formulaire-marque">Marque</label>
											<input class="form-control bordures" id="formulaire-marque" name="marque" type="text" required>
										</div>
									</div>
									<div class="col-md">
										<!-- Modèle -->
										<div class="form-group">
											<label for="formulaire-modele">Modèle</label>
											<input class="form-control bordures" id="formulaire-modele" name="modele" type="text" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md">
								<!-- Description -->
								<div class="form-group">
									<label for="formulaire-description">Texte</label>
									<textarea class="form-control bordures" id="formulaire-description" name="description" rows="5" required></textarea>
								</div>
							</div>
						</div>
						<div class="row mt-0 mt-md-4">
							<div class="col-md">
								<!-- Type -->
								<div class="form-group">
									<label for="formulaire-type">Type</label>
									<input class="form-control bordures" id="formulaire-type" name="type" type="text" required>
								</div>
							</div>
							<div class="col-md">
								<!-- Sous-type -->
								<div class="form-group">
									<label for="formulaire-sous-type">Sous-type</label>
									<input class="form-control bordures" id="formulaire-sous-type" name="sous-type" type="text" required>
								</div>
							</div>
							<div class="col-md">
								<!-- Prix -->
								<div class="form-group">
									<label for="formulaire-prix">Prix</label>
									<input class="form-control bordures" id="formulaire-prix" name="prix" type="number" min="0" required>
								</div>
							</div>
						</div>
						<div class="row mt-0 mt-md-4">
							<div class="col-md">
								<!-- Cible -->
								<div class="form-group">
									<label for="formulaire-cible">Cible</label>
									<select class="form-control bordures" id="formulaire-cible" name="cible" required>
										<option value=""></option>
										<option value="femme">Femme</option>
										<option value="homme">Homme</option>
										<option value="enfant">Enfant</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								<!-- Taille -->
								<div class="form-group">
									<label for="formulaire-taille">Taille</label>
									<select class="form-control bordures" id="formulaire-taille" name="taille" required>
										<option value=""></option>
										<option value="XXL">XXL</option>
										<option value="XL">XL</option>
										<option value="L">L</option>
										<option value="M">M</option>
										<option value="S">S</option>
										<option value="XS">XS</option>
										<option value="XXS">XXS</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								<!-- Couleur -->
								<div class="form-group">
									<label for="formulaire-couleur">Couleur</label>
									<select class="form-control bordures" id="formulaire-couleur" name="couleur" required>
										<option value=""></option>
										<option value="Gris">Gris</option>
										<option value="Blanc">Blanc</option>
										<option value="Rouge">Rouge</option>
										<option value="Vert">Vert</option>
										<option value="Jaune">Jaune</option>
										<option value="Bleu">Bleu</option>
										<option value="Noir">Noir</option>
									</select>
								</div>
							</div>
						</div>
						<!-- Boutons -->
						<div class="form-group pt-4 mb-5">
							<div class="row text-center pb-4">
								<!-- Bouton de modification de l'article -->
								<div class="col-sm-6">
									<button class="btn btn-primary pl-3 pr-3 float-sm-right" id="submit" type="submit">Ajouter l'article</button>
								</div>
								<!-- Bouton de suppression de l'actualité -->
								<div class="col-sm-6 mt-3 mt-sm-0">
									<a class="btn btn-secondary pl-4 pr-4 float-sm-left" href="recherche-article.php">Retour</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('../global/footer.php');
			include('../global/header.php');
		?>
	</body>
</html>
