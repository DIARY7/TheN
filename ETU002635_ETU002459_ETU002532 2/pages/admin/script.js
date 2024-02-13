function sendForm(url,idForm,callback,page,fonction) {
    function sendData() {
      var xhr; 
      try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
      catch (e) 
      {
          try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
          catch (e2) 
          {
             try {  xhr = new XMLHttpRequest();  }
             catch (e3) {  xhr = false;   }
           }
      }
    
  
      // Liez l'objet FormData et l'élément form
      var formData = new FormData(form);
  
      // Définissez ce qui se passe si la soumission s'est opérée avec succès
      xhr.addEventListener("load", function(event) {
        $msg=(event.target.responseText!="")?event.target.responseText:"OK";
        alert($msg);
        setTimeout(() => {
            callback(page,fonction);
        }, 20);
      });
  
      // Definissez ce qui se passe en cas d'erreur
      xhr.addEventListener("error", function(event) {
        alert('Oups! Quelque chose s\'est mal passé.');
      });
  
      // Configurez la requête
      xhr.open("POST", url);
      // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
      xhr.send(formData);
    }
  
    // Accédez à l'élément form …
    var form = document.getElementById(idForm);
    // … et prenez en charge l'événement submit.
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // évite de faire le submit par défaut
        sendData();
    });
}
function getDonneesBase(page,callback)
{
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
        }
    }
    xhr.onreadystatechange  = function()
    {
        var retour=Array();
        if(xhr.readyState  == 4){
            if(xhr.status  == 200) {
                retour = JSON.parse(xhr.responseText);
                console.log(retour);
                callback(retour);
            }
            else{
                document.dyn="Error code " + xhr.status;
            }
        }
    };
    //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", page, true); 
    //XMLHttpRequest.send(body)
    xhr.send(null);
}
function showCueilleur(cueilleurs){
    const table=document.getElementById("donnees");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Id</th>";
    string+="<th>Nom</th>";
    string+="<th>Date de naissance</th>";
    string+="<th>Genre</th>";
    string+="<th>Renvoyer</th>";
    string+="</tr>";
    for(let i=0;i<cueilleurs.length;i++){
        string+=`<tr>`;
        string+=`<td>`+cueilleurs[i].id_cueilleur+`</td>`;
        string+=`<td>`+cueilleurs[i].nom+`</td>`;
        string+=`<td>`+cueilleurs[i].date_naissance+`</td>`;
        string+=`<td>`+cueilleurs[i].genre+`</td>`;
        string+=`<td><button class="btn btn-outline-danger" onclick='deleteCueilleur(`+cueilleurs[i].id_cueilleur+`)'>Renvoyer</button></td>`;
        string+=`</tr>`;
    }
    table.innerHTML=string;
}
function deleteCueilleur(id){
    getDonneesBase("traitement/get_cueilleur.php?but=delete&id="+id,showCueilleur);
}
function showThe(the){
    const table=document.getElementById("donnees");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Id</th>";
    string+="<th>Nom</th>";
    string+="<th>Occupation</th>";
    string+="<th>Rendement</th>";
    string+="<th>Prix de ventes</th>";
    string+="</tr>";
    for(let i=0;i<the.length;i++){
        string+=`<tr>`;
        string+=`<td>`+the[i].id_the+`</td>`;
        string+=`<td>`+the[i].nom+`</td>`;
        string+=`<td>`+the[i].occupation+`</td>`;
        string+=`<td>`+the[i].rendement+`</td>`;
        string+=`<td>`+the[i].prix_vente+`</td>`;
        string+=`</tr>`;
    }
    table.innerHTML=string;
}
function showParcelle(parcelle){
    const table=document.getElementById("donnees");
    table.innerHTML="";
    var string="";
    string+="<tr>";
    string+="<th>Id</th>";
    string+="<th>Numero</th>";
    string+="<th>Surface</th>";
    string+="<th>The</th>";
    string+="<th>Modifier</th>";
    string+="</tr>";
    for(let i=0;i<parcelle.length;i++){
        string+=`<tr>`;
        string+=`<td>`+parcelle[i].id_parcelle+`</td>`;
        string+=`<td>`+parcelle[i].numero+`</td>`;
        string+=`<td>`+parcelle[i].surface+`</td>`;
        string+=`<td>`+parcelle[i].nom+`</td>`;
        string+=`<td><button class='btn btn-outline-warning' onclick='modifyForm(`+parcelle[i].id_parcelle+`,`+parcelle[i].numero+`,`+parcelle[i].surface+`,`+parcelle[i].id_the+`)'>Modifier</button></td>`;
        string+=`</tr>`;
    }
    table.innerHTML=string;
}
function modifyForm(id,numero,surface,idthe){
    var option=document.querySelectorAll("option");
    const form=document.getElementById("formulaire");
    var string=form.innerHTML;
    string+=`<input type="hidden" name='id_parcelle' value=`+id+`>`;
    string+=`<input type="hidden" name='but' value='modifier'>`;
    form.innerHTML=string;
    document.getElementById("numero").value=numero;
    document.getElementById("surface").value=surface;
    for(let i=0;i<option.length;i++){
        console.log(option[i].value+" "+idthe);
        if(option[i].value==idthe){
            document.getElementById("the").selectedIndex=i;
            break;
        }
    }
}