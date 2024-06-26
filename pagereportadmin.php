<?php
session_start();

require("fonctions.php");
require("BDconnexion.php")
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_clair.css" />
    <link rel="stylesheet" href="footer.css" />
    <title>Gestion Admin</title>
</head>
<?php
require("indexparts/header.php");
?>
<body class="bodypageclient">
    
<?php

if(!isset($_SESSION['connected']) || $_SESSION['connected']===false || $_SESSION['user']==='client'){
    echo 'Il faut être <a href="formulaire.php" style="text-decoration:underline;">administrateur</a> pour pouvoir accéder à cette page';
}
else{
?>
<div style="padding:10px;">
    <h2>Gestion Admin</h2>
    <br>
    <br>
</div>
<form method="post" action="pagereportadmin.php" style="display:flex;">
    <fieldset class="assistance">

        
        
        Nom : <input type="text" name="nom" placeholder="Votre nom"></input><br>
        <hr>
       
        Prénom : <input type="text" name="prenom" placeholder="Votre prénom"></input><br>
        <hr>

        Email : <input type="email" name="email" placeholder="Votre email"></input><br>
        <hr>

        Type de requête : 
        <select name="typereq">
            <option value=0>--Veuillez sélectionner le type de requête--</option>
            <option value=1>Suggestion</option>
            <option value=2>Bug / Problème</option>
            <option value=3>Assistance</option>
       </select>
       <br>
        <hr>
    
        Message : <br><textarea type="text" placeholder="500 caractères maximum" name="message" rows="11" cols="60" maxlength="500" class="messagearea"></textarea>
        <br>
        

        <input type="submit" name="submit"></input>


        
    </fieldset>
</form>
<?php

//Si le bouton "Envoyer" est cliqué
if(isset($_POST["submit"])){

    if($_POST['nom']==NULL || $_POST['prenom']==NULL || $_POST['email']==NULL || $_POST['message']==NULL || $_POST['email']==0){
        echo '<p style="color:red">Saisie invalide</p>';
    }

    //Récupération des données entrées dans le formulaire
    $nom=nettoyer_donnees($_POST['nom']);
    $prenom=nettoyer_donnees($_POST['prenom']);
    $email=nettoyer_donnees($_POST['email']);
    $type=nettoyer_donnees($_POST['typereq']);
    $message=nettoyer_donnees($_POST['message']);
    $date=time();
    $horaire=date("Y-m-d",$date);
    $heure=getdate();
    $heure['hours']=$heure['hours']+2;
    
    if($heure['minutes']<10){
        $horaireminutes=$heure['hours']."h0".$heure['minutes'];
    }
    else{
        $horaireminutes=$heure['hours']."h".$heure['minutes'];
    }
    
    //A présent on crée une requête afin d'ajouter les informations à la base de données
    $req=$conn->prepare("INSERT INTO projet_bd.requetes(isadmin,nom,prenom,typereq,horaire,horaireheureminutes,messagetext) 
                        VALUES (:isadmin,:nom,:prenom,:typereq,:horaire,:horaireheureminutes,:messagetext)");

    $req->execute(array(':isadmin'=>1,':nom'=>$nom,':prenom'=>$prenom,':typereq'=>$type,':horaire'=>$horaire,':horaireheureminutes'=>$horaireminutes,':messagetext'=>$message));
    echo "Message envoyé !";
    header("Location:pagereportadmin.php");
}


//Affichage des messages

$req2=$conn->prepare("SELECT * FROM projet_bd.requetes");
$req2->execute();
$resultmessages=$req2->fetchAll();




echo '<div class="divreponses">';
foreach($resultmessages as $val){
    echo 
        "<div class='reponsesreq'>";
        if($val['IsAdmin']){
            echo "<p style='font-weight:bold;'>[ADMIN]</p>";
        }
        
            
        echo "<p>De : ";
            echo"".$val['nom']." ".$val['prenom']." le ".$val['horaire']." à ".$val['horaireheureminutes']." </p>
            <hr>
            <p style='font-weight:bold;'>[";
            //Affichag du type de requête
            if($val['typereq']==1){
                echo 'Suggestion';
            }
            if($val['typereq']==2){
                echo 'Bug / Problème';
            }
            if($val['typereq']==3){
                echo 'Assistance';
            }

            echo ']</p>
            <p>'.$val['messagetext']."</p><br>";
            
            //Affichage d'un bouton "Supprimmer permettant de supprimmer un message"

            echo "
            
            <a class='liensuppr' style='border:solid 3px white; padding:4px; border=5px; border-radius:3px;' href='supprimmer.php?identifiant=".$val['Id']."'>Supprimmer</a>
            
            
            
            ";
            echo "
            </div>";
}
echo '</div>';


//Déconnexion de la base de données
$conn=NULL;
}
?>
</body>
<?php
require("indexparts/footer.php");

?>


</html>
