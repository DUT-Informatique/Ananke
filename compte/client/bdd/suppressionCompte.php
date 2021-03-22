<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$requeteImage = $dbh->prepare("SELECT Image FROM Usager WHERE Identifiant = ?");
$requeteImage->execute(array($_POST["identifiant"]));
$resultat = $requeteImage->fetch();
unlink($resultat[0]);
$requeteT = $dbh->prepare("DELETE FROM Commentairearticle WHERE IdentifiantArticle  = ?");
$requeteT->execute(array($_POST['Identifiant']));
$requeteT = $dbh->prepare("DELETE FROM Adresses WHERE ID_Utilisateur = ?");
$requeteT->execute(array($_POST['Identifiant']));
$requeteT = $dbh->prepare("DELETE FROM ArticlesUsager WHERE ID_Usager = ?");
$requeteT->execute(array($_POST['Identifiant']));
$requeteT = $dbh->prepare("DELETE FROM Usager WHERE Identifiant = ?");
$requeteT->execute(array($_POST['Identifiant']));
session_start();
$_SESSION = array();
session_destroy();
header('location:https://ananke.minarox.fr');

?>
