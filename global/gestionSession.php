<?php
    header('Content-Type: text/html; charset=utf-8');
	// Début de la session dans le navigateur
    session_start();
	// Si la session correspond alors
    if (isset($_SESSION['Ae78S'])) {
        // On récupère les données du compte dans la base de donnée
		$requete = $dbh->prepare('SELECT Grade,Verification,Prenom,Nom,Identifiant FROM Usager WHERE cle = ?');
        $requete->execute(array($_SESSION['Ae78S']));
        $ligne = $requete->fetch();
        $ticket = $_SESSION['Ae78S'];
        $grade = $ligne[0];
        $prenom = $ligne[2];
        $nom = $ligne[3];
        $nb = $requete->rowCount();
        $identifiant = $ligne[4];
        $codetemp = $_SESSION['ticket_messagerie'];
        $alerte = $_SESSION['alerte_messagerie'];
        // Si le compte est vérifié
		if($ligne[1] == 1) {
            if ($requete->rowCount() == 1) {
            // C'est reparti pour un tour
            $ticket = session_id().microtime().rand(0,9999999999);
			// Création du ticket de vérification
            $ticket_hash = hash('sha512', $ticket);
			// Insertion du ticket dans la base de donnée et dans la session
            $requeteT = $dbh->prepare("UPDATE Usager SET cle = ? WHERE cle = ?");
            $requeteT->execute(array($ticket_hash,$_SESSION['Ae78S']));
            $_SESSION['Ae78S'] = $ticket_hash;
            // Si le compte n'est pas vérifié
			} else {
				// Suppression du ticket de vérification dans la base de donnée
                $requeteT = $dbh->prepare("UPDATE Usager SET cle = NULL WHERE cle = ?");
                $requeteT->execute(array($_SESSION['Ae78S']));
                // On détruit la session
                $_SESSION = array();
                session_destroy();
				// On redirige vers la page de connexion
                header('location:connexion.php');
            }
        }
	// Si la session ne correspond pas alors
    } else {
		// Variable de base
        $ticket ="Rien";
        $grade = "Aucun";
        $prenom = "Aucun";
        $nom = "Aucun";
        $identifiant = "Aucun";
        $codetemp = "Aucun";
        $alerte = "Aucun";
    }
?>
