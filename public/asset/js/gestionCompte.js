//Cettte fonction permet de verifier les champs
function validation(){
    var message = document.getElementById("message_error");
    var text;
    message.style.padding = "7px";
    message.style.color = "red";

    if(document.getElementById("numCompte").value == ""){
        text = "Veuillez reseigner le numero du compte";
        message.innerHTML = text;
        return false;
    }

    if(document.getElementById("numAgence").value == ""){
        text = "Veuillez reseigner le numero agence";
        message.innerHTML = text;
        return false;
    }

    if(document.getElementById("nom").value == ""){
        text = "Veuillez reseigner le nom";
        message.innerHTML = text;
        return false;
    }

    if(document.getElementById("prenom").value == ""){
        text = "Veuillez reseigner le prenom";
        message.innerHTML = text;
        return false;
    }

    if(document.getElementById("adresse").value == ""){
        text = "Veuillez reseigner l'adresse";
        message.innerHTML = text;
        return false;
    }

    var tel = document.getElementById("tel").value;

    if(isNaN(tel) || tel.length != 9){
        text = "Veuillez reseigner un num valid";
        message.innerHTML = text;
        return false;
    }

    if(document.getElementById("email").value == ""){
        text = "Veuillez reseigner l'adresse mail";
        message.innerHTML = text;
        return false;
    }

    alert('form ok !! ');
    return true;
}

//Cette function permet de gerer les type de compte
function myFunction() {

    var typeCompte = document.getElementById("selectCompte").value;
    var divFrais = document.getElementById("frais");
    var divAgio = document.getElementById("agio");

    if(typeCompte === '1'){
        divFrais.style.display = "block";
        divAgio.style.display = "none";
    }
    if(typeCompte === '2'){
        divFrais.style.display = "none";
        divAgio.style.display = "block";
      }
      if(typeCompte === '3'){
        divFrais.style.display = "block";
        dfermuture.style.display = "block";
        divAgio.style.display = "none";
      }

  }

   