<?php

require_once __DIR__ . "/../model/database.php";

    if(isset($_POST['nom_prenom']) && isset($_POST['job']) && isset($_POST['ville'])){

        $nom_prenom = $_POST['nom_prenom'];
        $job = $_POST['job'];
        $ville = $_POST['ville'];
    
    $errcode = 0;
    $query  = "INSERT INTO titre_accueil(nom_prenom, job, ville)  VALUES(?, ?, ?)";
    $stmt = $bdd->prepare($query);

        try{
            $stmt->execute([$nom_prenom, $job, $ville]);
            header("Location: admin.php#titre_accueil");
        }catch (PDOExeption $exception){
            $errcode = $exception->getMessage();
        }
        return $errcode;

    }



