//Control de validation
/*function validationClient(){
    var message = document.getElementById("message_error");
    var text;
    message.style.padding = "7px";
    message.style.color = "red";
    if(document.getElementById("nom").value == ""){
        text = "Veuillez reseigner le nom";
        message.innerHTML = text;
        return false;
    }
}*/


function verifTypeClient(){
    var typeClient = document.getElementById("type_client_id");
    if(typeClient.value === '1') {
       // alert(6);
        //alert("ok"); 6 represente type client pysique salarie
        alert("Veuillez reseigner tous les champs !!!"); 
        var divEmp = document.getElementById("listeEmployeur");
        divEmp.style.display = "block";
        
        document.getElementById("nom").disabled = false;
        document.getElementById("prenom").disabled = false;
        document.getElementById("adresse").disabled = false;
        document.getElementById("tel").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("salaire").disabled = false;
        document.getElementById("profession").disabled = false;
        
        document.getElementById("ninea").style.display = "none";
        document.getElementById("raisonsocial").style.display = "none";
        document.getElementById("nomemployeur").style.display = "none";
        document.getElementById("adresseemployeur").style.display = "none";
    }else if(typeClient.value === '2'){
        //alert(7);
         //alert("ok"); 7 represente type client pysique non salarie
        var divEmp = document.getElementById("listeEmployeur");
        divEmp.style.display = "none";
        document.getElementById("nom").disabled = false;
        document.getElementById("prenom").disabled = false;
        document.getElementById("adresse").disabled = false;
        document.getElementById("tel").disabled = false;
        document.getElementById("email").disabled = false;

        document.getElementById("salaire").disabled = true;
        document.getElementById("profession").disabled = true;
        document.getElementById("raisonSocial").disabled = true;
        document.getElementById("adresse_employeur").disabled = true;
        document.getElementById("nom_employeur").disabled = true;
        document.getElementById("numIdentification").disabled = true;
    }else if(typeClient.value === '3'){
       // alert(8);
        var divEmp = document.getElementById("listeEmployeur");
        divEmp.style.display = "none";
        
        document.getElementById("nom").disabled = true;
        document.getElementById("prenom").disabled = true;
        document.getElementById("adresse").disabled = true;
        document.getElementById("tel").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("salaire").disabled = true;
        document.getElementById("profession").disabled = true;

        
        document.getElementById("ninea").style.display = "block";
        document.getElementById("raisonsocial").style.display = "block";
        document.getElementById("nomemployeur").style.display = "block";
        document.getElementById("adresseemployeur").style.display = "block";
    }else{
        alert("Veuillez choisir un type de client !!!"); 
    }
}