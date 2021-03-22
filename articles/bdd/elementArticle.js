function recupererImagesProduit(id) {
	const requeteAjax = new XMLHttpRequest();
    const lienRequeteAjax = "bdd/gestionArticle.php?id="+id+"&recupererImagesProduits=1";
	requeteAjax.open("GET", lienRequeteAjax);
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message) {
			return `
				<!-- Image -->
				<div class="col">
					<a class="lien-sans-decoration" id="image" href="#">
						<img class="mx-auto d-block img-fluid petite-image-article" src="${message.Image}" alt="Autres images">
					</a>
				</div>	
			`
		}).join('');
		const emplacement = document.querySelector('.autres-images-produits');
		emplacement.innerHTML = html;
	}
	requeteAjax.send();
}

function recupererAutresCouleursImagesProduit(id) {
	const requeteAjax = new XMLHttpRequest();
    const lienRequeteAjax = "bdd/gestionArticle.php?id="+id+"&recupererImagesProduits=0";
	requeteAjax.open("GET", lienRequeteAjax);
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message) {
			return `
				<!-- Autres couleurs -->
				<div class="col">
					<a class="lien-sans-decoration" id="${message.Couleurs}" href="#">
						<img class="mx-auto d-block img-fluid autres-couleurs-article" src="${message.Image}" alt="${message.Couleurs}">
					</a>
				</div>
			`
		}).join('');
		const emplacement = document.querySelector('.images-autres-couleurs');
		emplacement.innerHTML = html;
	}
	requeteAjax.send();
}

function recupererCommentaires(id) {
	const requeteAjax = new XMLHttpRequest();
    const lienRequeteAjax = "bdd/gestionArticle.php?id="+id+"&commentaires=1";
	requeteAjax.open("GET", lienRequeteAjax);
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message) {
			if (cle != "Rien" && grade == 1 || grade == 2) {
                return `
                    <div class="container mb-3">
                        <div class="row">
                            <!-- Nom de l'utilisateur -->
                            <div class="col-sm">
                                <p class="m-0 texte-nom">
                                    ${message.Auteur}<a class="ml-3 btn btn-rouge text-white p-0 pl-3 pr-3 bouton-employe" id="bannir" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&bannir=${message.IdentifiantClient}">Bannir</a>
                                </p>
                            </div>
                            <div class="col-sm-4 align-self-center d-none d-sm-block text-right">
                                ${message.Notes} etoiles
                            </div>
                            <div class="col-sm-4 align-self-center d-block d-sm-none">
                                ${message.Notes} etoiles
                            </div>
                        </div>
                        <!-- Commentaire -->
                        <p class="texte mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <!-- Date -->
                        <p class="m-0 texte-date">
                            Le ${message.DatePublication}
                            <!-- Suppression du message -->
                            <a class="text-dark ml-3 lien-sans-decoration bouton-employe" id="supprimer-message" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&supprimerCommentaire=${message.ID}">
                                <svg class="bi bi-x-circle-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                `
            } else {
                return `
                    <div class="container mb-3">
                        <div class="row">
                            <!-- Nom de l'utilisateur -->
                            <div class="col-sm">
                                <p class="m-0 texte-nom">
                                    ${message.Auteur}
                                </p>
                            </div>
                            <div class="col-sm-4 align-self-center d-none d-sm-block text-right">
                                ${message.Notes} etoiles
                            </div>
                            <div class="col-sm-4 align-self-center d-block d-sm-none">
                                ${message.Notes} etoiles
                            </div>
                        </div>
                        <!-- Commentaire -->
                        <p class="texte mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <!-- Date -->
                        <p class="m-0 texte-date">
                            Le ${message.DatePublication}
                        </p>
                    </div>
                `
            }
		}).join('');
		const emplacement = document.querySelector('.commentaires-client-liste');
		emplacement.innerHTML = html;
	}
	requeteAjax.send();
}

function recupererQuestions(id, identifiantClient, auteur) {
	const requeteAjax = new XMLHttpRequest();
    const lienRequeteAjax = "bdd/gestionArticle.php?id="+id+"&questions=1";
	requeteAjax.open("GET", lienRequeteAjax);
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message){
			if (cle != "Rien" && grade == 1 || grade == 2) {
                return `
                    <div class="container mb-3">
                        <!-- Nom de l'utilisateur -->
                        <p class="m-0 texte-nom">
                            ${message.Auteur}<a class="ml-3 btn btn-rouge text-white p-0 pl-3 pr-3 bouton-employe" id="bannir" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&bannir=${message.IdentifiantClient}">Bannir</a>
                        </p>
                        <!-- Commentaire -->
                        <p class="texte mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <div class="row">
                            <div class="col">
                                <!-- Date -->
                                <p class="m-0 texte-date">
                                    Le ${message.DatePublication}
                                    <!-- Suppression du message -->
                                    <a class="text-dark ml-3 lien-sans-decoration bouton-employe" id="supprimer-message" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&supprimerQuestion=${message.ID}">
                                        <svg class="bi bi-x-circle-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col d-none d-sm-block text-right">
                                <p class="m-0 texte-date">
                                    <a class="mr-4 commentaires-client" data-toggle="collapse" href="#repondre${message.ID}" role="button" aria-expanded="false" aria-controls="repondre${message.ID}">
                                        Répondre
                                    </a>
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col-md d-block d-sm-none mt-1">
                                <p class="m-0 texte-date">
                                    <a class="mr-4 commentaires-client" data-toggle="collapse" href="#repondre${message.ID}" role="button" aria-expanded="false" aria-controls="repondre${message.ID}">
                                        Répondre
                                    </a>
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-3 pl-5 collapse" id="repondre${message.ID}">
                        <form method="post" class="reponse-client" action="bdd/gestionArticle.php?ajoutReponse=${message.ID}">
                            <div class="row mt-3">
                                <!-- Titre et notation -->
                                <div class="align-self-center ml-0 ml-md-5 col-md-3 offset-md-0 col-lg-2 col-12 col-sm-12">
                                    <!-- Titre -->
                                    <h4 class="m-0 petit-titre">
                                        Répondre :
                                    </h4>
                                </div>
                                <!-- Zone de texte -->
                                <input name="idArticle" id="idArticle-reponse" type="text" value="${message.IdentifiantArticle}" style="display: none;">
                                <input name="idQuestion" id="idQuestion-reponse" type="text" value="${message.ID}" style="display: none;">
                                <div class="mt-2 mt-md-0 offset-md-0 col-md-7 col-lg-8">
                                    <textarea class="form-control bordures" id="formulaire-texte-reponse" name="texteReponse" rows="1" required></textarea>
                                </div>
                                <input name="idClient" id="idClient-reponse" type="text" value="${identifiantClient}" style="display: none;">
                                <input name="auteur" id="auteur-reponse" type="text" value="${auteur}" style="display: none;">
                                <!-- Bouton d'envoie -->
                                <div class="col-md-1 text-center mt-2 mt-md-0 col-sm-12 col-12">
                                    <button class="btn btn-primary ml-xl-n3 ml-md-n4 submit-reponse" id="submit-reponse" type="submit">Envoyer</button>
                                </div>
                          </div>
                        </form>
                    </div>
                    <div class="container mb-3 pl-0 pl-md-5 collapse reponses-questions-client-${message.ID}" id="reponses${message.ID}">
                        ${recupererReponses(message.IdentifiantArticle, message.ID)}
                    </div>
                `
            } else if (cle != "Rien" && grade == 0) {
                return `
                    <div class="container mb-3">
                        <!-- Nom de l'utilisateur -->
                        <p class="m-0 texte-nom">
                            ${message.Auteur}
                        </p>
                        <!-- Commentaire -->
                        <p class="texte mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <div class="row">
                            <div class="col">
                                <!-- Date -->
                                <p class="m-0 texte-date">
                                    Le ${message.DatePublication}
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col d-none d-sm-block text-right">
                                <p class="m-0 texte-date">
                                    <a class="mr-4 commentaires-client" data-toggle="collapse" href="#repondre${message.ID}" role="button" aria-expanded="false" aria-controls="repondre${message.ID}">
                                        Répondre
                                    </a>
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col-md d-block d-sm-none mt-1">
                                <p class="m-0 texte-date">
                                    <a class="mr-4 commentaires-client" data-toggle="collapse" href="#repondre${message.ID}" role="button" aria-expanded="false" aria-controls="repondre${message.ID}">
                                        Répondre
                                    </a>
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-3 pl-5 collapse" id="repondre${message.ID}">
                        <form method="post" class="reponse-client" action="bdd/gestionArticle.php?ajoutReponse=${message.ID}">
                            <div class="row mt-3">
                                <!-- Titre et notation -->
                                <div class="align-self-center ml-0 ml-md-5 col-md-3 offset-md-0 col-lg-2 col-12 col-sm-12">
                                    <!-- Titre -->
                                    <h4 class="m-0 petit-titre">
                                        Répondre :
                                    </h4>
                                </div>
                                <!-- Zone de texte -->
                                <input name="idArticle" id="idArticle-reponse" type="text" value="${message.IdentifiantArticle}" style="display: none;">
                                <input name="idQuestion" id="idQuestion-reponse" type="text" value="${message.ID}" style="display: none;">
                                <div class="mt-2 mt-md-0 offset-md-0 col-md-7 col-lg-8">
                                    <textarea class="form-control bordures" id="formulaire-texte-reponse" name="texteReponse" rows="1" required></textarea>
                                </div>
                                <input name="idClient" id="idClient-reponse" type="text" value="${identifiantClient}" style="display: none;">
                                <input name="auteur" id="auteur-reponse" type="text" value="${auteur}" style="display: none;">
                                <!-- Bouton d'envoie -->
                                <div class="col-md-1 text-center mt-2 mt-md-0 col-sm-12 col-12">
                                    <button class="btn btn-primary ml-xl-n3 ml-md-n4 submit-reponse" id="submit-reponse" type="submit">Envoyer</button>
                                </div>
                          </div>
                        </form>
                    </div>
                    <div class="container mb-3 pl-0 pl-md-5 collapse reponses-questions-client-${message.ID}" id="reponses${message.ID}">
                        ${recupererReponses(message.IdentifiantArticle, message.ID)}
                    </div>
                ` 
            } else {
                return `
                    <div class="container mb-3">
                        <!-- Nom de l'utilisateur -->
                        <p class="m-0 texte-nom">
                            ${message.Auteur}
                        </p>
                        <!-- Commentaire -->
                        <p class="texte mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <div class="row">
                            <div class="col">
                                <!-- Date -->
                                <p class="m-0 texte-date">
                                    Le ${message.DatePublication}
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col d-none d-sm-block text-right">
                                <p class="m-0 texte-date">
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                            <!-- Actions -->
                            <div class="col-md d-block d-sm-none mt-1">
                                <p class="m-0 texte-date">
                                    <a data-toggle="collapse" href="#reponses${message.ID}" role="button" aria-expanded="false" aria-controls="reponses${message.ID}">
                                        Voir les réponses
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-3 pl-5 collapse" id="repondre${message.ID}">
                        <form method="post" class="reponse-client" action="bdd/gestionArticle.php?ajoutReponse=${message.ID}">
                            <div class="row mt-3">
                                <!-- Titre et notation -->
                                <div class="align-self-center ml-0 ml-md-5 col-md-3 offset-md-0 col-lg-2 col-12 col-sm-12">
                                    <!-- Titre -->
                                    <h4 class="m-0 petit-titre">
                                        Répondre :
                                    </h4>
                                </div>
                                <!-- Zone de texte -->
                                <input name="idArticle" id="idArticle-reponse" type="text" value="${message.IdentifiantArticle}" style="display: none;">
                                <input name="idQuestion" id="idQuestion-reponse" type="text" value="${message.ID}" style="display: none;">
                                <div class="mt-2 mt-md-0 offset-md-0 col-md-7 col-lg-8">
                                    <textarea class="form-control bordures" id="formulaire-texte-reponse" name="texteReponse" rows="1" required></textarea>
                                </div>
                                <input name="idClient" id="idClient-reponse" type="text" value="${identifiantClient}" style="display: none;">
                                <input name="auteur" id="auteur-reponse" type="text" value="${auteur}" style="display: none;">
                                <!-- Bouton d'envoie -->
                                <div class="col-md-1 text-center mt-2 mt-md-0 col-sm-12 col-12">
                                    <button class="btn btn-primary ml-xl-n3 ml-md-n4 submit-reponse" id="submit-reponse" type="submit">Envoyer</button>
                                </div>
                          </div>
                        </form>
                    </div>
                    <div class="container mb-3 pl-0 pl-md-5 collapse reponses-questions-client-${message.ID}" id="reponses${message.ID}">
                        ${recupererReponses(message.IdentifiantArticle, message.ID)}
                    </div>
                `
            }
		}).join('');
		const emplacement = document.querySelector('.questions-client-liste');
		emplacement.innerHTML = html;
	}
	requeteAjax.send();
}

function recupererReponses(id, question) {
	const requeteAjax = new XMLHttpRequest();
    const lienRequeteAjax = "bdd/gestionArticle.php?id="+id+"&reponses="+question;
	requeteAjax.open("GET", lienRequeteAjax);
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message){
            if (cle != "Rien" && grade == 1 || grade == 2) {
                return `
                    <div class="container">
                        <!-- Nom de l'utilisateur -->
                        <p class="m-0 pl-5 texte-nom">
                            ${message.Auteur}<a class="ml-3 btn btn-rouge text-white p-0 pl-3 pr-3 bouton-employe" id="bannir" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&bannir=${message.IdentifiantClient}">Bannir</a>
                        </p>
                        <!-- Commentaire -->
                        <p class="texte pl-5 mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <!-- Date -->
                        <p class="pl-5 texte-date">
                            Le ${message.DatePublication}
                            <!-- Suppression du message -->
                            <a class="text-dark ml-3 lien-sans-decoration bouton-employe" id="supprimer-message" href="bdd/gestionArticle.php?id=${message.IdentifiantArticle}&supprimerReponse=${message.ID}">
                                <svg class="bi bi-x-circle-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                </svg>
                            </a>
                        </p>
                    </div>
                `
            } else {
                return `
                    <div class="container">
                        <!-- Nom de l'utilisateur -->
                        <p class="m-0 pl-5 texte-nom">
                            ${message.Auteur}
                        </p>
                        <!-- Commentaire -->
                        <p class="texte pl-5 mt-2 mb-2">
                            ${message.Texte}
                        </p>
                        <!-- Date -->
                        <p class="pl-5 texte-date">
                            Le ${message.DatePublication}
                        </p>
                    </div>
                `
            }
		}).join('');
		const emplacement = document.querySelector('.reponses-questions-client-'+question);
		emplacement.innerHTML = html;
	}
	requeteAjax.send();
}

function ajoutCommentaireClient(event) {
	event.preventDefault();
	const idArticle = document.querySelector("#idArticle-commentaire");
	const notesClient = document.querySelector("#notesClient-commentaire");
	const texteCommentaire = document.querySelector("#formulaire-texte-commentaire");
	const idClient = document.querySelector("#idClient-commentaire");
	const auteur = document.querySelector("#auteur-commentaire");
	const data = new FormData();
	data.append('idArticle', idArticle.value);
	data.append('notesClient', notesClient.value);
	data.append('texteCommentaire', texteCommentaire.value);
	data.append('idClient', idClient.value);
	data.append('auteur', auteur.value);
	const requeteAjax3 = new XMLHttpRequest();
	requeteAjax3.open('POST', 'bdd/gestionArticle.php?ajoutCommentaire=1');
	requeteAjax3.onload = function() {
		recupererCommentaires(idArticle.value);
	}
	requeteAjax3.send(data);
}

function ajoutQuestionClient(event) {
	event.preventDefault();
	const idArticle = document.querySelector("#idArticle-question");
	const texteQuestion = document.querySelector("#formulaire-texte-question");
	const idClient = document.querySelector("#idClient-question");
	const auteur = document.querySelector("#auteur-question");
	const data = new FormData();
	data.append('idArticle', idArticle.value);
	data.append('texteQuestion', texteQuestion.value);
	data.append('idClient', idClient.value);
	data.append('auteur', auteur.value);
	const requeteAjax3 = new XMLHttpRequest();
	requeteAjax3.open('POST', 'bdd/gestionArticle.php?ajoutQuestion=1');
	requeteAjax3.onload = function() {
		recupererQuestions(idArticle.value);
	}
	requeteAjax3.send(data);
}


recupererImagesProduit(id);
recupererAutresCouleursImagesProduit(id);
recupererCommentaires(id);
recupererQuestions(id, identifiantClient, auteur);
if (cle != "Rien" && grade == 0 || grade == 1 || grade == 2) {		// Si le client est connecté
    document.querySelector('.commentaire-client').addEventListener('submit', ajoutCommentaireClient);
    document.querySelector('.question-client').addEventListener('submit', ajoutQuestionClient);
}