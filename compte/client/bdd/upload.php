<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');
require("../../../global/bd.php");
$dossier = '../../../images/';
$fichier = $_FILES['avatar']['name'];
$taille_maxi = 500000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = "MauvaisType";
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     $ajout = "";
     $tmp = 0;
     while(file_exists($dossier .  $ajout . $fichier)){
        $ajout = $tmp + 1;
     }
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $ajout . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          if($_FILES['avatar']['error'] == "0"){
            $requeteImage = $dbh->prepare("SELECT Image FROM Usager WHERE Identifiant = ?");
            $requeteImage->execute(array($_POST["identifiant"]));
            $resultat = $requeteImage->fetch();
            unlink($resultat[0]);
            $requeteImage2 = $dbh->prepare("UPDATE Usager SET Image = ? WHERE Identifiant = ?");
            $requeteImage2->execute(array($dossier .  $ajout . $fichier,$_POST["identifiant"]));
            $resultat = 'Success';
          }
          if($_FILES['avatar']['error'] == "1" || $_FILES['avatar']['error'] == "2"){
            $resultat = "tropGros";
          }
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          $resultat = "echec";
     }
}
else
{
     $resultat = $erreur;
}
header('Location: https://ananke.minarox.fr/compte/client/mon-profil.php?id=' . $resultat);
?>
