<?php

require_once __DIR__ . "/../model/database.php";

/* TECHNIQUE*/
if(isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt']) && isset($_FILES['picture']['name'])){

            $libelle = $_POST['libelle'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            $picture = $_FILES['picture'];
            
            $errcode = 0;

            $query  = "INSERT INTO techniques(libelle, txt, picture,  alt) VALUES(?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            
            try{
                $stmt->execute([$libelle, $txt, $picture['name'], $alt]);
                header("Location: admin.php#technique");
            }catch (PDOExeption $exception){
                $errcode = $exception->getMessage();
            }
            return $errcode;
            
        }
        
    
