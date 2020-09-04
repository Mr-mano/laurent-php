<?php


require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$technique = getTechnique($id);


            if(isset($_POST['id']) && isset($_FILES['picture']['name'])){

                move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'.basename($_FILES['picture']['name']));
                
                $id = $_POST['id'];
                $picture = $_FILES['picture'];
            
            

                $errcode = updateEntity("techniques", $id, [ 'picture' => $picture['name']])
                /*or die(print_r([$id, $picture]))*/;
                if ($errcode) {
                    header("Location: admin.php?errcode=" . $errcode);
                } else {
                    header("Location: update_technique.php?id=" . $id);
                    exit();
                }
                

            }

?>
<?php require_once __DIR__ . "/layout/header.php"; ?>


                <form method="POST" action="update_technique_picture.php" enctype="multipart/form-data">
                    <div class="container bg-light p-5 my-5">
                            <div class="form-group">
                                <div class="text-align-center">
                                    <label for="exampleFormControlFile1"></label>
                                    <input type="file" name="picture" class="form-control-file"  value="<?= $technique["picture"]; ?>"></input>
                                </div>
                                <div class="d-flex justify-content-center mt-5 ">
                                    <input type="hidden" name="id" value="<?= $technique["id"]; ?>">
                                    <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $technique["id"]; ?>">Valider</button>
                                    <div class="d-flex justify-content-center mt-2 mx-2">
                            <a type="button" class="btn btn-success" href="update_technique.php?id=<?= $technique["id"]; ?>" role="button">Annuler</a>
                        </div>
                                </div>
                                
                    </div>
                </form>
                <?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>