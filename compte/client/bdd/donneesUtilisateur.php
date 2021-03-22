<?php
  header('Content-Type: text/html; charset=utf-8');
  require("../../../global/bd.php");
  $requete = $dbh->prepare('SELECT Nom,Prenom,Identifiant FROM Usager WHERE cle = ?');
  $requete->execute(array($_POST["cle"]));
  $ligne = $requete->fetch();
  $json = json_encode($ligne);
  echo $json;
?>
