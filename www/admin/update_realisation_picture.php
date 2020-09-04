<?php


require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$realisation = getRealisation($id);

            if(isset($_POST['id']) && isset($_FILES['photo']['name'])){
            
                $id = $_POST['id'];
                $photo = $_FILES['photo'];
                
                $errcode = updateEntity("realisations", $id, [ 'photo' => $photo['name']])
                /*or die(print_r([$id, $photo]))*/;
                if ($errcode) {
                    header("Location: admin_realisation.php?errcode=" . $errcode);
                } else {
                    header("Location: update_realisation.php?id=" . $id);
                    exit();
                }
            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>


                <form method="POST" action="update_realisation_picture.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                    <img style="width:75px;" src="uploads/<?= $realisation["photo"]; ?>" alt="<?= $realisation["alt"]; ?>">
                                        <div class="card-body">
                                            <div class="text-align-center">
                                                <label for="exampleFormControlFile1"></label>
                                                <input type="file" name="photo" class="form-control-file"  value="<?= $realisation["photo"]; ?>"></input>
                                            </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                        <input type="hidden" name="id" value="<?= $realisation["id"]; ?>">
                                        <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $realisation["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                                        <a type="button" class="btn btn-success" href="update_realisation.php?id=<?= $realisation["id"]; ?>" role="button">Annuler</a>
                                    </div>
                                </div>
                                
                    </div>
                </form>
                
                <?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>