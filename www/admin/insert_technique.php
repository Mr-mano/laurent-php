<?php

require_once __DIR__ . "/../model/database.php";

/* TECHNIQUE*/
if(isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt']) && isset($_FILES['picture']['name'])){

            $libelle = $_POST['libelle'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            $picture = $_FILES['picture'];
            
            insertEntity("techniques", ['libelle' => $libelle, 'txt' => $txt, 'picture' => $picture['name'], 'alt' => $alt]);
        
                header("Location: admin.php#technique");
                exit();
            }
        