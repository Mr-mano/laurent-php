<?php

require_once __DIR__ . "/../model/database.php";

/* TECHNIQUE*/
if(isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt']) && (isset($_FILES['picture']) && $_FILES['picture']['error'] ==0)){

    if ($_FILES['picture']['size']<= 8000000){ //l'image fait moins de 8MO

        $informationsImage = pathinfo($_FILES['picture']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

        if(in_array($extensionImage, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

            move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'.basename($_FILES['picture']['name'])); // on renomme notre image avec une clé unique suivie du nom du fichier

            $libelle = $_POST['libelle'];
            $txt_tech = $_POST['txt'];
            $alt_tech = $_POST['alt'];
            $picture = $_FILES['picture'];
            
        
            $query = "INSERT INTO techniques(libelle, txt, picture,  alt) VALUES(?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$libelle, $txt_tech, $picture['name'], $alt_tech]);
            
        }
        header("Location: admin.php");
    }
}