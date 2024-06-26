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
    <?php // Cherche si l'utilisateur a deja une préference pour le thème.

    if ( isset($_COOKIE['User_Pref'])){ // si le cookie existe (isset)
        $style=$_COOKIE['User_Pref'];	// on récupère le theme choisi enregistré dans le cookie
    }
    else $style="clair"; // valeur par défaut
    ?>
    <link rel="stylesheet" href="style<?php echo "_$style"; ?>.css" />
    <link rel="stylesheet" href="footer<?php echo "_$style"; ?>.css" />
    <title>Un problème ?</title>
</head>
<?php
require("indexparts/header.php");
?>
<body class="bodypageclient">
    
<?php
if(/*!isset($_SESSION['connected']) ||*/ $_SESSION['connected']===false){
    echo 'Il faut être <a href="formulaire.php" style="text-decoration:underline;">connecté</a> pour pouvoir ajouter des commentaires';
}
else{
?>  
<div style="padding:10px;">
    <h2>Assistance</h2>
    <br>
    <p>Vous souhaitez poser une question ou juste suggérer une modification ?
    <br>Pas de problème, vous pouvez parler à un expert en remplissant le questionnaire ci-dessous :</p>
    <br>
</div>
<form method="post" action="pagereportclient.php" style="max-width: min-content;">
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

    $req->execute(array(':isadmin'=>0,':nom'=>$nom,':prenom'=>$prenom,':typereq'=>$type,':horaire'=>$horaire,':horaireheureminutes'=>$horaireminutes,':messagetext'=>$message));
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
        "<div class='reponsesreq'>";
        if($val['IsAdmin']){
            echo "<p style='font-weight:bold;'>[ADMIN]</p>";
        }
        echo "

            <p>De : ".$val['nom']." ".$val['prenom']." le ".$val['horaire']." à ".$val['horaireheureminutes']." </p>
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
            <p>'.$val['messagetext']."</p>
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