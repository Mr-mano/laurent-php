<?php
session_start();
require_once __DIR__ . "/../model/database.php";
$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$adresse = getAdresse($id);

if(isset($_POST['id']) && isset($_POST['nom_prenom']) && isset($_POST['artisan']) && isset($_POST['adresse']) && isset($_POST['codepostal'])
&& isset($_POST['ville'])  && isset($_POST['siret'])  && isset($_POST['tel']) && isset($_POST['email']) && isset($_POST['txt'])){

            $id = $_POST['id'];
            $nom_prenom = $_POST['nom_prenom'];
            $artisan = $_POST['artisan'];
            $adresse = $_POST['adresse'];
            $codepostal = $_POST['codepostal'];
            $ville = $_POST['ville'];
            $siret = $_POST['siret'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $txt = $_POST['txt'];

    //$errcode = editTitreAccueil($id, $nom_prenom, $job, $ville);
    $errcode = updateEntity("adresse", $id, ['nom_prenom' => $nom_prenom, 'artisan' => $artisan, 'adresse' => $adresse, 'codepostal' => $codepostal,
    'ville' => $ville, 'siret' => $siret, 'tel' => $tel, 'email' => $email, 'txt' => $txt]);
    
    if ($errcode) {
        header("Location: admin.php?errcode=" . $errcode);
    } else {
        header("Location: admin.php#adresse");
        exit();
    }
}
?>
<!--HEADER-->
<?php require_once __DIR__ . "/layout/header.php"; ?>
<?php if(!isset($_SESSION['connect'])){ ?>
    <!-- si l'administrateur n'est pas connecté affiche ça -->
        <body>
            <main>
                <div class="container d-flex justify-content-center" style="height: 500px">
                    <h1 style="margin: auto; text-align: center;">Oup's il n'y a rien ici</h1>
                </div>
            </main>
        </body>
    <?php } else { ?>  

    <div class="container bg-light p-5 my-5">
            <form method="POST" action="update_adresse.php" enctype="multipart/form-data" id="form_titre_accueil">
            <div class="form-group">
                        <label for="formGroupExampleInput">Texte contact</label>
                        <textarea type="text" name="txt" class="form-control" id="exampleFormControlTextarea1" rows="4"><?php echo $adresse["txt"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nom Prénom</label>
                        <input type="text" name="nom_prenom" class="form-control" id="input_titre" value="<?php echo $adresse["nom_prenom"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">activité</label>
                        <input type="text" name="artisan" class="form-control" id="input_titre" value="<?php echo $adresse["artisan"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="input_titre" value="<?php echo $adresse["adresse"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Code postal</label>
                        <input type="text" name="codepostal" class="form-control" id="input_titre" value="<?php echo $adresse["codepostal"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Commune</label>
                        <input type="text" name="ville" class="form-control" id="input_titre" value="<?php echo $adresse["ville"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">N° de siretl</label>
                        <input type="text" name="siret" class="form-control" id="input_titre" value="<?php echo $adresse["siret"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tel</label>
                        <input type="text" name="tel" class="form-control" id="input_titre" value="<?php echo $adresse["tel"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" name="email" class="form-control" id="input_titre" value="<?php echo $adresse["email"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="id" value="<?= $adresse["id"]; ?>">
                            <button class="btn btn-primary mt-2 mx-2" name="id" value="<?= $adresse["id"]; ?>" type="submit" id="btn1"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="admin.php#adresse" role="button">Annuler</a>
                        </div>
                    </div>
            </form>
    </div>    
        
        <?php require_once __DIR__ . "/layout/footer.php"; ?>
        
</main>
</body>	
<!-- FIN SESSION-->
<?php } ?>
</html>