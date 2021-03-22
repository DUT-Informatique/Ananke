<?php
  $valeurmdp = $_POST["password"];
  if(preg_match('#^(?=.*\W)#',$valeurmdp)){
    $spec = "1";
  }
  else{
    $spec = "0";
  }
  if(preg_match('#^(?=.*[a-z])#',$valeurmdp)){
    $min = "1";
  }
  else{
    $min = "0";
  }
  if(preg_match('#^(?=.*[A-Z])#',$valeurmdp)){
    $maj = "1";
  }
  else{
    $maj = "0";
  }
  if (strlen($valeurmdp) > 9) {
    $nbCar = "1";
  }
  else{
    $nbCar = "0";
  }
  $tab=array(
    "spec" => $spec,
    "min" => $min,
    "maj" => $maj,
    "nbCar" => $nbCar
  );
  $json = json_encode($tab);
  echo $json;
?>
