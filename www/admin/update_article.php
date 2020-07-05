<?php
require_once __DIR__ . "/../model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$article = getArticle($id);

if(isset($_POST['id']) && isset($_POST['titre_1']) && isset($_POST['titre_2']) && isset($_POST['txt']) && isset($_POST['alt'])){
    
            
            $id = $_POST['id'];
            $titre_1 = $_POST['titre_1'];
            $titre_2 = $_POST['titre_2'];
            $txt = $_POST['txt'];
            $alt = $_POST['alt'];
            
                $errcode = updateEntity("articles", $id, ['titre_1' => $titre_1, 'titre_2' => $titre_2, 'txt' => $txt, 'alt' => $alt])
                /*or die(print_r([$id, $titre_1, $titre_2, $txt, $alt]))*/;
                
                    if ($errcode) {
                        header("Location: admin.php?errcode=" . $errcode);
                    } else {
                        header("Location: admin.php#article");
                        exit();
                    }   
            }
?>
<?php require_once __DIR__ . "/layout/header.php"; ?>

<div class="container bg-light p-5 my-5">
    <form method="POST" action="update_article.php" enctype="multipart/form-data">
        <div class="form-group">
            <div class="d-flex align-items-center">
                <img style="height:75px;" src="uploads/<?= $article["picture"]; ?>" alt="<?= $article["alt"]; ?>">
                <a class="btn btn-primary  mx-5" href="update_article_picture.php?id=<?= $article["id"]; ?>"> Modifier l'image</a>
            </div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Titre 1</label>
            <input type="text" name="titre_1" class="form-control" id="formGroupExampleInput"  value="<?= $article["titre_1"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Titre 2</label>
            <input type="text" name="titre_2" class="form-control" id="formGroupExampleInput"  value="<?= $article["titre_2"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Texte</label>
            <input type="text" name="txt" class="form-control" id="formGroupExampleInput2" value="<?=  $article["txt"]?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Description de l'image (référencement)</label>
            <input type="text" name="alt" class="form-control" id="formGroupExampleInput2" value="<?= $article["alt"]; ?>">
        </div>
        <div class="d-flex justify-content-center">
            <input type="hidden" name="id" value="<?= $article["id"]; ?>">
            <button class="btn btn-primary mt-2 mx-2" type="submit" value="<?= $article["id"]; ?>"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Modifier</button>
        <div class="d-flex justify-content-center  mt-2 mx-2">
            <a type="button" class="btn btn-success" href="admin.php#article" role="button">Annuler</a>
        </div>
    </form>
</div>
            
<?php require_once __DIR__ . "/layout/footer.php"; ?>


</main>
</body>	

</html>