<?php

require_once __DIR__ . "/../model/database.php";


    if(isset($_POST['nom_prenom']) && isset($_POST['job']) && isset($_POST['ville']) && isset($_POST['txt'])){

        $nom_prenom = $_POST['nom_prenom'];
        $job = $_POST['job'];
        $ville = $_POST['ville'];
        $ville = $_POST['txt'];
    
        $errcode = insertEntity("titre_accueil", ['nom_prenom' => $nom_prenom, 'job' => $job, 'ville' => $ville, 'txt' => $txt])
        /*or die(print_r([$nom_prenom, $job, $ville]))*/;
        
            if ($errcode) {
                header("Location: admin.php?errcode=" . $errcode);
            } else {
                header("Location: admin.php#titre_accueil");
                exit();
            }

    }



