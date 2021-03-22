<?php
    // On démarre une session dans le navigateur
    session_start();
    // On ajoute les dépendances pour le fichier
    require('bd.php');
    // On remplace le ticket de vérification présent dans la base de donnée
    $requeteT = $dbh->prepare("UPDATE Usager SET cle = NULL WHERE cle = ?");
    $requeteT->execute(array($_SESSION['Ae78S']));
    // On détruit le ticket et la session
    $_SESSION = array();
    session_destroy();
    // On redirige le client vers la page d'accueil
    header('location:https://dut.minarox.fr/ananke');
?>