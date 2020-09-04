<?php
require_once __DIR__ . "/../model/database.php";
$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$picture = getPicture($id);

            if(isset($_POST['id']) && isset($_POST['realisation_id']) && isset($_FILES['photo_rea']['name']) && isset($_POST['alt_img'])){

                move_uploaded_file($_FILES['photo_rea']['tmp_name'], 'uploads/'.basename($_FILES['photo_rea']['name']));
                
                $id = $_POST['id'];
                $realisation_id = $_POST['realisation_id'];
                $photo_rea = $_FILES['photo_rea'];
                $alt_img = $_POST['alt_img'];

                insertEntity("pictures", ['photo_rea' => $photo_rea['name'], 'alt_img' => $alt_img, 'realisation_id' => $realisation_id])
                /*or die(print_r([$id, $titre, $ville, $txt, $txt, $alt]))*/;
                
                    header("Location: update_realisation.php?id=" . $id);
                    exit();
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

                <form method="POST" action="insert_realisation_new_pict.php?id=<?= $id; ?>" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                            
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="photo_rea" class="form-control-file"  value="<?= $picture["photo"]; ?>" required></input>
                                            </div>
                                            
                                            <div class="text-align-center mt-5">
                                                <label for="exampleFormControlFile1">Description photo_rea</label>
                                                <input type="txt" name="alt_img" class="form-control-file" required></input>
                                            </div>
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="txt" name="realisation_id" class="form-control-file"  value="<?= $id; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <button class="btn btn-primary mt-2 mx-2" type="submit">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_realisation.php?id=<?= $id ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                    </div>
                </form>
                
                <?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>