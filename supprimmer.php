
<?php
if(isset($_GET['identifiant'])){
    
    require("BDconnexion.php");
    $id=$_GET['identifiant'];
    $requete=$conn->prepare("DELETE FROM projet_bd.requetes WHERE Id=:id");

    $requete->execute(array(":id"=>$id));

    header("Location:pagereportadmin.php");
}



?>
