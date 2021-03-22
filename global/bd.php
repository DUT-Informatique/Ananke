<?php
	// Informations de connexion à la base de donnée
	$dsn = 'mysql:host={host};dbname={dbname}';
	$user = '{user}';
	$password = "{password}";
	// Connexion à la base de donnée
	try {
        	$dbh = new PDO($dsn, $user, $password);
	}
    catch (Exception $e) {
		die('Erreur : '. $e->getMessage());
	}
?>
