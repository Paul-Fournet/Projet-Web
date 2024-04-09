<?php
function nettoyer_donnees($donnees){
    $donnees=trim($donnees);
    $donnees=stripslashes($donnees);
    $donnees=htmlspecialchars($donnees);
    return $donnees;
}
?>