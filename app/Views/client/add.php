<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Client</title>
    <link rel="stylesheet" href="{$url_base}public/css/menu.css">

        <link rel="stylesheet" href="{$url_base}public/css/gestionClient.css">
        <link rel="stylesheet" href="{$url_base}public/css/gestionCompte.css">

        <script src="{$url_base}public/js/gestionClient.js" type="text/javascript"></script>
        <script src="{$url_base}public/js/gestionCompte.js" type="text/javascript"></script>
        
        <style>

*{
    box-sizing: border-box;
    
    margin: 0;
}

body{
    background: linear-gradient(rgba(13, 23, 37, 0.6),rgba(7, 7, 7, 0.6)),url(../img.png);
    height: 100vh;
    -webkit-background-size:cover;
    background-size:cover ;
    background-position: center center;
    height: 100vh;
   }
nav{
    background:#02a1a1;
    padding: 5px 20px;
}
ul{
    list-style-type: none;
}
a{
    color: white;
    text-decoration: none;
}
.menu li{
    font-size: 20px;
    padding: 15px 5px;
    font-weight: 800;
}
.menu li a{
    display: block;
} 
.logo a{
    font-size: 30px;
}
.menu{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
*{
    box-sizing: border-box;
    
    margin: 0;
}



.contenue{
   display: flex;/*permet de changer la maniere d'affichage par defaut*/
   flex-direction: row;/*pour indiquer la maniere d'afficher les element vertical ou horizontal*/
   /*flex-wrap: wrap;pour aller a la ligne lorsque le contenue est plein*/
   justify-content: center;/*permet de centrer les elm du contenue au l'axe principale*/

   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%,-50%);
}
/*Pour gerer l'affichage des erreur*/
.contenue .error{
    display: flex;
    flex-direction: row;
   
   
    background: #fff;
    font-size: 16px;
    transition: all 0.5s ease;
    width: 100%;
    
}




/*Les Media Query*/
@media screen and (max-width: 750px){
    /*Tous les ecran avec une taile de 750px
    notre contenue va prendre 100% de la largeur*/
    .contenue{
        flex-basis: 100%;
    }
}

input[type="text"]{
    outline: none;
    transition: all 0.5s ease;
    font-size: 18px;
    width: 200px;
    float: right;
}

.formClient{
    display: flex;
}
.fieldset{
    display: flex;
    width: 400px;
    height: auto;   
    border: #02a1a1 solid 4px;
   }
.itemFieldset{
    display: flex;
    flex-direction: column;
    
}

.legend{
    color: #02a1a1;
    font-size: 25px;
    
    font-weight: 1000;
    text-transform: capitalize;
    letter-spacing: 3px;
   }

   select{
    font-size: 18px;
    width: 200px;
    float: right;
}

label{
    color: #fff;
    line-height: 40px;
    font-size: 18px;
    font-weight: 500;
    text-transform: capitalize;
    
   }

.radio{
    font-size: 20px;
    font-weight: 500;
    text-transform: capitalize;
    display: inline-block;
    vertical-align: middle;
    color: #fff;
    position: relative;
    padding-left: 30px;
    cursor: pointer;

   }

.radio + .radio{
   margin-left: 100px;
   
   }

.radio input[type=radio]{
   display: none;
}
.radio span{
    height: 15px;
    width:  15px;
    border-radius: 50%;
    border: 3px solid  #02a1a1;
    display: block;
    position: absolute;
    left: 0;
    top: 7px;

 }

 .radio span::after{
     content: "";
     height: 8px;
     width: 8px;
     background-color: #02a1a1;
     display: block;
     position: absolute;
     left: 50%;
     top: 50%;
     transform: translate(-50%,-50%) scale(0);
     border-radius: 50%;
     transition: 300ms ease-in-out 0s;


 }
 .radio input[type="radio"]:checked ~ span::after{
    transform: translate(-50%,-50%) scale(1);
    
}

.btn{

    border: 3px solid #02a1a1;
    width: 400px;   
    height: 40px;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    border: 2px solid #02a1a1;
    background: none;
    color: #02a1a1;
    border-radius: 40px;
    font-weight: 900;
    text-transform: capitalize;
    
    }
    /*
    pour cacher les radio par defaut
    */
    .ClientStaut{
        display: none;
    }
    
  .listeEmployeur{
        display: none;
    }
    
    select{
        font-size: 18px;
        width: 200px;
        float: right;
    }
    </style>  
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">La banque du peuple</a></li>
            <li class="item"><a href="<?php echo site_url('Client/add') ?>">Gestion des clients</a></li>
            <li class="item"><a href="<?php echo site_url('Compte/add') ?>">Gestion des comptes client</a></li>
        </ul>
    </nav>
    
    <div class="contenue">
        <div class="error" id="message_error"></div>
        <form action="<?php echo base_url('Client/store');?>" method="POST" class="formClient" id="formClient" onsubmit="return validationClient()">

            <fieldset class="fieldset">
                <legend class="legend">Gestion des clients:</legend>
                <div class="itemFieldset">
                
                    <div>
                        <label for="">Type de client:</label>
                        <select name="type_client_id" id="type_client_id" onchange="verifTypeClient()">
                            <option value="">Choisir un type de client</option>
                            <?php if($typeclients): ?>
                            <?php foreach($typeclients as $tclient): ?>
                                <option value="<?php echo $tclient['id']; ?>">
                                    <?php echo $tclient['libelle']; ?>
                                </option>  
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                    </div>
            
                    <div>
                        <label for="">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Nom.....">
                    </div>
                    <div>
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Prenom.....">
                    </div>

                    <div>
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" id="adresse" placeholder="Adresse.....">
                    </div>

                    <div>
                        <label for="">Telephone</label>
                        <input type="text" name="tel" id="tel" placeholder="Telephone.....">
                    </div>

                    <div>
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email.....">
                    </div>

                    <div id="listeEmployeur" class="listeEmployeur">
                        <label for="">Liste employeur:</label>
                        <select name="employeur_id" id="employeur_id">
                            <option value="">Votre entreprise</option>
                            <?php if($employeurs): ?>
                            <?php foreach($employeurs as $emp): ?>
                                <option value="<?php echo $emp['id']; ?>">
                                    <?php echo $emp['nom_employeur']; ?>
                                </option>  
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                    </div>

                </div>

            </fieldset> 
            
            <fieldset class="fieldset" id="emp">
                <legend class="legend">Information supplémentaire:</legend>
                <div class="itemFieldset">

                    <div>
                        <label for="">Salaire</label>
                        <input type="text" name="salaire" id="salaire" value="" placeholder="Salaire....." placeholder="salaire">
                    </div>

                    <div>
                        <label for="">Profession</label>
                        <input type="text" name="profession" id="profession" placeholder="Profession....."> 
                    </div>
                    <div id="ninea">
                        <label for="">Ninea</label>
                        <input type="text" name="numIdentification" id="numIdentification" placeholder="Num identification.....">
                    </div>

                    <div id="raisonsocial">
                        <label for="">Raison social</label>
                        <input type="text" name="raisonSocial" id="raisonSocial" placeholder="Raison social.....">
                    </div>

                    <div id="nomemployeur">
                        <label for="">Nom entreprise</label>
                        <input type="text" name="nom_employeur" id="nom_employeur" placeholder="Nom entreprise.....">
                    </div>
                   
                    <div id="adresseemployeur">
                        <label for="">Adresse entreprise</label>
                        <input type="text" name="adresse_employeur" id="adresse_employeur" placeholder="Adresse entreprise.....">
                    </div>


                </div>
                <div class="btnSave">
                    <input type="submit" name="btnAjouter" class="btn" value="Enregistrer"/>
                </div>
            </fieldset>    
        </form>  
    </div>
    <script>
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
</script>
    </body>
</html>
