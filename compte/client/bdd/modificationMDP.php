<?php
header('Content-Type: text/html; charset=utf-8');
require('../../../global/bd.php');
$pass_hache = password_hash($_POST["password"], PASSWORD_DEFAULT);
$requete = $dbh->prepare('UPDATE Usager SET MotDePasse = ? WHERE Identifiant = ?');
$requete->execute(array($pass_hache,htmlspecialchars($_POST['id'])));
echo "Changements données";

?>
