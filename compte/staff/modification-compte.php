<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Modification d'un compte";
            if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			} elseif ($grade == 0 || $grade == 1) {
				header('Location: https://ananke.minarox.fr/');
			}
            $nomCompte = $_POST['nomCompte'];
            $prenomCompte = $_POST['prenomCompte'];
            $adresseMailCompte = $_POST['adresseMailCompte'];
            $gradeCompte = $_POST['gradeCompte'];
            $imageCompte = $_POST['imageCompte'];
		?>
		<title>Modification d'un compte | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page-profil">
			<!-- Panneau général -->
			<div class="container-lg pt-5 pb-4 panneau-clair">
				<p class="mt-5 text-center titre"><?php echo $nomCompte." ".$prenomCompte; ?></p>
				<hr>
				<!-- Modification du compte -->
				<div class="container mb-5">
					<div class="row">
						<!-- Avatar du compte -->
						<div class="col-md-4 d-none d-sm-none d-md-block">
							<img class="mx-auto d-block img-fluid petite-image-produit" src="<?php echo $imageCompte; ?>" alt="Avatar">
						</div>
						<!-- Informations du compte -->
						<div class="col-md-8">
							<form method="post" action="bdd/gestionComptes.php?compte=modification">
								<!-- Nom -->
								<div class="form-group">
									<label for="formulaire-nom">Nom</label>
									<input class="form-control bordures" id="formulaire-nom" name="nomCompte" type="text" maxlength="30" value="<?php echo $nomCompte; ?>" required>
								</div>
								<!-- Prénom -->
								<div class="form-group">
									<label for="formulaire-prenom">Prénom</label>
									<input class="form-control bordures" id="formulaire-prenom" name="prenomCompte" type="text" maxlength="30" value="<?php echo $prenomCompte; ?>" required>
								</div>
								<!-- Adresse mail -->
								<div class="form-group">
									<label for="formulaire-adresse-mail">Adresse mail</label>
									<input class="form-control bordures" id="formulaire-adresse-mail" name="adresseMailCompte" type="email" value="<?php echo $adresseMailCompte; ?>" required>
								</div>
                                <input name="ancienIdentifiantCompte" type="email" value="<?php echo $adresseMailCompte; ?>" style="display: none;">
                                <!-- Type de compte -->
								<div class="form-group">
									<label class="m-0 petit-texte" for="formulaire-type-compte">Type de compte</label>
									<select class="form-control bordures" id="formulaire-type-compte" name="gradeCompte">
										<option value="1">Employé</option>
										<option value="2">Administrateur</option>
									</select>
								</div>
								<!-- Boutons -->
								<div class="form-group pt-5">
									<div class="row text-center">
										<!-- Bouton de modification du compte -->
										<div class="col-sm-6">
											<button class="btn btn-primary pl-2 pr-2 float-sm-right" type="submit">Modifier le compte</button>
										</div>
										<!-- Bouton de suppression du compte -->
										<div class="col-sm-6 mt-3 mt-sm-0">
											<a class="btn btn-secondary pl-2 pr-2 float-sm-left rouge" href="#">Supprimer le compte</a>
										</div>
									</div>
								</div>
							</form>
							<!-- Bouton de retour -->
							<div class="container text-center">
								<a class="btn btn-secondary pl-4 pr-4 mb-4" href="gestion-comptes.php">Retour</a>
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
        
        <script>
            document.getElementById("formulaire-type-compte").value = "<?php echo $gradeCompte; ?>";
        </script>
	</body>
</html>
