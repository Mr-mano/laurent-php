<?php
session_start();
require_once __DIR__ . "/insert_realisation.php";
require_once __DIR__ . "/../model/database.php";
$errcode = isset($_GET["errcode"]) ? $_GET["errcode"] : NULL;
$realisations = getAllEntities("realisations");
$dateTime = date('d/m/Y');
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
<?php require_once __DIR__ . "/layout/header.php"; ?>
<main>
<main>


<!-- AFFICHAGE REALISATIONS-->
    <section id="realisation">
        <div class="border p-5 m-5">
            <h3 class="text-center mb-3 mt-5">Réalisations</h3>
            <table class="table table-responsive-lg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="text-align:center;">Photo</th>
                        <th scope="col" style="text-align:center;">Titre</th>
                        <th scope="col" style="text-align:center;">Commune</th>
                        <th scope="col" style="text-align:center;">Texte</th>
                        <th scope="col" style="text-align:center;">Modifier</th>
                        <th scope="col" style="text-align:center;">Supprimer</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach ($realisations as $realisation) : ?>
                <tr>
                    <td style="text-align:center;"><img style="height:65px;" src="uploads/<?= $realisation["photo"]; ?>" alt="<?= $realisation["alt"]; ?>"></td>
                    <td style="text-align:center;"><?php echo $realisation["titre"]?></td>
                    <td style="text-align:center;"><?php echo $realisation["ville"]?></td>
                    <td style="text-align:center;"><?php echo $realisation["txt"]?></td>

                    
                    <td style="text-align:center;"><a class="btn btn-primary" href="update_realisation.php?id=<?= $realisation["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a></td>
                    <td style="text-align:center;">
                        <form method="post" action="delete_realisation.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <input type="hidden" name="id" value="<?= $realisation["id"]; ?>">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></i></button>
                        </form>
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
    
<!-- ADMIN REALISATIONS-->
        <div class="bg-light p-5 m-5">
            <form method="POST" action="admin_realisation.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="formGroupExampleInput">Titre</label>
                    <input type="text" name="titre" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Ville</label>
                    <input type="text" name="ville" class="form-control" id="formGroupExampleInput" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texte</label>
                    <textarea type="text" name="txt" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo (8MO maxi)</label>
                    <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
                    <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="date_creation" value="<?php echo date("d-m-Y"); ?>">
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
	



