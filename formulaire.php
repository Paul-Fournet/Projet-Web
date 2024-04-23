<?php
session_start();

require("fonctions.php");

//L'utilisateur n'est pas connecté
$_SESSION['connected']=false;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="formstyle.css" />
    <link rel="stylesheet" href="footer.css" />

</head>

<?php
    require("indexparts/header.php");
?>

<body>
    


    <div class="divform">

        
        
        <form class="formulaire" method="post" action="formulaire.php">
            <p class="titre">Connexion</p><br>
    
            <label>Identifiant</label><br><input type="text" name="id" placeholder="Votre identifiant" class="inputtext" maxlength="20" required pattern="^[A-Za-z '-]+$"><br><br>

            <label>Mot de passe</label><br><input type="password" name="mdp" class="inputtext" placeholder="Votre mot de passe" maxlength="20" required pattern="^[A-Za-z '-]+$"><br><br>

            <input type="submit" name="submit">
    
        </form>
        <?php

        $idadmin='admin';
        $mdpadmin='admin123';

        $idclient='client';
        $mdpclient='client123';

        if(isset($_POST['submit'])){
            $_SESSION['id']=nettoyer_donnees($_POST['id']);
            $_SESSION['mdp']=nettoyer_donnees($_POST['mdp']);

            //Si l'utilisateur est un client
            if($_SESSION['id']===$idclient && $_SESSION['mdp']===$mdpclient){
                $_SESSION['connected']=true;
                $_SESSION['user']='client';
                

                //Redirection vers le menu
                header("Location:index.php");
            }

            //Si l'utilisateur est un admin
            elseif($_SESSION['id']===$idadmin && $_SESSION['mdp']===$mdpadmin){
                $_SESSION['connected']=true;
                $_SESSION['user']='admin';

                //Redirection vers le menu
                header("Location:index.php");
            }

            else{
                echo '<p style="color:red;">Identifiant/Mot de passe incorrect</p>';
            }

        }



?>

    </div>


</body>
</html>