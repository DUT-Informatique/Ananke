<?php
    require('../../global/bd.php');
	require('../../global/gestionSession.php');

    if (array_key_exists("id", $_GET)) {
		$id = $_GET['id'];
	}
	if (array_key_exists("supprimerArticle", $_GET)) {
		$idsuppr = $_GET['supprimerArticle'];
        supprimerArticle();
	}
	if (array_key_exists("ajoutCommentaire", $_GET)) {
		ajoutCommentaireClient();
	}
	if (array_key_exists("recupererImagesProduits", $_GET)) {
		$principale = $_GET['recupererImagesProduits'];
		recupererImagesProduits();
	}
	if (array_key_exists("ajoutQuestion", $_GET)) {
		ajouterQuestionClient();
	}
	if (array_key_exists("ajoutReponse", $_GET)) {
        $reponseIDQuestion = $_GET['ajoutReponse'];
		ajouterReponseClient();
	}
	if (array_key_exists("commentaires", $_GET)) {
		listeCommentaire();
	}
	if (array_key_exists("questions", $_GET)) {
		listeQuestions();
	}
	if (array_key_exists("reponses", $_GET)) {
		$reponseID = $_GET['reponses'];
		listeReponses();
	}
	if (array_key_exists("bannir", $_GET)) {
		$bannirID = $_GET['bannir'];
		bannirClient();
	}
	if (array_key_exists("supprimerCommentaire", $_GET)) {
		$messageIDCommentaire = $_GET['supprimerCommentaire'];
		supprimerMessageCommentaire();
	}
	if (array_key_exists("supprimerQuestion", $_GET)) {
		$messageIDQuestion = $_GET['supprimerQuestion'];
		supprimerMessageQuestion();
	}
    if (array_key_exists("supprimerReponse", $_GET)) {
		$messageIDReponse = $_GET['supprimerReponse'];
		supprimerMessageReponse();
	}
    if (array_key_exists("ajouterArticle", $_GET)) {
		ajouterArticle();
	}
    if (array_key_exists("modifierArticle", $_GET)) {
		$idmodif = $_GET['modifierArticle'];
        modifierArticle();
	}

	function supprimerArticle() {
		global $dbh;
		global $idsuppr;
		$resultats1 = $dbh->prepare("DELETE FROM Articles WHERE ID = :id");
        $resultats1->execute([
			"id" => $idsuppr
		]);
        $resultats2 = $dbh->prepare("DELETE FROM ArticlesImages WHERE ID_Articles = :id");
        $resultats2->execute([
			"id" => $idsuppr
		]);
        $resultats3 = $dbh->prepare("DELETE FROM ArticlesParametres WHERE ID_Articles = :id");
        $resultats3->execute([
			"id" => $idsuppr
		]);
        header('Location: https://ananke.minarox.fr/articles/recherche-article.php');
	}

	function recupererImagesProduits() {
		global $dbh;
        global $id;
        global $principale;
        $resultats = $dbh->prepare("SELECT * FROM ArticlesImages WHERE ID_Articles = :id AND Principale = :principale LIMIT 4");
        $resultats->execute([
			"id" => $id,
			"principale" => $principale
		]);
		$message = $resultats->fetchAll();
		echo json_encode($message);
	}

	function listeCommentaire() {
		global $dbh;
        global $id;
        $resultats = $dbh->prepare("SELECT * FROM CommentaireArticles WHERE IdentifiantArticle = :id");
        $resultats->execute([
			"id" => $id
		]);
		$message = $resultats->fetchAll();
		echo json_encode($message);
	}

	function listeQuestions() {
		global $dbh;
        global $id;
        $resultats = $dbh->prepare("SELECT * FROM QuestionArticle WHERE IdentifiantArticle = :id");
        $resultats->execute([
			"id" => $id
		]);
		$message = $resultats->fetchAll();
		echo json_encode($message);
	}

	function listeReponses() {
		global $dbh;
        global $reponseID;
        $resultats = $dbh->prepare("SELECT * FROM ReponseArticle WHERE IdentifiantQuestion = :reponseID");
        $resultats->execute([
			"reponseID" => $reponseID
		]);
		$message = $resultats->fetchAll();
		echo json_encode($message);
	}

	function ajoutCommentaireClient() {
		global $dbh;
        if (!array_key_exists('idArticle', $_POST) || !array_key_exists('notesClient', $_POST) || !array_key_exists('texteCommentaire', $_POST) || !array_key_exists('idClient', $_POST)  || !array_key_exists('auteur', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
		$idArticle = $_POST['idArticle'];
		$notesClient = $_POST['notesClient'];
		$texteClient = $_POST['texteCommentaire'];
		$idClient = $_POST['idClient'];
		$auteur = $_POST['auteur'];
		$resultats = $dbh->prepare("INSERT INTO CommentaireArticles SET IdentifiantArticle = :id, Notes = :notes, Texte = :texte, IdentifiantClient = :idClient, Auteur = :auteur");
        $resultats->execute([
			"id" => $idArticle,
			"notes" => $notesClient,
			"texte" => $texteClient,
			"idClient" => $idClient,
			"auteur" => $auteur
		]);
        if ($notesClient == 1) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES1 = NBNOTES1 + 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $idArticle
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($notesClient == 2) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES2 = NBNOTES2 + 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $idArticle
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($notesClient == 3) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES3 = NBNOTES3 + 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $idArticle
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($notesClient == 4) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES4 = NBNOTES4 + 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $idArticle
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($notesClient == 5) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES5 = NBNOTES5 + 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $idArticle
            ]);
            echo json_encode(["statut" => "success"]);
        }
	}

	function ajouterQuestionClient() {
		global $dbh;
        if (!array_key_exists('idArticle', $_POST) || !array_key_exists('texteQuestion', $_POST) || !array_key_exists('idClient', $_POST)  || !array_key_exists('auteur', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
		$idArticle = $_POST['idArticle'];
		$texteClient = $_POST['texteQuestion'];
		$idClient = $_POST['idClient'];
		$auteur = $_POST['auteur'];
		$resultats = $dbh->prepare("INSERT INTO QuestionArticle SET IdentifiantArticle = :id, Texte = :texte, IdentifiantClient = :idClient, Auteur = :auteur");
        $resultats->execute([
			"id" => $idArticle,
			"texte" => $texteClient,
			"idClient" => $idClient,
			"auteur" => $auteur
		]);
		echo json_encode(["statut" => "success"]);
	}

	function ajouterReponseClient() {
		global $dbh;
        global $id;
        global $reponseIDQuestion;
        if (!array_key_exists('idArticle', $_POST) || !array_key_exists('texteReponse', $_POST) || !array_key_exists('idClient', $_POST)  || !array_key_exists('auteur', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
		$idArticle = $_POST['idArticle'];
		$texteClient = $_POST['texteReponse'];
		$idClient = $_POST['idClient'];
		$auteur = $_POST['auteur'];
		$resultats = $dbh->prepare("INSERT INTO ReponseArticle SET IdentifiantArticle = :id, IdentifiantQuestion = :idQuestion, Texte = :texte, IdentifiantClient = :idClient, Auteur = :auteur");
        $resultats->execute([
			"id" => $idArticle,
			"idQuestion" => $reponseIDQuestion,
			"texte" => $texteClient,
			"idClient" => $idClient,
			"auteur" => $auteur
		]);
		echo json_encode(["statut" => "success"]);
        header('Location: https://ananke.minarox.fr/articles/article.php?id='.$id);
	}

	function bannirClient() {
		global $dbh;
		global $id;
		global $bannirID;
		$resultats = $dbh->prepare("DELETE FROM Usager WHERE Identifiant = :identifiantCompte");
        $resultats->execute([
			"identifiantCompte" => $bannirID
		]);
		echo json_encode(["statut" => "success"]);
		header('Location: https://ananke.minarox.fr/articles/article.php?id='.$id);
	}

	function supprimerMessageCommentaire() {
		global $dbh;
		global $id;
		global $messageIDCommentaire;
        $notationCommentaire = $dbh->prepare("SELECT Notes FROM CommentaireArticles WHERE ID = :messageid");
        $notationCommentaire->execute([
			"messageid" => $messageIDCommentaire
		]);
        $noteCommentaire = $notationCommentaire->fetch();
		if ($noteCommentaire[0] == 1) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES1 = NBNOTES1 - 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $id
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($noteCommentaire[0] == 2) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES2 = NBNOTES2 - 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $id
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($noteCommentaire[0] == 3) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES3 = NBNOTES3 - 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $id
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($noteCommentaire[0] == 4) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES4 = NBNOTES4 - 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $id
            ]);
            echo json_encode(["statut" => "success"]);
        } elseif ($noteCommentaire[0] == 5) {
            $ajoutNoteArticle = $dbh->prepare("UPDATE Articles SET NBNOTES5 = NBNOTES5 - 1 WHERE ID = :id");
            $ajoutNoteArticle->execute([
                "id" => $id
            ]);
            echo json_encode(["statut" => "success"]);
        }
        $resultats = $dbh->prepare("DELETE FROM CommentaireArticles WHERE ID = :messageid");
        $resultats->execute([
			"messageid" => $messageIDCommentaire
		]);
		header('Location: https://ananke.minarox.fr/articles/article.php?id='.$id);
	}

	function supprimerMessageQuestion() {
		global $dbh;
		global $id;
		global $messageIDQuestion;
		$resultats = $dbh->prepare("DELETE FROM QuestionArticle WHERE ID = :messageid");
        $resultats->execute([
			"messageid" => $messageIDQuestion
		]);
		echo json_encode(["statut" => "success"]);
		header('Location: https://ananke.minarox.fr/articles/article.php?id='.$id);
	}

    function supprimerMessageReponse() {
		global $dbh;
		global $id;
		global $messageIDReponse;
		$resultats = $dbh->prepare("DELETE FROM ReponseArticle WHERE ID = :messageid");
        $resultats->execute([
			"messageid" => $messageIDReponse
		]);
		echo json_encode(["statut" => "success"]);
		header('Location: https://ananke.minarox.fr/articles/article.php?id='.$id);
	}

    function ajouterArticle() {
		global $dbh;
        global $idTemporaire;
        if (!array_key_exists('titre', $_POST) || !array_key_exists('marque', $_POST) || !array_key_exists('modele', $_POST)  || !array_key_exists('description', $_POST)  || !array_key_exists('type', $_POST)  || !array_key_exists('sous-type', $_POST)  || !array_key_exists('prix', $_POST)  || !array_key_exists('cible', $_POST) || !array_key_exists('taille', $_POST)  || !array_key_exists('couleur', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
		$titre = $_POST['titre'];
		$marque = $_POST['marque'];
		$modele = $_POST['modele'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$soustype = $_POST['sous-type'];
		$prix = $_POST['prix'];
		$cible = $_POST['cible'];
        $taille = $_POST['taille'];
		$couleur = $_POST['couleur'];
		$resultats1 = $dbh->prepare("INSERT INTO Articles SET TITRE = :titre, MARQUE = :marque, MODELE = :modele, DESCRIPTION = :description, TYPE = :type, SOUSTYPE = :soustype, PRIX = :prix, CIBLE = :cible");
        $resultats1->execute([
			"titre" => $titre,
			"marque" => $marque,
			"modele" => $modele,
			"description" => $description,
			"type" => $type,
			"soustype" => $soustype,
			"prix" => $prix,
			"cible" => $cible

		]);
        $resultats2 = $dbh->prepare("SELECT ID FROM Articles WHERE TITRE = :titre AND MARQUE = :marque AND MODELE = :modele AND DESCRIPTION = :description AND TYPE = :type AND SOUSTYPE = :soustype AND PRIX = :prix AND CIBLE = :cible");
        $resultats2->execute([
			"titre" => $titre,
			"marque" => $marque,
			"modele" => $modele,
			"description" => $description,
			"type" => $type,
			"soustype" => $soustype,
			"prix" => $prix,
			"cible" => $cible

		]);
        $ligne = $resultats2->fetch();
        $idTemporaire = $ligne[0];
        $resultats3 = $dbh->prepare("INSERT INTO ArticlesParametres SET ID_Articles = :idTemporaire, Taille = :taille, Couleurs = :couleur");
        $resultats3->execute([
			"idTemporaire" => $idTemporaire,
            "taille" => $taille,
			"couleur" => $couleur

		]);
		echo json_encode(["statut" => "success"]);
        header('Location: https://ananke.minarox.fr/articles/recherche-article.php');
	}

    function modifierArticle() {
		global $dbh;
        global $idmodif;
        if (!array_key_exists('titre', $_POST) || !array_key_exists('marque', $_POST) || !array_key_exists('modele', $_POST)  || !array_key_exists('description', $_POST)  || !array_key_exists('type', $_POST)  || !array_key_exists('sous-type', $_POST)  || !array_key_exists('prix', $_POST)  || !array_key_exists('cible', $_POST) || !array_key_exists('taille', $_POST)  || !array_key_exists('couleur', $_POST)) {
			echo json_encode(["statut" => "error"]);
			return;
		}
		$titre = $_POST['titre'];
		$marque = $_POST['marque'];
		$modele = $_POST['modele'];
		$description = $_POST['description'];
		$type = $_POST['type'];
		$soustype = $_POST['sous-type'];
		$prix = $_POST['prix'];
		$cible = $_POST['cible'];
        $taille = $_POST['taille'];
		$couleur = $_POST['couleur'];
		$resultats1 = $dbh->prepare("UPDATE Articles SET TITRE = :titre, MARQUE = :marque, MODELE = :modele, DESCRIPTION = :description, TYPE = :type, SOUSTYPE = :soustype, PRIX = :prix, CIBLE = :cible WHERE ID = :id");
        $resultats1->execute([
			"titre" => $titre,
			"marque" => $marque,
			"modele" => $modele,
			"description" => $description,
			"type" => $type,
			"soustype" => $soustype,
			"prix" => $prix,
			"cible" => $cible,
            "id" => $idmodif

		]);
        $resultats2 = $dbh->prepare("UPDATE ArticlesParametres SET Taille = :taille, Couleurs = :couleur WHERE ID_Articles = :id");
        $resultats2->execute([
			"taille" => $taille,
			"couleur" => $couleur,
            "id" => $idmodif

		]);
		echo json_encode(["statut" => "success"]);
        header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>