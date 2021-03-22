<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$requete1 = $dbh->prepare('SELECT MotDePasse FROM Usager WHERE Identifiant = ?');
$requete1->execute(array($_POST['id']));
$ligne = $requete1->fetch();
if (password_verify($_POST["password"], $ligne[0]) && $requete1->rowCount() !== 0) {
    echo 1;
} else {
  echo 0;
}
?>
