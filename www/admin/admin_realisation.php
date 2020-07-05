<?php
session_start();
require_once __DIR__ . "/carousel.php";
require_once __DIR__ . "/insert_titre_accueil.php";
require_once __DIR__ . "/insert_technique.php";
require_once __DIR__ . "/articles.php";
require_once __DIR__ . "/insert_adresse.php";
require_once __DIR__ . "/../model/database.php";
$errcode = isset($_GET["errcode"]) ? $_GET["errcode"] : NULL;

//$titre_accueil = getAllTitreAccueil();
$titre_accueil = getAllEntities("titre_accueil");
$techniques = getAllEntities("techniques");
$articles = getAllEntities("articles");
$adresses = getAllEntities("adresse");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réalisations</title>
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

        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item  mx-auto">
                    <a class="nav-link mx-2" href="admin_carousel.php">Carousel
                    </a>
                </li>
                <li class="nav-item  mx-auto">
                    <a class="nav-link mx-2" href="admin.php">Accueil
                    </a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-2" href="admin_realisation.php">Réalisations</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-2" href="../index.php">Voir le site</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-2" href="../deconnection.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>


<!-- AFFICHAGE REALISATIONS-->
    <section id="article">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3 mt-5">Réalisations</h3>
            <table class="table table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Commune</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Date</th>
                        <th scope="col" style="text-align:center;">Modifier</th>
                        <th scope="col" style="text-align:center;">Supprimer</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td style="text-align:center;"><img style="height:65px;" src="uploads/<?= $article["picture"]; ?>" alt="<?= $article["alt"]; ?>"></td>
                    <td style="text-align:center;"><?php echo $article["titre_1"]?></td>
                    <td style="text-align:center;"><?php echo $article["titre_2"]?></td>
                    <td style="text-align:center;"><?php echo $article["txt"]?></td>
                    <td style="text-align:center;"><a class="btn btn-primary" href="update_article.php?id=<?= $article["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a></td>
                    <td style="text-align:center;">
                        <form method="post" action="delete_article.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <input type="hidden" name="id" value="<?= $article["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
    
<!-- ADMIN REALISATIONS-->

        <div class="bg-light p-5 m-5">
            <form method="POST" action="admin.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="formGroupExampleInput">Titre n°1</label>
                    <input type="text" name="titre_1" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Titre n°2</label>
                    <input type="text" name="titre_2" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mon texte</label>
                    <textarea type="text" name="txt" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                    <input type="file" name="picture"class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
                    <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </section>
    <!-- FIN ARTICLES-->
<?php } ?>

            
<!-- FOOTER -->
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>
		
</html> 
	



