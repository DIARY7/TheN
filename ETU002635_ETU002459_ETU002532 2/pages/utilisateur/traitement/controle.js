function AddCueillette() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response == "success") {
                    alert("Cueillette enregistrée avec succès !");
                } else {
                    alert("Erreur lors de l'enregistrement de la cueillette : " + response);
                }
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/insertCueillette.php", true);
    xhr.send(formulaire);
}

function getResultatPrevision() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                Add_tous_Prevision(response.prevision);
                Add_Cartes(response.parcelle);
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/resultatPrevision.php", true);
    xhr.send(formulaire);
}

function Add_tous_Prevision(response){
    console.log(response);
    const restant=document.getElementById("restant");
    restant.innerHTML="";
    restant.innerHTML="Poids total the restant : "+response.tous_restant;
    const montant=document.getElementById("montant");
    montant.innerHTML="";
    montant.innerHTML="Montant : "+response.montant;
}

function Add_Cartes(prevision){
    const cartes=document.getElementById("cartes");
    cartes.innerHTML="";
    var string="";
    console.log(prevision);
    var image=["admin.jpg","loginCueille.jpg","accueil2.jpg"];
    for(let i=0;i<prevision.length;i++){
        string+=`<div class="card">
        <img src="../../image/`+image[i%3]+`" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">`+prevision[i].nom+`</h5>
          <p class="card-text">Parcelle #`+prevision[i].numero+`</p>
          <p class="card-text">Nombre de pied : `+prevision[i].pied+`</p>
          <p class="card-text">`+prevision[i].surface+` ha</p>
          <p class="card-text">Poids the restant : `+prevision[i].restant+`</p>
        </div>
      </div>`;
    }
    cartes.innerHTML=string;
}


function AddDepense() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response == "success") {
                    alert("depense enregistrée avec succès !");
                } else {
                    alert("Erreur lors de l'enregistrement de la cueillette : " + response);
                }
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/insertDepense.php", true);
    xhr.send(formulaire);
}

function getResultat() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    var resultat = Array();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                resultat = JSON.parse(xhr.responseText);
                showResultat(resultat);
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/traiteresultat.php", true);
    xhr.send(formulaire);
}

function getResultatPaiement() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    var resultat = Array();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                resultat = JSON.parse(xhr.responseText);
                showPaiement(resultat);
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/liste_paiement.php", true);
    xhr.send(formulaire);
}

function showResultat(resultat){
    const table=document.getElementById("table");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Poids total cueillette</th>";
    string+="<th>Poids restant sur les parcelles</th>";
    string+="<th>Coût de revient / kg</th>";
    string+="</tr>";
    string+=`<tr>`;
    string+=`<td>`+resultat['cueillette']['somme']+`</td>`;
    string+=`<td>`+resultat['restant']+`</td>`;
    string+=`<td>`+resultat['revient']+`</td>`;
    string+=`</tr>`;
    
    table.innerHTML=string;
}

function getResultatDate() {
    var form = document.getElementById("form");
    var formulaire = new FormData(form);
    var xhr = new XMLHttpRequest();
    var resultat = Array();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                resultat = JSON.parse(xhr.responseText);
                showResultatDate(resultat);
            } else {
                alert("Erreur lors de la requête : " + xhr.status);
            }
        }
    };
    
    xhr.open("POST", "traitement/traiteresultat_date.php", true);
    xhr.send(formulaire);
}

function showResultatDate(resultat){
    const table=document.getElementById("table");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Poids total cueillette</th>";
    string+="<th>Poids restant sur les parcelles</th>";
    string+="<th>Coût de revient / kg</th>";
    string+="<th>Montant des ventes</th>";
    string+="<th>Benefice</th>";
    string+="<th>Depense</th>";
    string+="</tr>";
    string+=`<tr>`;
    string+=`<td>`+resultat['cueillette']['somme']+`</td>`;
    string+=`<td>`+resultat['restant']+`</td>`;
    string+=`<td>`+resultat['revient']+`</td>`;
    string+=`<td>`+resultat['vente']+`</td>`;
    string+=`<td>`+resultat['benefice']+`</td>`;
    string+=`<td>`+resultat['depense']+`</td>`;
    string+=`</tr>`;
    table.innerHTML=string;
}

function showPaiement(resultat){
    const table=document.getElementById("table");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Nom</th>";
    string+="<th>Poids</th>";
    string+="<th>Paiement</th>";
    string+="<th>Bonus</th>";
    string+="<th>Mallus</th>";
    string+="<th>Date</th>";
    string+="</tr>";
    for(let i=0;i<resultat.length;i++){
        string+=`<tr>`;
        string+=`<td>`+resultat[i]['nom']+`</td>`;
        string+=`<td>`+resultat[i]['poid_total']+`</td>`;
        string+=`<td>`+resultat[i]['paiement']+`</td>`;
        string+=`<td>`+resultat[i]['bonus']+`</td>`;
        string+=`<td>`+resultat[i]['mallus']+`</td>`;
        string+=`<td>`+resultat[i]['date_cueillette']+`</td>`;
        string+=`</tr>`;
    }
    table.innerHTML=string;
}