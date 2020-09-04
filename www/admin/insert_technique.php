<?php

require_once __DIR__ . "/../model/database.php";

/* TECHNIQUE*/
if(isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt']) && (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0)){

        if($_FILES['picture']['size']<= 8000000){
            $informationsImage = pathinfo($_FILES['picture']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('png', 'gif', 'jpg', 'jpeg');

            if(in_array($extensionImage, $extensionsArray)){
                move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'.basename($_FILES['picture']['name']));

                $libelle = $_POST['libelle'];
                $txt = $_POST['txt'];
                $alt = $_POST['alt'];
                $picture = $_FILES['picture'];
                
                insertEntity("techniques", ['libelle' => $libelle, 'txt' => $txt, 'picture' => $picture['name'], 'alt' => $alt]);
                //$query = "INSERT INTO techniques(libelle, txt, picture,  alt) VALUES(?, ?, ?, ?)";
                //$stmt = $bdd->prepare($query);
                //$stmt->execute([$libelle, $txt, $picture['picture'], $alt]);

            }
            header("Location: admin.php#technique");
                exit();
        }
        
}
