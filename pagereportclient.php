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


</body>


<?php
require("indexparts/footer.php");
?>
</html>