<!doctype html>
<html lang="fr">
	<head>
		<!-- Éléments du head -->
		<?php
			include('../global/head.php');
			require('../global/bd.php');
			include('../global/gestionSession.php');
			$localisation = "Activation du compte";
		?>
		<title>Activation du compte | Ananké</title>
	</head>

	<body>
		<!-- Boite de position du contenu de la page -->
		<div id="position-contenu-page">
			<!-- Boite d'information -->
			<div class="container-fluid m-0 p-0 shadow panneau-clair">
				<!-- Texte de connexion -->
				<div class="container p-4">
					<h1 class="text-center titre" id="titre">Confirmation Email</h1>
				</div>
			</div>

			<!-- Texte de confirmation -->
			<div class="container-md p-5">
				<!-- Texte confirmation -->
				<p class="text-center texte" id="activation">La page que vous recherchez n'est pas accessible<br>
				<!-- Bouton de retour -->
				<div class="form-group pt-5 text-center">
					<a class="btn btn-secondary pl-5 pr-5" href="connexion.php">Retour</a>
				</div>
			</div>
		</div>
		
		<?php
			include('../global/footer.php');
			include('../global/header.php');
		 	 $result;
		 	 //Recupération des donnnées utiles dans l'adresse url
		 	 if(!isset($_GET['log'])|| !isset($_GET['cle'])){
			 		$result = "La page que vous recherchez n'est pas accessible";
			 }else{
				 $login = $_GET['log'];
				 $cle = $_GET['cle'];
					//Recupération de la clé correspondant au $login dans la base de données
	 		 	 $requeteClef = $dbh->prepare("SELECT cle,verification FROM Usager WHERE Identifiant = ?");
	 		 	 if($requeteClef->execute(array($login)) && $row = $requeteClef->fetch()){
	 		 		 $clebdd = $row['cle'];
	 		 		 $actif = $row['verification'];
					 //On teste la valeur de la variable $actif récupérée dans la bdd
		 		 	 if($actif == '1'){
		 		 		 $result = "Votre compte est déjà actif !";
		 		 	 }
		 		 	 else if($actif == '2'){
		 				 $result = "Votre compte est actif mais vous avez souhaité changer de mot de passe, veuillez vous réferer à notre mail.";
		 			 }
		 			 else if($actif =='0'){
		 		 		 if($cle == $clebdd){
		 		 			 $result = "Votre compte est  activé ! Veuillez vous connecter à présent !";
		 		 			 $requeteClef2 = $dbh->prepare("UPDATE Usager SET verification = 1 WHERE Identifiant = ?");
		 		 			 $requeteClef2->execute(array($login));
		 		 		 }
		 		 		 else{
		 		 			 $result = "Erreur ! Votre compte ne peut être activé ...";
		 		 		 }
		 		 	 }
	 		 	 }
				 else{
					 $result = "La page que vous recherchez n'est pas accessible";
				 }


				}
	  	?>
		
		<script>
			$("#activation").text("<?php echo $result ?>");
		</script>
	</body>
</html>
