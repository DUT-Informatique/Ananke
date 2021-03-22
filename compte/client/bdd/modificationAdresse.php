<?php
header('Content-Type: text/html; charset=utf-8');
require('../../../global/bd.php');
//On voit si l'utilisateur a des adresses déjà inscrites

$requeteNb = $dbh->prepare('SELECT COUNT(*) AS nb FROM Adresses WHERE ID_Utilisateur = ?');
$requeteNb->execute(array($_POST["Identifiant"]));
$resultat = $requeteNb->fetch();
//Adaptation des inputs facturation et livraison
if($_POST["Facturation"] === "true"){$facturation = 1;}else{$facturation=0;}
if($_POST["Livraison"] === "true"){$livraison = 1;}else{$livraison=0;}

//On regarde si l'adresse inséré n'existe pas déjà
$requete = $dbh->prepare('SELECT * FROM Adresses WHERE ID_Utilisateur = ? AND Nom = ? AND Prenom = ? AND Adresse = ? AND ComplementAdresse = ? AND CodePostal = ? AND Ville = ?');
$requete->execute(array($_POST['Identifiant'],$_POST['Nom'],$_POST['Prenom'],$_POST['Adresse'],$_POST['ComplementAdresse'],$_POST['CodePostal'],$_POST['Ville']));

//Si la personne n'a pas d'adresse ou qu'elle souhaite en ajouter une alors qu'elle en a déjà
if($resultat[0] == 0 || $_POST["Emplacement"] === "nouveau" && $requete->rowCount() == 0){
  $requeteAjout = $dbh->prepare('INSERT INTO `Adresses` (`ID_Utilisateur`,`Nom`,`Prenom`,`Adresse`,`ComplementAdresse`,`CodePostal`,`Ville`,`Facturation`,`Livraison`,`Telephone`,`TelephonePortable`) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
  $requeteAjout->execute(array(htmlspecialchars($_POST['Identifiant']),htmlspecialchars($_POST['Nom']),htmlspecialchars($_POST['Prenom']),htmlspecialchars($_POST['Adresse']),htmlspecialchars($_POST['ComplementAdresse']),htmlspecialchars($_POST['CodePostal']),htmlspecialchars($_POST['Ville']),$facturation,$livraison,htmlspecialchars($_POST["TelFixe"]),htmlspecialchars($_POST["TelPortable"])));
  echo "Données ajoutées";
} else if ($resultat[0] == 0 || $_POST["Emplacement"] === "nouveau" && $requete->rowCount() == 1){
  //Si l'adresse que l'utilisateur veut ajouté existe déjà dans ses adresses
  echo "Données existantes";
}
//Gestion des cas où l'utilisateur modifie une adresse
$requete1 = $dbh->prepare('SELECT * FROM Adresses WHERE ID_Utilisateur = ? AND Nom = ? AND Prenom = ? AND Adresse = ? AND ComplementAdresse = ? AND CodePostal = ? AND Ville = ? AND Facturation = ? AND Livraison = ? AND Telephone = ? AND TelephonePortable = ?');
$requete1->execute(array($_POST['Identifiant'],$_POST['Nom'],$_POST['Prenom'],$_POST['Adresse'],$_POST['ComplementAdresse'],$_POST['CodePostal'],$_POST['Ville'],$facturation,$livraison,$_POST["TelFixe"],$_POST["TelPortable"]));
if($requete1->rowCount() != 0 && $_POST["Emplacement"] !== "nouveau"){
    //Si l'utilisateur appuye sur le bouton de modification sans avoir modifié quoi que ce soit
    echo 'Données identiques : changement impossible';
} else if($_POST["Emplacement"] !== "nouveau") {
  //Les deux ifs permettent de faire en sorte qu'il n'y ait qu'une adresse de facturation et qu'une adresse de livraison
  if($facturation == 1){
    $requeteF = $dbh->prepare('UPDATE Adresses SET Facturation = 0 WHERE Facturation = 1 AND ID_Utilisateur = ?');
    $requeteF->execute(array(htmlspecialchars($_POST['Identifiant']));
  }
  if($livraison == 1){
    $requeteL = $dbh->prepare('UPDATE Adresses SET Livraison = 0 WHERE Livraison = 1 AND ID_Utilisateur = ?');
    $requeteL->execute(array(htmlspecialchars($_POST['Identifiant']));
  }
    //Modification des adresses 
    $requeteL->execute(array());
    $requete = $dbh->prepare('UPDATE Adresses SET ID_Utilisateur = ?, Nom = ?, Prenom = ?, Adresse = ?, ComplementAdresse = ?, CodePostal = ?, Ville = ?, Facturation = ?, Livraison = ?, Telephone = ?, TelephonePortable = ? WHERE ID = ?');
    $requete->execute(array(htmlspecialchars($_POST['Identifiant']),htmlspecialchars($_POST['Nom']),htmlspecialchars($_POST['Prenom']),htmlspecialchars($_POST['Adresse']),htmlspecialchars($_POST['ComplementAdresse']),htmlspecialchars($_POST['CodePostal']),htmlspecialchars($_POST['Ville']),$facturation,$livraison,htmlspecialchars($_POST["TelFixe"]),htmlspecialchars($_POST["TelPortable"]),$_POST['id_adresse']));
    echo "Données modifiées";
}

 ?>
