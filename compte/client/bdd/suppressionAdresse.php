<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$requeteT = $dbh->prepare("DELETE FROM Adresses WHERE ID = ?");
$requeteT->execute(array($_POST['id']));
header('location:https://ananke.minarox.fr/compte/client/mes-adresses.php');

?>
