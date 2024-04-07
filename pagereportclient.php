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
<body>
    
<?php
if($_SESSION['connected']===false){
    echo 'Il faut être connecté pour pouvoir ajouter des commentaires';
}
?>


</body>
</html>