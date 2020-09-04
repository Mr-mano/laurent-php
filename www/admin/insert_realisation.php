<?php
require_once __DIR__ . "/../model/database.php";

/* REALISATION */
if(isset($_POST['titre']) && isset($_POST['ville']) && isset($_POST['txt']) && isset($_FILES['photo']['name']) && isset($_POST['alt']) && isset($_POST['date_creation'])){

    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.basename($_FILES['photo']['name']));

            $titre = $_POST['titre'];
            $ville = $_POST['ville'];
            $txt = $_POST['txt'];
            $photo = $_FILES['photo'];
            $alt = $_POST['alt'];
            $date_creation = $_POST['date_creation'];;
            


            $errcode = 0;
            
            //$query  = "INSERT INTO realisations (titre, ville, txt, photo, alt, date_creation )  VALUES(?, ?, ?, ?, ?, ?)";
            //$stmt = $bdd->prepare($query);
            
                try{
                    //$stmt->execute([$titre, $ville, $txt, $photo['name'], $alt, $date_creation = date('d-m-Y')]);
                    insertEntity("realisations", ['titre' => $titre, 'ville' => $ville, 'txt' => $txt, 'photo' => $photo['name'], 'alt' => $alt, 'date_creation' => $date_creation]);
                    header("Location: admin_realisation.php");
                }catch (PDOExeption $exception){
                    $errcode = $exception->getMessage();
                }
                return $errcode;
            
            }


            /*insertEntity("realisations",
            ['titre' => $titre, 'ville' => $ville, 'txt' => $txt, 'photo' => $photo['name'], 'alt' => $alt, 'date_creation' => $date_creation]);
            

            header("Location: admin_realisation.php");
            exit();*/
                
    
