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
            
            
            insertEntity("adresse", ['nom_prenom' => $nom_prenom, 'artisan' => $artisan, 'adresse' => $adresse, 'codepostal' => $codepostal, 'ville' => $ville,
            'siret' => $siret, 'tel' => $tel, 'email' => $email, 'txt' => $txt, ]);
            
            header("Location: admin.php#adresse");
            exit();
                
    
}
        
