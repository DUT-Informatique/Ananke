<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../../global/head.php');
			require('../../global/bd.php');
			include('../../global/gestionSession.php');
			$localisation = "Gestion des comptes";
            if ($ticket == "Rien") {
				header('Location: ../connexion.php');
			} elseif ($grade == 0 || $grade == 1) {
				header('Location: https://ananke.minarox.fr/');
			}
		?>
		<title>Gestion des comptes | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte principal -->
				<div class="container p-4">
					<h1 class="text-center titre">Gestion des comptes</h1>
					<!-- Zone de recherche grande -->
					<div class="recherche-page mt-3 mx-auto">
						<form action="#" method="post">
							<input class="shadow" id="zone-recherche" name="recherche" type="text" placeholder="Recherche...">
							<svg id="icon-recherche-page" width="1em" height="1em" viewBox="0 0 16 16" fill="black" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
								<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
							</svg>
						</form>
					</div>
				</div>
			</div>
			<!-- Textes et adresse -->
			<div class="container-lg pt-4 pb-3">
				<div class="row">
					<!-- Employé -->
					<div class="col-md" id="liste-compte-employe">
                        <!-- Liste comptes employés -->
					</div>
					<!-- Séparateur vertical -->
					<div class="col-md-1">
						<hr class="d-none d-sm-none d-md-block" id="vertical">
						<hr class="mt-5 d-block d-sm-block d-md-none separateur-large">
					</div>
					<!-- Administrateur -->
					<div class="col-md" id="liste-compte-administrateur">
                        <!-- Liste comptes administrateurs -->
					</div>
				</div>
				<!-- Bouton de retour -->
				<div class="form-group pt-5 text-center">
					<a class="btn btn-primary pl-4 pr-4" href="ajout-compte.php">Ajouter un compte</a>
				</div>
			</div>
		</div>
		
		<!-- Ajout du header et footer -->
		<?php
			include('../../global/footer.php');
			include('../../global/header.php');
		?>
        
        <script>
            var imported = document.createElement('script');
            imported.src = 'bdd/comptes.js';
            document.head.appendChild(imported);
        </script>
	</body>
</html>
