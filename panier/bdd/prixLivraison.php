<?php
  session_start();
  include('../../global/panierFonction.php');
  header('Content-Type: text/html; charset=utf-8');
  $_SESSION['panier']['LivraisonPrix'] = $_POST["Livraison"];
  echo MontantGlobal();
?>
