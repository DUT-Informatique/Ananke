<?php
	require('../../../global/bd.php');
	require('../../../global/gestionSession.php');

	// Tache par défaut de la messagerie
	$compte = "rien";
	if (array_key_exists("compte", $_GET)) {
		$compte = $_GET['compte'];
	}

	// Choix entre écrire un message client, employé ou lire les messages	
	if($ticket == "Rien"){
		return;
	} else {
		if ($compte == "employe") {
			listeEmploye();
		} elseif ($compte == "administrateur") {
            listeAdministrateur();
        } elseif ($compte == "modification") {
            modificationCompte();
        } elseif ($compte == "suppression") {
            suppressionCompte();
        } elseif ($compte == "rien") {
            return;
        }
	}

	// Fonction de lecture des messages
	function listeEmploye() {
		global $dbh;
		$resultats = $dbh->query("SELECT * FROM Usager WHERE Grade = '1'");
		$messages = $resultats->fetchAll();
		echo json_encode($messages);
	}

    // Fonction de lecture des messages
	function listeAdministrateur() {
		global $dbh;
		$resultats = $dbh->query("SELECT * FROM Usager WHERE Grade = '2'");
		$messages = $resultats->fetchAll();
		echo json_encode($messages);
	}

    // Fonction de lecture des messages
	function modificationCompte() {
		global $dbh;
        if (!array_key_exists('nomCompte', $_POST) || !array_key_exists('prenomCompte', $_POST) || !array_key_exists('adresseMailCompte', $_POST) || !array_key_exists('gradeCompte', $_POST) || !array_key_exists('ancienIdentifiantCompte', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
        $nomCompte = $_POST['nomCompte'];
        $prenomCompte = $_POST['prenomCompte'];
        $adresseMailCompte = $_POST['adresseMailCompte'];
        $ancienIdentifiantCompte = $_POST['ancienIdentifiantCompte'];
        $gradeCompte = $_POST['gradeCompte'];
		$resultats = $dbh->prepare("UPDATE Usager SET Identifiant = :adresseMailCompte, Nom = :nomCompte, Prenom = :prenomCompte, Grade = :gradeCompte WHERE Identifiant = :ancienIdentifiantCompte");
        $resultats->execute([
			"nomCompte" => $nomCompte,
			"prenomCompte" => $prenomCompte,
			"adresseMailCompte" => $adresseMailCompte,
			"ancienIdentifiantCompte" => $ancienIdentifiantCompte,
			"gradeCompte" => $gradeCompte
		]);
		echo json_encode(["statut" => "success"]);
        header('Location: https://ananke.minarox.fr/compte/staff/gestion-comptes.php');
	}

    // Fonction de lecture des messages
	function suppressionCompte() {
		global $dbh;
        if (!array_key_exists('identifiantCompte', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
        $identifiantCompte = $_POST['identifiantCompte'];
		$resultats = $dbh->prepare("DELETE FROM Usager WHERE Identifiant = :identifiantCompte");
        $resultats->execute([
			"identifiantCompte" => $identifiantCompte
		]);
		echo json_encode(["statut" => "success"]);
        header('Location: https://ananke.minarox.fr/compte/staff/gestion-comptes.php');
	}
?>