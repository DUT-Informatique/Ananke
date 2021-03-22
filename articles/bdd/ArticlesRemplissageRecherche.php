<?php
header('Content-Type: text/html; charset=utf-8');
require("../../global/bd.php");

  $resultat = array();
  $quelquesmots = htmlspecialchars($_POST["Recherche"]);
  $requete = $dbh->prepare('SELECT DISTINCT MARQUE , MODELE , TYPE FROM Articles ORDER BY MARQUE ASC, MODELE ASC, TYPE ASC');
  $requete->execute();
  $tab = array();
  while ($ligne = $requete->fetch()) {
		array_push($tab,$ligne);
	}
  foreach($tab as $test){
    for($i = 0; $i < count($test)/2; $i++){
      if(stristr($quelquesmots,$test[$i])){
          $resultat[$i] = $test[$i];
      }
    }
  }
  $categorieString = "";
  $tmp = 0;
  if(!empty($_POST["Categorie"])){
    if(count($_POST["Categorie"]) > 1 && !isset($resultat["0"]) && !isset($resultat["1"])){
      foreach($_POST["Categorie"] as $categorie){
        if($tmp == 0){
          $categorieString = $categorie . "\"" . $_POST["Valeurs"][$tmp] . "\"" . " ";
        }
        if ($_POST["Valeurs"][$tmp] === " ASC "  || $_POST["Valeurs"][$tmp] === " DESC "){
          $categorieString = $categorieString .  $categorie  . $_POST["Valeurs"][$tmp] .  " ";
        }
        else {
          $categorieString = $categorieString . " AND " .  $categorie  . "\"" . $_POST["Valeurs"][$tmp] . "\"" . " ";
        }

        $tmp+=1;
      }
    }
    else if(count($_POST["Categorie"]) > 1){
      foreach($_POST["Categorie"] as $categorie){
        $categorieString = $categorieString . " AND " . $categorie  . "\"" .  $_POST["Valeurs"][$tmp] . "\"" . " ";
        $tmp+=1;
      }
    } else if(count($_POST["Categorie"]) == 1 && !isset($resultat["0"]) && !isset($resultat["1"])){
      $categorieString = $_POST["Categorie"][0]  . "\"" .$_POST["Valeurs"][$tmp] . "\"" ." ";
    } else if(count($_POST["Categorie"]) == 1){
      $categorieString = " AND " . $_POST["Categorie"][0] . "\"" . $_POST["Valeurs"][$tmp] . "\"" . " ";
    }
  }
  if (isset($resultat["0"]) && isset($resultat["1"])){
    $requete = $dbh->prepare('SELECT * FROM Articles WHERE MARQUE = ? AND MODELE = ? ' . $categorieString . '');
    $requete->execute(array($resultat["0"],$resultat["1"]));
    //1
  } else if (isset($resultat["0"]) && !isset($resultat["1"])){
    $requete = $dbh->prepare('SELECT * FROM Articles WHERE MARQUE = ?'  . $categorieString . '');
    $requete->execute(array($resultat["0"]));
    //2
  } else if (!isset($resultat["0"]) && isset($resultat["1"])){
    $requete = $dbh->prepare('SELECT * FROM Articles WHERE MODELE = ?' . $categorieString . '');
    $requete->execute(array($resultat["1"]));
  } else if(trim($_POST["Recherche"]) === "" && $categorieString === ""){
    $requete = $dbh->prepare('SELECT * FROM Articles');
    $requete->execute();
  } else if (!isset($resultat["0"]) && !isset($resultat["1"])){
    $requete = $dbh->prepare('SELECT * FROM Articles WHERE ' . $categorieString . '');
    $requete->execute();
  }
  if(trim($_POST["Recherche"]) !== "" && !isset($resultat["0"]) && !isset($resultat["1"])){
    $json = "0";
  } else {
    $tab1=array();
    while ($ligne = $requete->fetch()) {
  		array_push($tab1,$ligne);
  	}
    $json = json_encode($tab1);
  }

  echo $json;

?>
