<?php
  header('Content-Type: text/html; charset=utf-8');
  require("../../global/bd.php");
  $requeteVerification = $dbh->prepare('SELECT DISTINCT SOUSTYPE FROM Articles WHERE TYPE = ?');
  $requeteVerification->execute(array($_POST["type"]));
  $tab = array();
  while ($ligne = $requeteVerification->fetch()) {
		array_push($tab,$ligne);
	}
  $json = json_encode($tab);
  echo $json;
?>
