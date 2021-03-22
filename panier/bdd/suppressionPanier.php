<?php
session_start();
include('../../global/panierFonction.php');
header('Content-Type: text/html; charset=utf-8');
supprimePanier();
header('Location: https://ananke.minarox.fr/panier/panier.php');
 ?>
