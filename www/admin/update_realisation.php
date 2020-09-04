<?php
require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$realisation = getRealisation($id);
$images = getAllRealisationPicture($id);


if(isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['ville']) && isset($_POST['txt']) && isset($_POST['alt'])){
    
    
                    $id = $_POST['id'];
                    $titre = $_POST['titre'];
                    $ville = $_POST['ville'];
                    $txt = $_POST['txt'];
                    $alt = $_POST['alt'];
            
                updateEntity("realisations", $id, ['titre' => $titre, 'ville' => $ville, 'txt' => $txt, 'alt' => $alt])
                /*or die(print_r([$id, $titre, $ville, $txt, $txt, $alt]))*/;
                
                    if ($errcode) {
                        header("Location: admin_realisation.php?errcode=" . $errcode);
                    } else {
                        header("Location: admin_realisation.php");
                        exit();
                    }   
            }
?>
<?php require_once __DIR__ . "/layout/header.php"; ?>


<div class="container bg-light p-5 my-5 rounded">
    <form method="POST" action="update_realisation.php" enctype="multipart/form-data">
        
            <div class="form-group d-flex" style="width:10rem; text-align:center;">
                    <div class="m-2" style="min-width:10rem;">
                        <img style="width:10rem;" src="uploads/<?= $realisation["photo"]; ?>" alt="<?= $realisation["alt"]; ?>">
                        <a class="btn btn-primary mt-3" style="width:50px;" href="update_realisation_new_princip_pict.php?id=<?= $realisation["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                        <p>photo principale</p>
                    </div>
                    <?php foreach ($images as $image) : ?>
                        <div class="m-2" style="width:10rem;">
                            <img style="width:10rem;" src="uploads/<?= $image["photo_rea"]; ?>" alt="<?= $image["alt_img"]; ?>">
                            <a class="btn btn-primary mt-3 " style="width:50px;" href="update_realisation_new_pict.php?id=<?= $image["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                        </div>
                    <?php endforeach?>
                    
            </div>
            <div class="d-flex justify-content-center mt-2 mx-2">
                    <a type="button" class="btn btn-primary mt-2 mx-2" href="insert_realisation_new_pict.php?id=<?= $realisation["id"]; ?>" role="button">Ajouter image</a>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Titre</label>
                <input type="text" name="titre" class="form-control" id="formGroupExampleInput"  value="<?= $realisation["titre"]?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Ville</label>
                <input type="text" name="ville" class="form-control" id="formGroupExampleInput"  value="<?= $realisation["ville"]?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Texte</label>
                <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" value="<?=  $realisation["txt"]?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
                <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" value="<?= $realisation["alt"]; ?>">
            </div>
            <div class="d-flex justify-content-center">
                <input type="hidden" name="id" value="<?= $realisation["id"]; ?>">
                <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $realisation["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
            <div class="d-flex justify-content-center  mt-2 mx-2">
                    <a type="button" class="btn btn-success" href="admin_realisation.php" role="button">Retour</a>
            </div>

        
    </form>
</div>
            
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>