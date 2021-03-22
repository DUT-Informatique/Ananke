<?php
  session_start();
  include('../../global/panierFonction.php');
  header('Content-Type: text/html; charset=utf-8');

  echo supprimerArticle($_POST["idProduit"]);
?>
