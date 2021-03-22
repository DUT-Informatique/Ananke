<?php
    // Dépendances
	require('bd.php');
	require('gestionSession.php');

	// Tache par défaut de la messagerie
	$tache = "lecture";
	if (array_key_exists("tache", $_GET)) {
		$tache = $_GET['tache'];
	}
    // Détection de la variable staff
    $staff = "non";
    if (array_key_exists("staff", $_GET)) {
		$staff = $_GET['staff'];
	}
    // Détection de la variable modification
    $modification = "non";
    if (array_key_exists("modification", $_GET)) {
		$modification = $_GET['modification'];
	}

	// Choix entre écrire un message client, récupérer les alertes, répondre à un client ou juste lire les messages	
	if($ticket == "Rien"){
		return;
	} else {
		if ($tache == "envoie") {
			envoieMessage();
		} elseif ($staff == "alertes") {
			alerteMessages();
        } elseif ($modification == "alerte") {
			modificationAlerte();
        } else {
            lectureMessages();
		}
	}
	
	// Fonction d'envoie d'un message
	function envoieMessage() {
		// Imporation des variables globales
        global $dbh;
        global $codetemp;
        global $alerte;
        // Vérification des variables renvoyées en POST
		if (!array_key_exists('grade', $_POST) || !array_key_exists('auteur', $_POST) || !array_key_exists('message', $_POST) || !array_key_exists('localisation', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
        // Récupération des valeurs
		$grade = $_POST['grade'];
		$auteur = $_POST['auteur'];
		$message = $_POST['message'];
		$localisation = $_POST['localisation'];
		// Requête pour ajouter le message dans la base de donnée
        $query = $dbh->prepare("INSERT INTO Messagerie SET Grade = :grade, Auteur = :auteur, Message = :message, Localisation = :localisation, CodeTemp = :codetemp, Alerte = :alerte");
		$query->execute([
			"grade" => $grade,
			"auteur" => $auteur,
			"message" => $message,
			"localisation" => $localisation,
            "codetemp" => $codetemp,
            "alerte" => $alerte
		]);
        // Modification de la variable de session pour les alertes côtés employé
        $_SESSION['alerte_messagerie'] = 0;
        $alerte = 0;
        // Message de réussite
		echo json_encode(["statut" => "success"]);
	}

	// Fonction de lecture des messages
	function lectureMessages() {
		// Imporation des variables globales
        global $dbh;
        global $codetemp;
        // Requête pour lire les messages de la base de donnée
		$resultats = $dbh->prepare("SELECT * FROM Messagerie WHERE CodeTemp = :codetemp ORDER BY Date DESC LIMIT 20");
        $resultats->execute([
            "codetemp" => $codetemp
        ]);
		$messages = $resultats->fetchAll();
		// Envoie des données au script Ajax
		echo json_encode($messages);
	}

    // Fonction de lecture des alertes
	function alerteMessages() {
		// Imporation des variables globales
        global $dbh;
		// Requête pour récupérer les messages en attente d'une réponse
		$resultats = $dbh->query("SELECT * FROM Messagerie WHERE Alerte = '1' ORDER BY Date");
		$messages = $resultats->fetchAll();
		// Envoie des données au script Ajax
		echo json_encode($messages);
	}

    // Fonction de lecture des alertes
	function modificationAlerte() {
		// Imporation des variables globales
        global $dbh;
        global $codetemp;
        // Récupération des valeurs
        $codetempclient = $_POST['codetempclient'];
		// Requête pour modifier le ticket et l'indice d'alerte du message
		$resultats = $dbh->prepare("UPDATE Messagerie SET Alerte = '0' WHERE CodeTemp = :codetempclient");
        $resultats->execute([
			"codetempclient" => $codetempclient
		]);
		// Récupération du ticket client pour la session de l'employé
        $_SESSION['ticket_messagerie'] = $codetempclient;
        $codetemp = $codetempclient;
		// Message de réussite
        //echo json_encode($messages);
		// Actualisation de la page
        header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>