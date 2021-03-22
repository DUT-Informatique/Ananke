<?php
  session_start();
  include('../../global/panierFonction.php');
  header('Content-Type: text/html; charset=utf-8');

  modifierQTeArticle($_POST["idProduit"],$_POST["qteProduit"]);
  echo MontantGlobal();
?>
