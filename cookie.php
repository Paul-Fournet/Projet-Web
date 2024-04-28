<?php // Vérification du cookie pour le thème du site.

if ( isset($_COOKIE['User_Pref'])){ // si le cookie existe (isset)
  $style=$_COOKIE['User_Pref'];	// on récupère le theme choisi enregistré dans le cookie
}
else $style="clair"; // valeur par défaut
?>