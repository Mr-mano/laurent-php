<?php
session_start();
require_once __DIR__ . "/../model/database.php";
$titre_accueils = getAllEntities("titre_accueil");

if(isset($_POST['id']) && isset($_POST['nom_prenom']) && isset($_POST['job']) && isset($_POST['ville'])){

    $id = $_POST['id'];
    $nom_prenom = $_POST['nom_prenom'];
    $job = $_POST['job'];
    $ville = $_POST['ville'];

    //$errcode = editTitreAccueil($id, $nom_prenom, $job, $ville);
    $errcode = updateEntity("titre_accueil", $id, ['nom_prenom' => $nom_prenom, 'job' => $job, 'ville' => $ville]);
    
    if ($errcode) {
        header("Location: admin.php?errcode=" . $errcode);
    } else {
        header("Location: admin.php");
        exit();
    }
}
?>
<!--HEADER-->
<?php require_once __DIR__ . "/layout/header.php"; ?>

<?php if(!isset($_SESSION['connect'])){ 
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
<?php foreach ($titre_accueils as $titre_accueil) : ?>
    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_titre-accueil.php" enctype="multipart/form-data" id="form_titre_accueil">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nom Prénom</label>
                        <input type="text" name="nom_prenom" class="form-control" id="input_titre" value="<?php echo $titre_accueil["nom_prenom"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Titre principal de la page</label>
                        <input type="text" name="job" class="form-control" id="input_titre" value="<?php echo $titre_accueil["job"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Ville</label>
                        <input type="text" name="ville" class="form-control" id="input_titre" value="<?php echo $titre_accueil["ville"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $titre_accueil["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" name="id" value="<?= $titre_accueil["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="admin.php" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    
        <?php endforeach; ?>
        <?php require_once __DIR__ . "/layout/footer.php"; ?>
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>