<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
  $requeteImage = $dbh->prepare("SELECT Image FROM Usager WHERE Identifiant = ?");
  $requeteImage->execute(array($_GET["identifiant"]));
  $resultat = $requeteImage->fetch();
  unlink($resultat[0]);
  $requeteT = $dbh->prepare("UPDATE Usager SET Image = NULL WHERE Identifiant = ?");
  $requeteT->execute(array($_GET['identifiant']));
  // On détruit la session
  header('location:https://ananke.minarox.fr/compte/client/mon-profil.php');
?>
