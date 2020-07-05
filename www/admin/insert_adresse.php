<?php
require_once __DIR__ . "/../model/database.php";

/* TECHNIQUE*/
if(isset($_POST['nom_prenom']) && isset($_POST['artisan']) && isset($_POST['adresse']) && isset($_POST['codepostal']) && isset($_POST['ville'])
&& isset($_POST['siret']) && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['txt']) ){

            $nom_prenom = $_POST['nom_prenom'];
            $artisan = $_POST['artisan'];
            $adresse = $_POST['adresse'];
            $codepostal = $_POST['codepostal'];
            $ville = $_POST['ville'];
            $siret = $_POST['siret'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $txt = $_POST['txt'];
            
            
            $errcode = 0;

            $query  = "INSERT INTO adresse(nom_prenom, artisan, adresse, codepostal, ville, siret, tel, email, txt) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            
            try{
                $stmt->execute([$nom_prenom, $artisan, $adresse, $codepostal, $ville, $siret, $tel, $email, $txt]);
                header("Location: admin.php#adresse");
            }catch (PDOExeption $e){
                $errcode = $e->getMessage();
            }
            return $errcode;
            
        }
        
    