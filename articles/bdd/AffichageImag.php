<?php
header('Content-Type: text/html; charset=utf-8');
require("../../global/bd.php");
$requete = $dbh->prepare('SELECT DISTINCT(Image) FROM ArticlesImages WHERE ID_Articles = ? AND Principale = ?');
$requete->execute(array($_POST["id"], "1"));
$ligne = $requete->fetch();
$resultat = $ligne[0];
echo $resultat;
?>
