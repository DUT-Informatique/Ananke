<?php
  header('Content-Type: text/html; charset=utf-8');
  require("../../global/bd.php");

  //Recupération des donnnées utiles dans l'adresse url
  $login = $_GET['log'];
  $cle = $_GET['cle'];

  //Recupération de la clé correspondant au $login dans la base de données
  $requeteClef = $dbh->prepare("SELECT cle,Verification FROM Usager WHERE Identifiant = ?");
  if($requeteClef->execute(array($login)) && $row = $requeteClef->fetch()){
    $clebdd = $row['cle'];
    $actif = $row['actif'];
  }

  //On teste la valeur de la variable $actif récupérée dans la bdd
  if($actif == '1'){
    echo "Votre compte est déjà actif !";
  }
  else{
    if($cle == $clebdd){
      echo "Votre compte a bien été activé !";
      $requeteClef2 = $dbh->prepare("UPDATE Usager SET Verification = 1 WHERE Identifiant = ?");
      $requeteClef2->execute(array($login));
    }
    else{
      echo "Erreur ! Votre compte ne peut être activé ...";
    }
  }

?>
