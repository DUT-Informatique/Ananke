<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$requete1 = $dbh->prepare('SELECT ville_id FROM villes_france_free WHERE ville_code_postal = ?');
$requete1->execute(array($_POST['cp']));
echo $requete1->rowCount() == 1;

?>
