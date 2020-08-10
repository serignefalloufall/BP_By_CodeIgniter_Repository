<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Compte</title>
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

.formCompte{
    display: flex;
}
.fieldset{
    display: flex;
    width: 500px;
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

.btn{

    border: 3px solid #02a1a1;
    width: 500px;   
    height: 50px;
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
 .btnRechercher{

        border: 3px solid #02a1a1;
        width: 500px;   
        height: 50px;
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
    
    input[type="date"]{
        font-size: 18px;
        width: 200px;
        float: right;
    }
    
    
   
   
   
    .frais{
        display: none;
        
       }
       .agio{
        display: none;
       }
       .dfermuture{
        display: none;
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
        <form action="<?php echo base_url('Compte/store');?>" method="POST" class="formClient" id="formClient">

            <fieldset class="fieldset">
                <legend class="legend">Rechercher client</legend>
                <div class="itemFieldset">
                
                    <div>
                        <label for="">Client:</label>
                        <select name="client_id" id="client_id" onchange="verifTypeClient()">
                            <option value="">Choisir client</option>
                            <?php if($clients): ?>
                            <?php foreach($clients as $client): ?>
                                <option value="<?php echo $client['id']; ?>">
                                    <?php echo $client['prenom'].' '.$client['nom']; ?>
                                </option>
                                
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                    </div>
            
                </div>

            </fieldset> 
            
            <fieldset class="fieldset" id="emp">
                <legend class="legend">Gestion compte:</legend>
                <div class="itemFieldset">
                    <div>
                        <label for="">Type de compte:</label>
                        <select name="type_compte_id" id="selectCompte" onchange="myFunction()">
                            <option value="">Choisir un type de compte</option>
                            <?php if($typecomptes): ?>
                            <?php foreach($typecomptes as $tc): ?>
                                <option value="<?php echo $tc['id']; ?>">
                                    <?php echo $tc['libelle']; ?>
                                </option>  
                            <?php endforeach; ?>
                            <?php endif; ?>
                         
                        </select>
                    </div>
                    <div>   
                        <label for="">Date d'ouverture</label>
                        <input type='text' name='date_ouverture' id='date' value='<?php echo $today; ?>' readonly/> 
                        
                    </div>
                    <div>
                        <label for="">Numero compte</label>
                        <input type='text' name='num_compte' id='numCompte' value='<?php echo $numcompte; ?>' readonly/>

                    </div>
                    <div>
                        <label for="">Numero agence</label>
                        <select name="agence_id" id="agence_id">
                            <option value="">Votre agence</option>
                            <?php if($agences): ?>
                            <?php foreach($agences as $a): ?>
                                <option value="<?php echo $a['id']; ?>">
                                    <?php echo $a['nom']; ?>
                                </option>  
                            <?php endforeach; ?>
                            <?php endif; ?>

                        </select>

                    </div>
                    <div>
                        <label for="">Cle rip</label>
                        <input type='text' name='cle_rip' id='cleRip' value='<?php echo $cleRip; ?>' readonly />
                    </div>

                    <div class="dfermuture" id="dfermuture">
                        <label for="">Date fermuture</label>
                        <input type='date' name='date_fermuture' id='date_fermuture' value=''/>           
                    </div>

                    <div class="frais" id="frais">
                        <label for="">Frais ouverture</label>
                        <input type="text" name="frais_ouverture" id="fouverture" placeholder="Frais d'ouverture.....">
                    </div> 
                        
                    <div class="agio" id="agio">
                        <label for="">Montant agio</label>
                        <input type="text" name="agio" id="agio" placeholder="L'agio.....">
                    </div>


                </div>

                <div class="btnSave">
                    <input type="submit" name="btnAjouter" class="btn" value="Enregistrer"/>
                </div>
            </fieldset>    
        </form>  
    </div>
    <script>
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

   
    </script>
</body>
</html>