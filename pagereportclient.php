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
    <link rel="stylesheet" href="style.css" />
    <title>Un problème ?</title>
</head>
<body class="bodypageclient">
    
<?php
if(/*!isset($_SESSION['connected']) ||*/ $_SESSION['connected']===false){
    echo 'Il faut être <a href="formulaire.php" style="text-decoration:underline;">connecté</a> pour pouvoir ajouter des commentaires';
}
else{
?>
    <h2>Assistance</h2>
    <br>
    <p>Vous souhaitez poser une question ou juste suggérer une modification ?
    <br>Pas de problème, vous pouvez parler à un expert en remplissant le questionnaire ci-dessous :</p>
    <br>
<form method="post" action="pagereportclient.php">
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

    if($_POST['nom']==NULL || $_POST['prenom']==NULL || $_POST['email']==NULL || $_POST['message']==NULL){
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
    
    //A présent on crée une requête afin d'ajouter les informations à la base de données
    $req=$conn->prepare("INSERT INTO projet_bd.requetes(isadmin,nom,prenom,typereq,horaire,messagetext) 
                        VALUES (:isadmin,:nom,:prenom,:typereq,:horaire,:messagetext)");

    $req->execute(array(':isadmin'=>0,':nom'=>$nom,':prenom'=>$prenom,':typereq'=>$type,':horaire'=>$horaire,':messagetext'=>$message));
    echo "Message envoyé !";
    header("Location:pagereportclient.php");
}


//Affichage des messages

$req2=$conn->prepare("SELECT * FROM projet_bd.requetes");
$req2->execute();
$resultmessages=$req2->fetchAll();



echo '<div class="divreponses">';
foreach($resultmessages as $val){
    echo 
        "<div class='reponsesreq'>
            <p>De : ".$val['nom']." ".$val['prenom']." le ".$val['horaire']." </p>
            <hr>
            <p>".$val['messagetext']."</p>
        </div>";
}
echo '</div>';



//Déconnexion de la base de données
$conn=NULL;
}
?>

</body>

</html>