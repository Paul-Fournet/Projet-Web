<?php
session_start();
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
?>

<h2>Assistance</h2>
<br>

<p>Vous souhaitez poser une question ou juste suggérer une modification ?
<br>Pas de problème, vous pouvez parler à un expert en remplissant le questionnaire ci-dessous :</p>
<br>
<form method="post" action="pagereportclient.php">
Nom : <br><input type="text" name="nom" placeholder="Votre nom"></input><br><br>
Prénom : <br><input type="text" name="prénom" placeholder="Votre prénom"></input><br><br>
Type de requête : <br>
Message :<br><input type="text" placeholder="500 caractères maximum" name="message"></input>
<br><br>
<input type="submit" name="submit"></input>


</form>

</body>

</html>