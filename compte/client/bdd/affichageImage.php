<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$requeteImage = $dbh->prepare("SELECT Image FROM Usager WHERE Identifiant = ?");
$requeteImage->execute(array($_POST["Identifiant"]));
$resultat = $requeteImage->fetch();
echo $resultat[0];
?>
