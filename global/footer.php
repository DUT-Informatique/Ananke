<footer class="footer fixed-bottom">
	<!-- Texte footer -->
	<div class="container-fluid m-2">
		<p class="m-0 text-center d-none d-sm-block" id="texte-footer">Copyright © 2020 Ananke.fr - Tous droits réservés</p>
		<p class="m-0 text-center d-block d-sm-none" id="texte-footer">Copyright © 2020 Ananke.fr</p>
	</div>
</footer>
<!-- Bouton de retour en haut de page -->
<div class="d-none d-sm-block" id="retour_haut"> 
	<a href="#top">
		<img src="https://dut.minarox.fr/ananke/images/retour-haut.png" alt="Retourner en haut">
	</a>
</div>
<!-- Messagerie -->
<div class="d-none d-sm-block" id="messagerie-barre">
    <!-- Bouton pour dérouler le panneau -->
    <div class="messagerie-petit panneau-sombre barre-chat-droite shadow">
        <a class="lien-sans-decoration" data-toggle="collapse" href="#messagerie" role="button" aria-expanded="false" aria-controls="messagerie">
            <div class="clearfix">
                <img class="float-left ml-3 mt-1" src="https://dut.minarox.fr/ananke/images/messagerie/Ellipse.png" alt="connecté">
                <p class="text-white float-left ml-2 m-0 mt-1 mb-1 pl-1 texte">Service client Ananké</p>
            </div>
        </a>
    </div>
    <!-- Liste des messages en attente / prit -->
    <div class="panneau-sombre collapse" id="messagerie">
        <div class="row m-0">
            <div class="col m-0 p-0 panneau-gris border-dark border-right overflow-auto tabeau-chat">
                <table class="table text-center tres-petit-texte table-striped table-hover">
                    <thead class="panneau-sombre text-white">
                        <tr>
                            <th class="align-middle m-0 p-0 pt-1 pb-1" scope="col">Client</th>
                            <th class="align-middle m-0 p-0 pt-1 pb-1" scope="col">Sujet</th>
                            <th class="align-middle m-0 p-0 pt-1 pb-1" scope="col">En attente</th>
                        </tr>
                    </thead>
                    <tbody class="alertes-messages">
                        <!-- Alertes -->
                    </tbody>
                </table>
            </div>
            <!-- Messages -->
            <div class="col m-0 p-0" id="col-msg">
                <div class="panneau-gris conversation overflow-auto">
                    <!-- Messages de la BDD -->
                </div>
                <!-- Zone de texte -->
                <div class="message">
                    <table>
                        <tr>
                            <form id="formulaire-messagerie" action="https://dut.minarox.fr/ananke/global/gestionMessagerie.php?tache=envoie" method="post">
                                <td>
                                    <input id="grade" name="grade" type="text" value="<?php echo $grade; ?>" style="display: none;">
                                    <input id="auteur" name="auteur" type="text" value="<?php echo $nom." ".$prenom; ?>" style="display: none;">
                                    <input id="message" name="message" type="text" placeholder="Ecrivez votre message..." required>
                                    <input id="localisation" name="localisation" type="text" value="<?php echo $localisation; ?>" style="display: none;">
                                    <input id="codetemp" name="codetemp" type="text" value="<?php echo $codetemp; ?>" style="display: none;">
                                    <input id="alerte" name="codetemp" type="text" value="<?php echo $alerte; ?>" style="display: none;">
                                </td>
                                <td>
                                    <input id="envoyer" type="image" name="submit" src="https://dut.minarox.fr/ananke/images/messagerie/envoyer.png" alt="envoyer">
                                </td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        // Récupération des variables de connexion
        cle = "<?php echo $ticket; ?>";
        grade = "<?php echo $grade; ?>";
        // Affichage de la messagerie en fonction de l'utilisateur
        if (cle === "Rien") {										// Si le visiteur n'est pas connecté
            $('#messagerie-barre').remove();
        } else if (cle != "Rien" && grade == 0) {					// Si le client est connecté
            $('.tabeau-chat').css("display", "none");
            $('.barre-chat-droite').css("margin-left", "0");
            $('#messagerie-barre').css("width", "300px");
			// Ajout du script de messagerie
            var imported = document.createElement('script');
            imported.src = 'https://dut.minarox.fr/ananke/global/messagerie.js';
            document.head.appendChild(imported);
        } else {
			// Ajout du script de messagerie
            var imported = document.createElement('script');
            imported.src = 'https://dut.minarox.fr/ananke/global/messagerie.js';
            document.head.appendChild(imported);
        }
</script>