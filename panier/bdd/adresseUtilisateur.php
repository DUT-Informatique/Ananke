<?php
  header('Content-Type: text/html; charset=utf-8');
  require("../../global/bd.php");
  $requete = $dbh->prepare('SELECT * FROM Adresses WHERE ID_Utilisateur = ?');
  $requete->execute(array($_POST["Identifiant"]));
  $tab = array();
  $i = 0;
  while ($ligne = $requete->fetch()) {
    $i=$i+1;
		array_push($tab, array(
                "id"=>$ligne[0],
                "nombre" =>$i,
                "Nom" => $ligne[2],
								"Prenom" => $ligne[3],
								"Adresse" => $ligne[4],
								"ComplementAdresse" => $ligne[5],
                "CodePostal" => $ligne[6],
                "Ville" => $ligne[7],
                "Facturation" => $ligne[8],
                "Livraison" => $ligne[9],
                "Telephone" => $ligne[10],
                "TelephonePortable" => $ligne[11]
              ));
	}
  $json = json_encode($tab);
  echo $json;
?>
