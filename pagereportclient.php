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
if($_SESSION['connected']===false){
    echo 'Il faut être <a href="formulaire.php" style="text-decoration:underline;">connecté</a> pour pouvoir ajouter des commentaires';
}
else{
?>
<div class="assistance">
    <h2>Assistance</h2>
    <br>
    <p>Vous souhaitez poser une question ou juste suggérer une modification ?
    <br>Pas de problème, vous pouvez parler à un expert en remplissant le questionnaire ci-dessous :</p>
    <br>
        <form method="post" action="pagereportclient.php">

        Nom : <input type="text" name="nom" placeholder="Votre nom"></input><br>
       
        Prénom : <input type="text" name="prenom" placeholder="Votre prénom"></input><br>

        Email : <input type="email" name="email" placeholder="Votre email"></input><br>

        Type de requête : 
        <select name="typereq">
            <option value=0>--Veuillez sélectionner le type de requête--</option>
            <option value=1>Suggestion</option>
            <option value=2>Bug / Problème</option>
            <option value=3>Assistance</option>
       </select>
       <br><br>
    
    
        Message : <br><textarea type="text" placeholder="500 caractères maximum" name="message" rows="13" cols="70" maxlength="500"></textarea>
    
        <br><br>

        <input type="submit" name="submit"></input>


        </form>
</div>
<?php
}

//Si le bouton "Envoyer" est cliqué
if(isset($_POST["submit"])){

    if($_POST['nom']==NULL || $_POST['prenom']==NULL || $_POST['email']==NULL || $_POST['message']==NULL){
        echo '<p style="color:red">Saisie invalide</p>';
    }

    //Récupération des données entrées dans le formulaire
    $nom=nettoyer_donnees($_POST['nom']);
    $prenom=nettoyer_donnees($_POST['prenom']);
    $email=nettoyer_donnees($_POST['email']);
    $message=nettoyer_donnees($_POST['message']);

    //A présent on crée une requête afin d'ajouter les informations à la base de données
    $req=$conn->prepare("INSERT INTO 'requetes' VALUES");

}






//Déconnexion de la base de données
$conn=NULL;
?>

</body>

</html>