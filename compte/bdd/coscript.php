<?php
    header('Content-Type: text/html; charset=utf-8');
    // On inclut les dépendances
    require("../../global/bd.php");
    // On récupère les données du compte sur lequel le client veut se connecter
    $requete = $dbh->prepare('SELECT MotDePasse,Verification FROM Usager WHERE Identifiant = ?');
    $requete->execute(array($_POST["username"]));
    $ligne = $requete->fetch();
    // Si le mot de passe correspond alors
    if (password_verify($_POST["password"], $ligne[0]) && $ligne[1] === "1") {
        // On démarre une nouvelle session sur le navigateur
        session_start();
        // On génère quelque chose d'aléatoire
        $ticket = session_id().microtime().rand(0,9999999999);
        // On hash le ticket pour plus de sécurité
        $ticket_hash = hash('sha512', $ticket);
        // On insère le ticket dans la base de donnée pour le comparer ultérieurement
        $requeteT = $dbh->prepare("UPDATE Usager SET cle = ? WHERE Identifiant = ?");
        $requeteT->execute(array($ticket_hash,$_POST["username"]));
        $_SESSION['Ae78S'] = $ticket_hash;
        $_SESSION['ticket_messagerie'] = hash('sha512', $ticket);
        $_SESSION['alerte_messagerie'] = 1;
        echo "correct";
    // Si la vérification du compte n'a pas encore été validée alors
    } else if ($ligne[1] == "0" && $requete->rowCount() !== 0) {
        // Message d'erreur sur la page
        echo "Votre compte n'a pas encore été validé.";
    // Si une demande de changement de mot de passe à été réalisé mais pas terminée alors
    } else if ($ligne[1] == "2" && $requete->rowCount() !== 0) {
        // Message d'erreur sur la page
        echo "Vous avez fait dernièrement une demande de changement de mot de passe, veuillez regarder vos mails.";
    // Si les champs sont vides alors
    } else if(empty($_POST["username"])||empty($_POST["password"])) {
        // Aucun message d'erreur, on attends que la personne entre des informations dans les champs
        echo "";
    // Si les éléments ne correspondent pas alors
    } else if(!password_verify($_POST["password"], $ligne[0]) || $requete->rowCount() == 0) {
        // Message d'erreur sur la page
        echo "L'email ou le mot de passe est incorrect !";
    }
?>