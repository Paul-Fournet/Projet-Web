<?php

	if(isset($_POST['theme'])){		
		//Créer le cookie pour y enregistrer le thème choisi par l'utilisateur
        // Thème sombre
		setcookie('User_Pref',"sombre",time() + (365*24*3600),'/','',false,true);
	}
    else{ // Thème clair
        setcookie('User_Pref',"clair",time() + (365*24*3600),'/','',false,true);
    }
	header("Location: index.php");
	
?>