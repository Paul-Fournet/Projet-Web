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


<footer id="scrollfooter">
    <div class="contacter">
      <h2>Nous contacter</h2>
      <ul>
        <li><p>E-mail : contact@planet-discovery.com</p></li>
        <li><p>Téléphone : 06 54 32 10 12</p></li>

        <?php
          if($_SESSION['user']==='client'){
        ?>
        <li><a href="pagereportclient.php">Un problème ? / Une suggestion ?</a></li>
        <?php
          }
          
          elseif($_SESSION['user']==='admin'){
        ?>
        <li><a href="pagereportadmin.php">Reports de bugs</a></li>
        <?php
          }
        ?>
      </ul>
    </div>
    <div class="legal">
      <h2>Mentions légales</h2>
      <ul>
        <li><a href="#">Conditions générales d’utilisation</a></li>
        <li><a href="#">Conditions Générales de Vente</a></li>
        <li><a href="#">Politique de Confidentialité</a></li>
        
      </ul>
    </div>
    <div class="footer-col">
      <h2>Réseaux Sociaux</h2>
      <div class="links">
        <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="icon"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
</html>