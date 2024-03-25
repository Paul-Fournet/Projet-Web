<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../footer.css" />

    <!--Importation des polices d'écriture-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Arimo&family=Sofia+Sans&display=swap"
      rel="stylesheet"
    />
    
  </head>
  
<body>
  <?php 
  echo "Idées :";

  echo "<ul id=listephp>";
  echo "<li>Formulaire</li>";
  echo "<li>Calendrier sur les évènements stellaires</li>";
  echo "<li>Quizz</li>";
  echo "<li>Sondage</li>";
  echo "<li>Intégration de données en temps réel</li>";
  echo "<li>-->On devrait utiliser les flexbox</li>";
  echo "</ul>";

  echo "TEST";

  for($i=0;$i<20;$i+=1){
    echo "<br>";
  }
  

  
  ?>
  
</body>

  <footer id="scrollfooter">
    <div class="contacter">
      <h2>Nous contacter</h2>
      <ul>
        <li><p>E-mail : contact@planet-discovery.com</p></li>
        <li><p>Téléphone : 06 54 32 10 12</p></li>
        <li><a href="formulaire.html">Formulaire d'inscription</a></li>
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