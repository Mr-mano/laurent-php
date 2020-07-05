<?php

require_once __DIR__ . "/../model/database.php";

if(isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['txt']) && isset($_POST['alt']) && (isset($_FILES['picture']) && $_FILES['picture']['error'] ==0)){

  if ($_FILES['picture']['size']<= 8000000){ //l'image fait moins de 8MO

      $informationsImage = pathinfo($_FILES['picture']['name']);
      $extensionImage = $informationsImage['extension'];
      $extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

      if(in_array($extensionImage, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

          move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'.basename($_FILES['picture']['name'])); 

          $titre_1 = $_POST['titre_1'];
          $titre_2 = $_POST['titre_2'];
          $txt = $_POST['txt'];
          $picture = $_FILES['picture'];
          $alt = $_POST['alt'];
          
      
          insertEntity("articles", ['titre_1' => $titre_1, 'titre_2' => $titre_2, "txt" => $txt, 'picture' => $picture['name'], 'alt' => $alt]);
          
      }
      header("location: admin.php#article");
      exit();
  }
}

