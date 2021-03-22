// Lire les messages présent dans la base de donnée
function lireMessages() {
	// Nouvelle requête Ajax
	const requeteAjax1 = new XMLHttpRequest();
	// Récupération des données de la base de donnée
	requeteAjax1.open("GET", "https://dut.minarox.fr/ananke/global/gestionMessagerie.php");
	// Affichage sur la page web
	requeteAjax1.onload = function() {
		const resultatMessage = JSON.parse(requeteAjax1.responseText);
		const htmlMessage = resultatMessage.reverse().map(function(message){
			if (message.Grade == 0) {
				return `
					<div class="m-1 ml-5 mb-2" id="boite-client">
						${message.Message}
					</div>
				`
			} else {
				return `
					<div class="m-1 mb-2" id="boite-staff">
						${message.Message}
					</div>
				`
			}
		}).join('');
		const messages = document.querySelector('.conversation');
		messages.innerHTML = htmlMessage;
		messages.scrollTop = messages.scrollHeight;
	}
	// Envoie de la requête
	requeteAjax1.send();
}

// Lire les alertes pour les employés
function alerteMessages() {
	// Nouvelle requête Ajax
	const requeteAjax2 = new XMLHttpRequest();
	// Récupération des données de la base de donnée
	requeteAjax2.open("GET", "https://dut.minarox.fr/ananke/global/gestionMessagerie.php?staff=alertes");
	// Affichage sur la page web
	requeteAjax2.onload = function() {
		const resultatAlerte = JSON.parse(requeteAjax2.responseText);
		const htmlAlerte = resultatAlerte.reverse().map(function(message){
            return `
					<tr>
                        <td class="align-middle" id="alerte-message-auteur">${message.Auteur}</td>
                        <td class="align-middle">${message.Localisation}</td>
                        <td class="align-middle">
                            <form class="formulaire-alertes-messagerie" action="https://dut.minarox.fr/ananke/global/gestionMessagerie.php?modification=alerte" method="post">
                                <input id="codetempclient" name="codetempclient" type="text" value="${message.CodeTemp}" style="display: none;">
                                <button class="lien-sans-decoration text-dark bouton-sans-decoration submit-repondre-message" name="submit">
                                    <svg class="bi bi-chat-square-dots-fill mb-1" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg><br>
                                    Prendre
                                </button>
                            </form>
                        </td>
                    </tr>
				`
		}).join('');
        const messages = document.querySelector('.alertes-messages');
		messages.innerHTML = htmlAlerte;
		messages.scrollTop = messages.scrollHeight;
	}
	// Envoie de la requête
	requeteAjax2.send();
}

// Ecrire un message dans la messagerie
function ecrireMessage(event) {
	// Annulation de l'action par défaut du formulaire
	event.preventDefault();
	// Récupération des variables
	const grade = document.querySelector("#grade");
	const auteur = document.querySelector("#auteur");
	const message = document.querySelector("#message");
	const localisation = document.querySelector("#localisation");
	const codetemp = document.querySelector("#codetemp");
	const alerte = document.querySelector("#alerte");
	// Concaténation des variables
	const data1 = new FormData();
	data1.append('grade', grade.value);
	data1.append('auteur', auteur.value);
	data1.append('message', message.value);
	data1.append('localisation', localisation.value);
	data1.append('codetemp', codetemp.value);
	data1.append('alerte', alerte.value);
	// Nouvelle requête Ajax
	const requeteAjax3 = new XMLHttpRequest();
	// Envoie des données au script php
	requeteAjax3.open('POST', 'https://dut.minarox.fr/ananke/global/gestionMessagerie.php?tache=envoie');
	// Affichage dynamique des messages
	requeteAjax3.onload = function() {
		message.value = '';
		message.focus();
		lireMessages();
	}
	// Envoie de la requête
	requeteAjax3.send(data1);
}

/*
// Réponse à une alerte pour les employés
function repondreMessage(event) {
	// Annulation de l'action par défaut du formulaire
    event.preventDefault();
	// Sélection de l'élément HTML
    const codetempclient = document.querySelector("#codetempclient");
    // Concaténation des données
	const data2 = new FormData();
    data2.append('codetempclient', codetempclient.value);
	// Nouvelle requête Ajax
	const requeteAjax4 = new XMLHttpRequest();
	// Envoie des données au script PHP
	requeteAjax4.open('POST', 'https://dut.minarox.fr/ananke/global/gestionMessagerie.php?modification=alerte');
	// Envoie de la requête
	requeteAjax4.send(data2);
}
*/

// Affichage des éléments en fonction de l'utilisateur
if (grade === '0') {
	// Ajout d'un event sur le bouton d'envoie de la messagerie
    document.querySelector('#formulaire-messagerie').addEventListener('submit', ecrireMessage);
    // Affichage des messages
	lireMessages();
	// Actualisation des messages toutes les 3 secondes
    const intervalMessages = window.setInterval(lireMessages, 3000);
} else if (grade === '1' || grade === '2') {
	// Ajout d'un event sur le bouton d'envoie de la messagerie
    document.querySelector('#formulaire-messagerie').addEventListener('submit', ecrireMessage);
	// Affichage des messages
    lireMessages();
	// Affichage des alertes
    alerteMessages();
	// Actualisation des messages et des alertes toutes les 3 secondes
    const intervalMessages = window.setInterval(lireMessages, 3000);
    const intervalAlertes = window.setInterval(alerteMessages, 3000);
    //document.querySelector('.formulaire-alertes-messagerie').addEventListener('submit', repondreMessage);
}