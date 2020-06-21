<?php
session_start();
require_once __DIR__ . "/carousel/carousel.php";
require_once __DIR__ . "/titre_accueil.php";
require_once __DIR__ . "/insert_technique.php";
require_once __DIR__ . "/../model/database.php";


//$titre_accueil = getAllTitreAccueil();
$titre_accueil = getAllEntities("titre_accueil");
$techniques = getAllEntities("techniques");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            <li class="nav-item  px-3">
                    <a class="nav-link" href="admin_carousel.php">Carousel
                    </a>
                </li>
                <li class="nav-item  px-3">
                    <a class="nav-link" href="admin.php">Admin accueil
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Admin réalisations</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#">Info contact</a>
                </li>
                <li class="nav-item px-3">
                <a class="nav-link" href="../index.php">Voir site</a>
                </li>
                <li class="nav-item px-3">
                <a class="nav-link" href="../deconnection.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <!--AFFICHAGE TITRE ACCUEIL-->
    <section id="titre_accueil">
        <div class="container border p-5 my-5">
            <h3 class="text-center mb-3">Titre accueil</h3>
            <?php if(count($titre_accueil) > 0) : ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Nom</th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">ville</th>
                        <th scope="col" style="text-align:center;">supprimer</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($titre_accueil as $titre_accueils) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;"><?php echo $titre_accueils["nom_prenom"]?></td>
                    <td style="text-align:center;"><?php echo $titre_accueils["titre_accueil"]?></td>
                    <td style="text-align:center;"><?php echo $titre_accueils["ville"]?></td>
                    <td style="text-align:center;">
                        <form method="post" action="delete_article_accueil.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_accueils["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>


        <!-- ADMIN TITRE ACCUEIL-->
        <?php if(count($titre_accueil ) >= 1) :?>
                <div class="container d-flex justify-content-center" style="color:green;">
                    <p>Pour modifier, il faut d'abord supprimer <i class="fas fa-trash-alt"></i></p>
                </div>
                <?php elseif(count($titre_accueil ) == 0) :?>
        <div class="container bg-light p-5 my-5">
            <form method="POST" action="admin.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nom Prénom</label>
                    <input type="text" name="nom_prenom" class="form-control" id="formGroupExampleInput" placeholder="mon texte" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Titre principal de la page</label>
                    <input type="text" name="title_accueil" class="form-control" id="formGroupExampleInput2" placeholder="mon texte" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Ville</label>
                    <input type="text" name="ville" class="form-control" id="formGroupExampleInput2" placeholder="mon texte" required>
                </div>
                    <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </section>
    <!-- FIN TITRE ACCUEIL-->
<hr class="featurette-divider">



    <!--AFFICHAGE TECHNIQUES-->
    <section id="technique">
        <div class="container border p-5 my-5">
            <h3 class="text-center mb-3">techniques</h3>
            <?php if(count($titre_accueil) > 0) : ?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Photo</th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">texte</th>
                        <th scope="col" style="text-align:center;">supprimer</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach ($techniques as $technique) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;"><img class="rounded-circle" style="height:50px;" src="uploads/<?= $technique["picture"]; ?>" alt="<?= $technique["alt"]; ?>"></td>
                    <td style="text-align:center;"><?php echo $technique["libelle"]?></td>
                    <td style="text-align:center;"><?php echo $technique["txt"]?></td>
                    <td style="text-align:center;">
                        <form method="post" action="delete_technique.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <input type="hidden" name="id" value="<?= $technique["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>


        <!-- ADMIN TECHNIQUES-->
        
        <div class="container bg-light p-5 my-5">
            <form method="POST" action="admin.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                    <input type="file" name="picture"class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Titre</label>
                    <input type="text" name="libelle" class="form-control" id="formGroupExampleInput" placeholder="mon texte" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Texte</label>
                    <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" placeholder="mon texte" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
                    <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" placeholder="mon texte" required>
                </div>
                    <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </section>
    <!-- FIN TECHNIQUES-->
<hr class="featurette-divider">






<?php } ?>


<!-- FOOTER -->
		
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>
		
</html> 
	



