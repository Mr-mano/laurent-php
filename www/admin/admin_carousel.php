<?php
session_start();
require_once __DIR__ . "/carousel.php";
require_once __DIR__ . "/../model/database.php";

//$titre_accueil = getAllTitreAccueil();

$carousel = getCarousel("carousel");
$carousel_2 = getCarousel("carousel_2");
$carousel_3 = getCarousel("carousel_3");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
    <link rel="stylesheet" href="../css/styles.min.css">
</head>
        <!-- vérifie si administrateur est connecté -->
        <?php
		if(!isset($_SESSION['connect'])){ 
        ?>
        <!-- si l'administrateur n'est pas connecté affiche ça -->
            <body>
                <main>
                    <div class="container d-flex justify-content-center" style="height: 500px">
                        <h1 style="margin: auto; text-align: center;">Oup's il n'y a rien ici</h1>
                    </div>
                </main>
            </body>
        <?php } else { ?>  

        <!-- si l'administrateur est connecté affiche ça -->
<body>
<!-- HEADER -->
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style=".d-flex{display: none;}">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item  mx-auto">
                    <a class="nav-link" href="admin_carousel.php">Carousel
                    </a>
                </li>
                <li class="nav-item  mx-auto">
                    <a class="nav-link" href="admin.php">Accueil
                    </a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="#">Réalisations</a>
                </li>
                <li class="nav-item mx-auto">
                <a class="nav-link" style="color:#309930;" href="../index.php">Voir site</a>
                </li>
                <li class="nav-item mx-auto">
                <a class="nav-link" href="../deconnection.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>

<!-- AFFICHAGE IMAGE_1 CAROUSEL-->
<section id="carousel ">
<div class="container border my-5">
    <h3 class="text-center">Carousel image 1</h3>
    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col" style="text-align:center;"></th>
        <th scope="col" style="text-align:center;">Image</th>
        <th scope="col" style="text-align:center;">Titre</th>
        <th scope="col" style="text-align:center;">texte</th>
        <th scope="col" style="text-align:center;">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($carousel as $carousels) : ?>
        
        <tr>
        <th scope="row">
        <td style="text-align:center;"><img style="height:50px;" src="uploads/<?= $carousels["image"]; ?>" alt="<?= $carousels["alt"]; ?>"></td>
        <td style="text-align:center;"><?php echo $carousels["title"]?></td>
        <td style="text-align:center;"><?php echo $carousels["txt"]?></td>
        <td style="text-align:center;">
        <form method="post" action="delete_carousel.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
        <input type="hidden" name="id" value="<?= $carousels["id"]; ?>">
        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
        </form>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>



<!-- GESTION IMAGE_1 DU CAROUSEL-->
    <?php if(count($carousel) == 1) :?>
        <div class="container d-flex justify-content-center" style="color:green;">
        <p>Pour modifier, il faut d'abord supprimer <i class="fas fa-trash-alt"></i></p>
        </div>
        <?php elseif(count($carousel) == 0) :?>
<div class="container bg-light my-5">
    <form method="POST" action="admin_carousel.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="formGroupExampleInput">Titre</label>
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Titre carousel">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Texte</label>
        <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image (8MO maxi)</label>
        <input type="file" name="image"class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
        <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="d-flex justify-content-center">
    <button class="btn btn-primary  m-2" type="submit">Envoyer</button>
    </div>
    </form>
    </div>
</div>
<?php endif; ?>
</section>
<!-- FIN DU CAROUSEL IMAGE 1-->

<hr class="featurette-divider">

<!-- AFFICHAGE IMAGE_2 CAROUSEL-->
<section id="carousel_2">
<div class="container border my-5">
    <h3 class="text-center mb-3">Carousel image 2</h3>
    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col" style="text-align:center;"></th>
        <th scope="col" style="text-align:center;">Image</th>
        <th scope="col" style="text-align:center;">Titre</th>
        <th scope="col" style="text-align:center;">texte</th>
        <th scope="col" style="text-align:center;">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($carousel_2 as $carousel_2s) : ?>
        <tr>
        <th scope="row">
        <td style="text-align:center;"><img style="height:50px;" src="uploads/<?= $carousel_2s["image_2"]; ?>" alt="<?= $carousel_2s["alt_2"]; ?>"></td>
        <td style="text-align:center;"><?php echo $carousel_2s["title_2"]?></td>
        <td style="text-align:center;"><?php echo $carousel_2s["txt_2"]?></td>
        <td style="text-align:center;">
        <form method="post" action="delete_carousel_2.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
        <input type="hidden" name="id" value="<?= $carousel_2s["id"]; ?>">
        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
        </form>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    


<!-- GESTION IMAGE_2 DU CAROUSEL-->
<?php if(count($carousel_2) == 1) :?>
        <div class="container d-flex justify-content-center" style="color:green;">
        <p>Pour modifier, il faut d'abord supprimer <i class="fas fa-trash-alt"></i></p>
        </div>
        <?php elseif(count($carousel_2) == 0) :?>
<div class="container bg-light my-5">
    <form method="POST" action="admin_carousel.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="formGroupExampleInput">Titre</label>
        <input type="text" name="title_2" class="form-control" id="formGroupExampleInput" placeholder="Titre carousel">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Texte</label>
        <input type="text" name="txt_2" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image (8MO maxi)</label>
        <input type="file" name="image_2"class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
        <input type="text" name="alt_2" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="d-flex justify-content-center">
    <button class="btn btn-primary  m-2" type="submit">Envoyer</button>
    </div>
    </form>
    </div>
</div>
<?php endif; ?>
</section>
<!-- FIN DU CAROUSEL IMAGE 2-->

<hr class="featurette-divider">

<!-- AFFICHAGE IMAGE_3 CAROUSEL-->
<section id="carousel_3">
<div class="container border my-5">
    <h3 class="text-center mb-3">Carousel image 3</h3>
    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col" style="text-align:center;"></th>
        <th scope="col" style="text-align:center;">Image</th>
        <th scope="col" style="text-align:center;">Titre</th>
        <th scope="col" style="text-align:center;">texte</th>
        <th scope="col" style="text-align:center;">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($carousel_3 as $carousel_3s) : ?>
        <tr>
        <th scope="row">
        <td style="text-align:center;"><img style="height:50px;" src="uploads/<?= $carousel_3s["image_3"]; ?>" alt="<?= $carousel_3s["alt_3"]; ?>"></td>
        <td style="text-align:center;"><?php echo $carousel_3s["title_3"]?></td>
        <td style="text-align:center;"><?php echo $carousel_3s["txt_3"]?></td>
        <td style="text-align:center;">
        <form method="post" action="delete_carousel_3.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
        <input type="hidden" name="id" value="<?= $carousel_3s["id"]; ?>">
        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
        </form>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    


<!-- GESTION IMAGE_3 DU CAROUSEL-->
<?php if(count($carousel_3) == 1) :?>
        <div class="container d-flex justify-content-center" style="color:green;">
        <p>Pour modifier, il faut d'abord supprimer <i class="fas fa-trash-alt"></i></p>
        </div>
        <?php elseif(count($carousel_3) == 0) :?>
<div class="container bg-light my-5">
    <form method="POST" action="admin_carousel.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="formGroupExampleInput">Titre</label>
        <input type="text" name="title_3" class="form-control" id="formGroupExampleInput" placeholder="Titre carousel">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Texte</label>
        <input type="text" name="txt_3" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image (8MO maxi)</label>
        <input type="file" name="image_3"class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
        <input type="text" name="alt_3" class="form-control" id="formGroupExampleInput2" placeholder="Texte carousel">
    </div>
    <div class="d-flex justify-content-center">
    <button class="btn btn-primary  m-2" type="submit">Envoyer</button>
    </div>
    </form>
    </div>
</div>
<?php endif; ?>
</section>

<!-- FIN DU CAROUSEL IMAGE 3-->


<?php } ?>
<!-- FOOTER -->
		
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>
		
</html> 
	



