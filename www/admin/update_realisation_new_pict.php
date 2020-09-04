<?php
require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET["id"]) ? $_GET["id"] : 1); 
$picture = getPicture($id);

if(isset($_POST["id"]) && isset($_POST["realisation_id"]) && isset($_FILES["photo_rea"]["name"]) && isset($_POST["alt_img"])){
            

            move_uploaded_file($_FILES['photo_rea']['tmp_name'], 'uploads/'.basename($_FILES['photo_rea']['name']));

                $id = $_POST["id"];
                $realisation_id = $_POST["realisation_id"];
                $photo_rea = $_FILES["photo_rea"];
                $alt_img = $_POST["alt_img"];


                $errcode = updateEntity("pictures", $id,[
                    "photo_rea" => $photo_rea["name"], 
                    "alt_img" => $alt_img, 
                    "realisation_id" => $realisation_id
                    ]);

                if ($errcode) {
                    header("Location: update_realisation.php?errcode=" . $errcode);
                } else {
                    header("Location: update_realisation.php?id=" . $realisation_id);
                    exit();
                }
            }
        
    


?>
<?php require_once __DIR__ . "/layout/header.php"; ?>
                <form method="POST" action="update_realisation_new_pict.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                        <div class="form-group">
                            
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="photo_rea" class="form-control-file" value="<?= $picture["photo_rea"]; ?>" required></input>
                                            </div>
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Description de la photo</label>
                                                <input type="txt" name="alt_img" class="form-control-file" value="<?= $picture["alt_img"]; ?>" required></input>
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="txt" name="realisation_id" class="form-control-file"  value="<?= $picture["realisation_id"]; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $id ?>"></input>
                                        <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $id?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_realisation.php?id=<?= $picture["realisation_id"]; ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
                <form method="post" action="delete_photo_rea.php" onsubmit="return confirm('Est vous sûre de vouloir supprimer cet article? ');">
                        <div class="container bg-light p-5 d-flex justify-content-center">
                                <input type="hidden" name="id" value="<?= $picture["id"]; ?>">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Suprimer l'image</i></button>
                        </div>
                </form>
                <?php require_once __DIR__ . "/layout/footer.php"; ?>