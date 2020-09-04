<?php


require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1); 
$picture = getRealisation($id);

            if(isset($_POST['id']) && isset($_FILES['photo']['name']) && isset($_POST['alt'])){
            
                move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.basename($_FILES['photo']['name']));

                $id = $_POST['id'];
                $photo = $_FILES['photo'];
                $alt = $_POST['alt'];
                
                $errcode = updateEntity("realisations", $id, [
                    'photo' => $photo['name'], 
                    'alt' => $alt
                    ]);
                if ($errcode) {
                    header("Location: update_realisation.php?errcode=" . $errcode);
                } else {
                    header("Location: update_realisation.php?id=" . $id);
                    exit();
                }
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

                <form method="POST" action="update_realisation_new_princip_pict.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">

                            <div class="form-group">
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="photo" class="form-control-file"  value="<?= $picture["photo"]; ?>"></input>
                                            </div>
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Description de l'image</label>
                                                <input type="txt" name="alt" class="form-control-file"  value="<?= $picture["alt"]; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $picture["id"]; ?>">
                                        <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $id; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_realisation.php?id=<?= $id; ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                                
                    </div>
                </form>
                
                <?php require_once __DIR__ . "/layout/footer.php"; ?>