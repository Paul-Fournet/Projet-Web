<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="formstyle.css" />

</head>

<body>

    <div class="boutonretour">
        <a href="index.html">
            Retour à l'accueil
        </a>
    </div>

    <div class="divform">
        
        
        <form class="formulaire" method="post" action="formulaire.php">
            <p class="titre">Connexion</p><br>
    
            <label>Identifiant</label><br><input type="text" name="id" placeholder="Votre identifiant" class="inputtext"><br><br>

            <label>Mot de passe</label><br><input type="password" name="mdp" class="inputtext" placeholder="Votre mot de passe"><br><br>

            <input type="submit" name="submit">
    
        </form>
        
<?php


if(isset($_POST['submit'])){
    echo $_POST['mdp'];
}




?>
    </div>


</body>

</html>