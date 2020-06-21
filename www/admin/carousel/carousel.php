<?php


require_once __DIR__ . "/../../src/connection.php";
require_once __DIR__ . "/../../model/database.php";



/* CAROUSEL 1*/
if(isset($_POST['title']) && isset($_POST['txt']) && isset($_POST['alt']) && (isset($_FILES['image']) && $_FILES['image']['error'] ==0)){

    if ($_FILES['image']['size']<= 8000000){ //l'image fait moins de 8MO

        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

        if(in_array($extensionImage, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.basename($_FILES['image']['name'])); // on renomme notre image avec une clé unique suivie du nom du fichier

            $title = $_POST['title'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            $image = $_FILES['image'];
            
        
            $query = "INSERT INTO carousel(title, txt, image,  alt) VALUES(?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$title, $txt, $image['name'], $alt]);
            
        }
        header("Location: admin_carousel.php");
    }
}

/* CAROUSEL 2*/
if(isset($_POST['title_2']) && isset($_POST['txt_2']) && isset($_POST['alt_2']) && (isset($_FILES['image_2']) && $_FILES['image_2']['error'] ==0)){

    if ($_FILES['image_2']['size']<= 8000000){ //l'image fait moins de 8MO

		$informations = pathinfo($_FILES['image_2']['name']);
		$extension = $informations['extension'];
		$extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

		if(in_array($extension, $extensionsArray)){  // le type de l'_2 correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

			move_uploaded_file($_FILES['image_2']['tmp_name'], 'uploads/'.basename($_FILES['image_2']['name'])); 

            $title_2 = $_POST['title_2'];
            $txt_2 = $_POST['txt_2'];
            $alt_2 = $_POST['alt_2'];
            $image_2 = $_FILES['image_2'];
            
            $query = "INSERT INTO carousel_2(title_2, txt_2, image_2,  alt_2) VALUES(?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$title_2, $txt_2, $image_2['name'], $alt_2]);
        }
        header("Location: admin_carousel.php");
	}
}




/* CAROUSEL 3*/
if(isset($_POST['title_3']) && isset($_POST['txt_3']) && isset($_POST['alt_3']) && (isset($_FILES['image_3']) && $_FILES['image_3']['error'] ==0)){

    if ($_FILES['image_3']['size']<= 8000000){ //l'image fait moins de 8MO

		$informations = pathinfo($_FILES['image_3']['name']);
		$extension = $informations['extension'];
		$extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

		if(in_array($extension, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur

			move_uploaded_file($_FILES['image_3']['tmp_name'], 'uploads/'.basename($_FILES['image_3']['name'])); 

            $title_3 = $_POST['title_3'];
            $txt_3 = $_POST['txt_3'];
            $alt_3 = $_POST['alt_3'];
            $image_3 = $_FILES['image_3'];
            
            $query = "INSERT INTO carousel_3(title_3, txt_3, image_3,  alt_3) VALUES(?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$title_3, $txt_3, $image_3['name'], $alt_3]);
            

        }
        header("Location: admin_carousel.php");
	}
}

?>

