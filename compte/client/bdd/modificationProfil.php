<?php
header('Content-Type: text/html; charset=utf-8');
require('../../../global/bd.php');
$requete1 = $dbh->prepare('SELECT Identifiant FROM Usager WHERE Identifiant = ? AND Nom = ? AND Prenom = ?');
$requete1->execute(array($_POST['Identifiant'],$_POST['Nom'],$_POST['Prenom']));
if($requete1->rowCount() !== 0 && $_POST['AncienMail'] === $_POST['Identifiant'] ){
  echo 'Données identiques : changement impossible';
}
else if ($_POST['AncienMail'] !== $_POST['Identifiant']){
  $requeteVerif = $dbh->prepare('SELECT * FROM Usager WHERE Identifiant = ?');
  $requeteVerif->execute(array($_POST['Identifiant']));
  if($requeteVerif->rowCount() !== 0){
    echo 'Mail existant : changement impossible';
  } else{
    $requete = $dbh->prepare('UPDATE Usager SET Identifiant = ?, Nom = ?, Prenom = ? WHERE Identifiant = ?');
    $requete->execute(array(htmlspecialchars($_POST['Identifiant']),htmlspecialchars($_POST['Nom']),htmlspecialchars($_POST['Prenom']), htmlspecialchars($_POST['AncienMail'])));
    echo 'Changements données (mail)';
  }
} else if($_POST['AncienMail'] === $_POST['Identifiant']){
  $requete = $dbh->prepare('UPDATE Usager SET Nom = ?, Prenom = ? WHERE Identifiant = ?');
  $requete->execute(array(htmlspecialchars($_POST['Nom']),htmlspecialchars($_POST['Prenom']),htmlspecialchars($_POST['AncienMail'])));
  echo "Changements données";
}
 ?>
