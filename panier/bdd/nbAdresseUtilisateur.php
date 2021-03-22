<?php
  header('Content-Type: text/html; charset=utf-8');
  require("../../global/bd.php");
  $requeteNb = $dbh->prepare('SELECT COUNT(*) AS nb FROM Adresses WHERE ID_Utilisateur = ?');
  $requeteNb->execute(array($_POST["Identifiant"]));
  $resultat = $requeteNb->fetch();
  echo $resultat[0];

?>
