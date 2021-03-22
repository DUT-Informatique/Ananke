<?php
header('Content-Type: text/html; charset=utf-8');
require("../../global/bd.php");
$requete = $dbh->prepare('SELECT * FROM Adresses WHERE ID = ?');
$requete->execute(array($_POST["Identifiant"]));
$tab = array();
while ($ligne = $requete->fetch()) {

  array_push($tab, array(
    
              "Nom" => $ligne[2],
              "Prenom" => $ligne[3],
              "Adresse" => $ligne[4],
              "ComplementAdresse" => $ligne[5],
              "CodePostal" => $ligne[6],
              "Ville" => $ligne[7],
              "Telephone" => $ligne[10],
              "TelephonePortable" => $ligne[11]
            ));
}
$json = json_encode($tab);
echo $json;
?>
