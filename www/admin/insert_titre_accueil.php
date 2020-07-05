<?php

require_once __DIR__ . "/../model/database.php";


    if(isset($_POST['nom_prenom']) && isset($_POST['job']) && isset($_POST['ville'])){

        $nom_prenom = $_POST['nom_prenom'];
        $job = $_POST['job'];
        $ville = $_POST['ville'];
    
        $errcode = insertEntity("titre_accueil", ['nom_prenom' => $nom_prenom, 'job' => $job, 'ville' => $ville])
        /*or die(print_r([$nom_prenom, $job, $ville]))*/;
        
            if ($errcode) {
                header("Location: admin.php?errcode=" . $errcode);
            } else {
                header("Location: admin.php#titre_accueil");
                exit();
            }

    }



