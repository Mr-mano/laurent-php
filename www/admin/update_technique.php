<?php
require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$technique = getTechnique($id);

if(isset($_POST['id']) && isset($_POST['libelle']) && isset($_POST['txt']) && isset($_POST['alt'])){
            
            $id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            
                $errcode = updateEntity("techniques", $id, ['libelle' => $libelle, 'txt' => $txt, 'alt' => $alt]);
                
                    if ($errcode) {
                        header("Location: admin.php?errcode=" . $errcode);
                    } else {
                        header("Location: admin.php#technique");
                        exit();
                    }   
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

<div class="container bg-light p-5 my-5">
        <form method="POST" action="update_technique.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" style="height:75px;" src="uploads/<?= $technique["picture"]; ?>" alt=""><?= $technique["picture"]; ?>
                            <a class="btn btn-primary  mx-5" href="update_technique_picture.php?id=<?= $technique["id"]; ?>"> Modifier l'image</a>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Titre</label>
                            <input type="text" name="libelle" class="form-control" id="formGroupExampleInput"  value="<?= $technique["libelle"]?>">
                        </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput2">Texte</label>
                            <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" value="<?=  $technique["txt"]?>">
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
                            <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" value="<?= $technique["alt"]; ?>">
                    </div>
                    <div class="d-flex justify-content-center">
                                <input type="hidden" name="id" value="<?= $technique["id"]; ?>">
                                <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $technique["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
                            <div class="d-flex justify-content-center  mt-2 mx-2">
                                <a type="button" class="btn btn-success" href="admin.php#technique" role="button">Annuler</a>
                            </div>
                    </div>
        </form>
</div>
            
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>