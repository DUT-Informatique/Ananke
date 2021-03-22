function comptesEmploye() {
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open("GET", "bdd/gestionComptes.php?compte=employe");
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message){
            return `
                <div class="row mt-4">
                    <!-- Avatar -->
                    <div class="col-4 align-self-center">
                        <img class="mx-auto d-block img-fluid petit-avatar-compte" src="${message.Image}" alt="Avatar">
                    </div>
                    <!-- Textes et boutons -->
                    <div class="col">
                        <!-- Nom et type de compte -->
                        <p class="m-0 petit-titre">${message.Nom+" "+message.Prenom}</p>
                        <p class="m-0 mt-1 petit-texte">Type de compte : Employé</p>
                        <hr>
                        <div class="row">
                            <!-- Edition du compte -->
                            <div class="m-0 p-0 mr-5 mr-sm-0 col-2">
                                <form method="post" action="modification-compte.php">
                                    <input name="nomCompte" type="text" value="${message.Nom}" style="display: none;">
                                    <input name="prenomCompte" type="text" value="${message.Prenom}" style="display: none;">
                                    <input name="adresseMailCompte" type="text" value="${message.Identifiant}" style="display: none;">
                                    <input name="gradeCompte" type="text" value="${message.Grade}" style="display: none;">
                                    <input name="imageCompte" type="text" value="${message.Image}" style="display: none;">
                                    <button class="text-dark mr-2 lien-sans-decoration bouton-sans-decoration" id="modifier" name="submit" type="submit">
                                        <svg class="bi bi-pencil" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <!-- Suppression du compte -->
                            <div class="m-0 p-0 col-2">
                                <form method="post" action="bdd/gestionComptes.php?compte=suppression">
                                    <input name="identifiantCompte" type="text" value="${message.Identifiant}" style="display: none;">
                                    <button class="text-dark lien-sans-decoration bouton-sans-decoration" id="supprimer" name="submit" type="submit">
                                        <svg class="bi bi-x-circle-fill" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `
		}).join('');
        const messages = document.querySelector('#liste-compte-employe');
		messages.innerHTML = html;
	}
	requeteAjax.send();
}

function comptesAdministrateur() {
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open("GET", "bdd/gestionComptes.php?compte=administrateur");
	requeteAjax.onload = function() {
		const resultat = JSON.parse(requeteAjax.responseText);
		const html = resultat.reverse().map(function(message){
            return `
                <div class="row mt-4">
                    <!-- Avatar -->
                    <div class="col-4 align-self-center">
                        <img class="mx-auto d-block img-fluid petit-avatar-compte" src="${message.Image}" alt="Avatar">
                    </div>
                    <!-- Textes et boutons -->
                    <div class="col">
                        <!-- Nom et type de compte -->
                        <p class="m-0 petit-titre">${message.Nom+" "+message.Prenom}</p>
                        <p class="m-0 mt-1 petit-texte">Type de compte : Administrateur</p>
                        <hr>
                        <div class="row">
                            <!-- Edition du compte -->
                            <div class="m-0 p-0 mr-5 mr-sm-0 col-2">
                                <form id="modifier-compte" method="post" action="modification-compte.php">
                                    <input name="nomCompte" type="text" value="${message.Nom}" style="display: none;">
                                    <input name="prenomCompte" type="text" value="${message.Prenom}" style="display: none;">
                                    <input name="adresseMailCompte" type="text" value="${message.Identifiant}" style="display: none;">
                                    <input name="gradeCompte" type="text" value="${message.Grade}" style="display: none;">
                                    <input name="imageCompte" type="text" value="${message.Image}" style="display: none;">
                                    <button class="text-dark mr-2 lien-sans-decoration bouton-sans-decoration" id="modifier" name="submit" type="submit">
                                        <svg class="bi bi-pencil" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <!-- Suppression du compte -->
                            <div class="m-0 p-0 col-2">
                                <form id="supprimer-compte" method="post" action="bdd/gestionComptes.php?compte=suppression">
                                    <input name="identifiantCompte" type="text" value="${message.Identifiant}" style="display: none;">
                                    <button class="text-dark lien-sans-decoration bouton-sans-decoration" id="supprimer" name="submit" type="submit">
                                        <svg class="bi bi-x-circle-fill" width="1.7em" height="1.7em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `
		}).join('');
		const messages = document.querySelector('#liste-compte-administrateur');
		messages.innerHTML = html;
	}
	requeteAjax.send();
}

comptesEmploye();
comptesAdministrateur();
