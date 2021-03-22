<?php
	/**
	 * Verifie si le panier existe, le crée sinon
	 * @return booleen
	 */
	function creationPanier() {
	   if (!isset($_SESSION['panier'])) {
		  $_SESSION['panier']=array();
		  $_SESSION['panier']['libelleProduit'] = array();
		  $_SESSION['panier']['qteProduit'] = array();
		  $_SESSION['panier']['prixProduit'] = array();
		  $_SESSION['panier']['couleurProduit'] = array();
		  $_SESSION['panier']['tailleProduit'] = array();
		  $_SESSION['panier']['idProduit'] = array();
		  $_SESSION['panier']['LivraisonPrix'] = 0;
		  //Permet de verouiller le panier lors des étapes de paiements
		  $_SESSION['panier']['verrou'] = false;
	   }
	   return true;
	}


	/**
	 * Ajoute un article dans le panier
	 * @param string $libelleProduit
	 * @param int $qteProduit
	 * @param float $prixProduit
	 * @return void
	 */
	function ajouterArticle($libelleProduit,$qteProduit,$prixProduit,$couleurProduit,$tailleProduit,$idProduit) {
	   //Si le panier existe
	   if (creationPanier() && !isVerrouille()) {
		  //Si le produit existe déjà on ajoute seulement la quantité
		  $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
		  if ($positionProduit !== false) {
			 $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
		  } else {
			 //Sinon on ajoute le produit
			 array_push( $_SESSION['panier']['idProduit'],$idProduit);
			 array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
			 array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
			 array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
			 array_push( $_SESSION['panier']['couleurProduit'],$couleurProduit);
			 array_push( $_SESSION['panier']['tailleProduit'],$tailleProduit);
		  }
	   } else {
	   		echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	   }
	}


	/**
	 * Modifie la quantité d'un article
	 * @param $libelleProduit
	 * @param $qteProduit
	 * @return void
	 */
	function modifierQTeArticle($idProduit,$qteProduit) {
	   //Si le panier existe
	   if (creationPanier() && !isVerrouille()) {
		  //Si la quantité est positive on modifie sinon on supprime l'article
		  if ($qteProduit > 0) {
			 //Recharche du produit dans le panier
			 $positionProduit = array_search($idProduit,  $_SESSION['panier']['idProduit']);
			 if ($positionProduit !== false) {
				$_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
			 }
		  } else {
			  supprimerArticle($idProduit);
		  }
	   } else {
		   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	   }
	}


	/**
	 * Supprime un article du panier
	 * @param $libelleProduit
	 * @return unknown_type
	 */
	function supprimerArticle($idProduit){
	   //Si le panier existe
	   if (creationPanier() && !isVerrouille()) {
		  //Nous allons passer par un panier temporaire
		  $tmp=array();
		  $tmp['idProduit'] = array();
		  $tmp['qteProduit'] = array();
		  $tmp['prixProduit'] = array();
		  $tmp['libelleProduit'] = array();
		  $tmp['couleurProduit'] = array();
		  $tmp['tailleProduit'] = array();
		  $tmp['verrou'] = $_SESSION['panier']['verrou'];
		  for($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
			 if ($_SESSION['panier']['idProduit'][$i] !== $idProduit) {
				array_push(  $tmp['idProduit'],$_SESSION['panier']['idProduit'][$i]);
				array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
				array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
				array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
				array_push( $tmp['couleurProduit'],$_SESSION['panier']['couleurProduit'][$i]);
				array_push( $tmp['tailleProduit'],$_SESSION['panier']['tailleProduit'][$i]);
			 }
		  }
		  //On remplace le panier en session par notre panier temporaire à jour
		  $_SESSION['panier'] =  $tmp;
		  //On efface notre panier temporaire
		  unset($tmp);
	   } else {
		   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
	   }
	}


	/**
	 * Montant total du panier
	 * @return int
	 */
	function MontantGlobal() {
	   $total=0;
	   for($i = 0; $i < count($_SESSION['panier']['idProduit']); $i++) {
		  $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
	   }
	   return $total;
	}


	/**
	 * Fonction de suppression du panier
	 * @return void
	 */
	function supprimePanier() {
	   unset($_SESSION['panier']);
	}


	/**
	 * Permet de savoir si le panier est verrouillé
	 * @return booleen
	 */
	function isVerrouille() {
		if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou']) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * Compte le nombre d'articles différents dans le panier
	 * @return int
	 */
	function compterArticles() {
	   if (isset($_SESSION['panier'])) {
		   return count($_SESSION['panier']['idProduit']);
	   } else {
		   return 0;
	   }
	}

?>