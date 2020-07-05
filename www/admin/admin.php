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

    <!--AFFICHAGE TITRE ACCUEIL-->
    <section id="titre_accueil" class="pt-5">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">Titre accueil</h3>
            <?php if(count($titre_accueil) > 0) : ?>
            <table class="table table-responsive-lg" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;"></th>
                        <th scope="col" style="text-align:center;">Nom</th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">ville</th>
                        <th scope="col" style="text-align:center;">Modifier</th>
                        <th scope="col" style="text-align:center;">Supprimer</th>
                    </tr>
            </thead>
  
            <tbody>
                <?php foreach ($titre_accueil as $titre_accueils) : ?>
                <tr>
                    <th scope="row">
                    <td style="text-align:center;vertical-align: center;"><?php echo $titre_accueils["nom_prenom"]?></td>
                    <td style="text-align:center;vertical-align: center;"><?php echo $titre_accueils["job"]?></td>
                    <td style="text-align:center;vertical-align: center;"><p class="text-justify"><?php echo $titre_accueils["ville"]?></p></td>
                    <td style="text-align:center;vertical-align: center;">
                        <form method="post" action="update_titre-accueil.php">
                        <input type="hidden" name="id" value="<?= $titre_accueils["id"]; ?>">
                        <button class="btn btn-primary"><i class="fa fa-pencil-alt" aria-hidden="true"></i></button>
                        </form>
                        </td>
                    <td style="text-align:center;">
                        <form method="post" action="delete_article_accueil.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <input type="hidden" name="id" value="<?= $titre_accueils["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <?php endif; ?>


        <!-- ADMIN TITRE ACCUEIL-->
        <?php if(count($titre_accueil ) >= 1) :?>
            
                <?php elseif(count($titre_accueil ) == 0) :?>
        <div class="bg-light p-5 m-5">
            <form method="POST" action="admin.php" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="formGroupExampleInput">Prénom </label>
                    <input type="text" name="nom_prenom" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Titre principal de la page</label>
                    <input type="text" name="job" class="form-control" id="formGroupExampleInput2" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Ville</label>
                    <input type="text" name="ville" class="form-control" id="formGroupExampleInput2" required>
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
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3">techniques</h3>
                <table class="table table-responsive-lg">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="text-align:center;"></th>
                            <th scope="col" style="text-align:center;">Photo</th>
                            <th scope="col" style="text-align:center;">Titre</th>
                            <th scope="col" style="text-align:center;">Texte</th>
                            <th scope="col" style="text-align:center;">Modifier</th>
                            <th scope="col" style="text-align:center;">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($techniques as $technique) : ?>
                        <tr>
                            <th scope="row">
                            <td><img class="rounded-circle" style="height:65px;" src="uploads/<?= $technique["picture"]; ?>" alt="<?= $technique["alt"]; ?>"></td>
                            <td><?php echo $technique["libelle"]?></td>
                            <td><p class="text-justify"><?php echo $technique["txt"]?></p></td>
                            <td><a class="btn btn-primary" href="update_technique.php?id=<?= $technique["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                            </td>
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
            
        <!-- ADMIN TECHNIQUES-->
        
            <div class="bg-light p-5 m-5">
                <form method="POST" action="admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                        <input type="file" name="picture"class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Titre</label>
                        <input type="text" name="libelle" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Texte</label>
                        <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" required>
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
        </div>
    </section>
    <!-- FIN TECHNIQUES-->


<hr class="featurette-divider">

<!-- ADMIN ARTICLES-->
    <section id="article">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3 mt-5">Articles</h3>
            <table class="table table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;">Titre 1</th>
                        <th scope="col" style="text-align:center;">Titre 2</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Photo</th>
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

    <hr class="featurette-divider">
    

<!-- ADRESSE -->
<!-- AFFICHAGE ADRESSE -->
<section id="adresse">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3 mt-5">Adresse</h3>
            <?php if(count($adresses) == 0) :?>
            
            <?php elseif(count($adresses) >= 1) :?>
            <table class="table table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;">Nom Prénom</th>
                        <th scope="col" style="text-align:center;">Activité</th>
                        <th scope="col" style="text-align:center;">Adresse</th>
                        <th scope="col" style="text-align:center;">CP</th>
                        <th scope="col" style="text-align:center;">Ville</th>
                        <th scope="col" style="text-align:center;">Siret</th>
                        <th scope="col" style="text-align:center;">tel</th>
                        <th scope="col" style="text-align:center;">email</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($adresses as $adresse) : ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $adresse["nom_prenom"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["artisan"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["adresse"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["codepostal"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["ville"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["siret"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["tel"]?></td>
                            <td style="text-align:center;"><?php echo $adresse["email"]?></td>
                            </tr>
                        
                </tbody>
            </table>
            <table class="table table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;">Texte Contact</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($adresses as $adresse) : ?>
                        <tr>
                            <td style="text-align:center;"><p><?php echo $adresse["txt"]?></p></td>
                            </tr>
                            <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="container d-flex justify-content-center">
                                <a class="btn btn-primary mx-2 my-5" href="update_adresse.php?id=<?= $adresse["id"];?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</a>
                                <form method="post" action="delete_adresse.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                                <input type="hidden" name="id" value="<?= $adresse["id"]; ?>">
                                <button class="btn btn-danger mx-2 my-5"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                </form>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
<!-- FIN AFFICHAGE ADRESSE -->

<!-- GESTION AFFICHAGE ADRESSE -->

<?php if(count($adresses) >= 1) :?>
            
            <?php elseif(count($adresses) == 0) :?>
        <div class="bg-light p-5 m-5">
            <form method="POST" action="admin.php" enctype="multipart/form-data">
            <div class="form-group">
                        <label for="formGroupExampleInput">Texte contact</label>
                        <textarea type="text" name="txt" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                    </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Nom prenom</label>
                    <input type="text" name="nom_prenom" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Activité</label>
                    <input type="text" name="artisan" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">CP</label>
                    <input type="text" name="codepostal" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Ville</label>
                    <input type="text" name="ville" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Siret</label>
                    <input type="text" name="siret" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">tel</label>
                    <input type="text" name="tel" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">email</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mt-2 " type="submit">Envoyer</button>
                </div>
            </form>
        </div>
<!-- FIN GESTION AFFICHAGE ADRESSE -->
            <?php endif; ?>
            </section>
            <hr class="featurette-divider">
            <!-- FIN SESSION ADMINISTRATEUR -->
<?php } ?>
<!-- FOOTER -->
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>
		
</html> 
	



