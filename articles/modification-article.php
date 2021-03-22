<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Modification d'un article";
			$idArticle = 'rien';
            if (array_key_exists("id", $_GET)) {
                $idArticle = $_GET['id'];
            }
            if ($ticket == "Rien") {
				header('Location: ../compte/connexion.php');
			} elseif ($ticket != "Rien" && $grade == 0) {
				header('Location: https://ananke.minarox.fr/');
			}
            // Informations du produit
            $requete1 = $dbh->prepare("SELECT TITRE, MARQUE, MODELE, DESCRIPTION, TYPE, SOUSTYPE, PRIX, CIBLE FROM Articles WHERE ID = ?");
            $requete1->execute(array($idArticle));
            $ligne1 = $requete1->fetch();
            $titreArticle = $ligne1[0];
            $marqueArticle = $ligne1[1];
            $modeleArticle = $ligne1[2];
            $descriptionArticle = $ligne1[3];
            $typeArticle = $ligne1[4];
            $soustypeArticle = $ligne1[5];
            $prixArticle = $ligne1[6];
            $cibleArticle = $ligne1[7];
            // Informations du produit
            $requete2 = $dbh->prepare("SELECT Taille, Couleurs FROM ArticlesParametres WHERE ID_Articles = ?");
            $requete2->execute(array($idArticle));
            $ligne2 = $requete2->fetch();
            $tailleArticle = $ligne2[0];
            $couleurArticle = $ligne2[1];
		?>
		<title>Modification d'un article | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-4 panneau-clair">
				<!-- Modification d'une actualité -->
				<div class="container mt-5 mb-5">
					<h1 class="text-center titre">Titre de l'article</h1>
					<hr>
					<!-- Ajout / modification des photos -->
					<div class="container mt-4 p-0">
						<form method="post" action="#">
							<div class="row">
								<div class="col-xl-2 offset-xl-0 offset-lg-0 offset-md-0 col-md-3 col-sm-3 col-12 col-lg-2">
									<!-- Photo 1 -->
									<img class="mx-auto d-block img-fluid petite-image-panier" src="../images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
								</div>
								<div class="col-xl-2 offset-xl-0 offset-lg-0 offset-md-0 col-md-3 mt-2 mt-sm-0 col-sm-3 col-lg-2">
									<!-- Photo 2 -->
									<img class="mx-auto d-block img-fluid petite-image-panier" src="../images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
								</div>
								<div class="col-xl-2 offset-xl-0 offset-lg-0 offset-md-0 col-md-3 mt-2 mt-sm-0 col-sm-3 col-lg-2">
									<!-- Photo 3 -->
									<img class="mx-auto d-block img-fluid petite-image-panier" src="../images/TeeShirtFrontBlackChild.png" alt="T-Shirt">
								</div>
								<div class="offset-xl-0 offset-lg-0 offset-md-0 mt-2 mt-md-0 text-center align-self-center col-md-1 col-lg-1 col-xl-1 col-sm-1">
									<!-- Ajout d'une photo -->
									<a class="text-dark lien-sans-decoration" href="#">
										<svg class="bi bi-plus-circle-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
										</svg>
									</a>
								</div>
							</div>
						</form>
					</div>
					<hr>
					<form method="post" action="bdd/gestionArticle.php?modifierArticle=<?php echo $idArticle; ?>">
						<div class="row">
						  <div class="col-md">
								<!-- Titre -->
								<div class="form-group">
									<label for="formulaire-titre">Titre</label>
									<input class="form-control bordures" id="formulaire-titre" name="titre" type="text" value="<?php echo $titreArticle; ?>" required>
								</div>
								<div class="row mt-0 mt-md-4">
									<div class="col-md">
										<!-- Marque -->
										<div class="form-group">
											<label for="formulaire-marque">Marque</label>
											<input class="form-control bordures" id="formulaire-marque" name="marque" type="text" value="<?php echo $marqueArticle; ?>" required>
										</div>
									</div>
									<div class="col-md">
										<!-- Modèle -->
										<div class="form-group">
											<label for="formulaire-modele">Modèle</label>
											<input class="form-control bordures" id="formulaire-modele" name="modele" type="text" value="<?php echo $modeleArticle; ?>" required>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md">
								<!-- Description -->
								<div class="form-group">
									<label for="formulaire-description">Texte</label>
									<textarea class="form-control bordures" id="formulaire-description" name="description" rows="5" required><?php echo $descriptionArticle; ?></textarea>
								</div>
							</div>
						</div>
						<div class="row mt-0 mt-md-4">
							<div class="col-md">
								<!-- Type -->
								<div class="form-group">
									<label for="formulaire-type">Type</label>
									<input class="form-control bordures" id="formulaire-type" name="type" type="text" value="<?php echo $typeArticle; ?>" required>
								</div>
							</div>
							<div class="col-md">
								<!-- Sous-type -->
								<div class="form-group">
									<label for="formulaire-sous-type">Sous-type</label>
									<input class="form-control bordures" id="formulaire-sous-type" name="sous-type" type="text" value="<?php echo $soustypeArticle; ?>" required>
								</div>
							</div>
							<div class="col-md">
								<!-- Prix -->
								<div class="form-group">
									<label for="formulaire-prix">Prix</label>
									<input class="form-control bordures" id="formulaire-prix" name="prix" type="number" min="0" value="<?php echo $prixArticle; ?>" required>
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
							<div class="row text-center">
								<!-- Bouton de modification de l'article -->
								<div class="col-sm-6">
									<button class="btn btn-primary pl-3 pr-3 float-sm-right" id="submit" type="submit">Modifier l'article</button>
								</div>
								<!-- Bouton de suppression de l'actualité -->
								<div class="col-sm-6 mt-3 mt-sm-0">
									<a class="btn btn-secondary pl-2 pr-2 float-sm-left rouge" href="bdd/gestionArticle.php?supprimerArticle=<?php echo $idArticle; ?>">Supprimer l'article</a>
								</div>
							</div>
							<!-- Bouton de retour -->
							<div class="mt-3 pb-4 text-center col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<a class="btn btn-secondary pl-4 pr-4" href="<?php echo "article.php?id=".$idArticle; ?>">Retour</a>
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
        
        <script>
            // Mise à jour de la sélection "Cible"
            document.getElementById("formulaire-cible").value = "<?php echo $cibleArticle; ?>";
            // Mise à jour de la sélection "Taille"
            document.getElementById("formulaire-taille").value = "<?php echo $tailleArticle; ?>";
			// Mise à jour de la sélection "Couleur"
            document.getElementById("formulaire-couleur").value = "<?php echo $couleurArticle; ?>";
        </script>
	</body>
</html>
