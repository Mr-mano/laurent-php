<?php
require_once __DIR__ . "/model/database.php";
$realisations = getAllEntities("realisations");
$pictures = getAllEntities("pictures");
$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id']));


?>



<?php require_once "layout/header.php"; ?>

<main class="rea__main-rea" role="main">
        
    <div class="container rea__cont1">
            <div class="container rea__titre-container">
                <h3 class="rea__h3-accueil"><i class="fas fa-camera-retro"></i> Photo</h3>
                <h1 class="rea__h1-accueil">
                    Les chantiers réalisés.
                </h1>
                <p class="card-text rea__text">Ils m'ont fait confiance, découvrez les dernièrs chantiers.</p>
            </div>
            <div class="container rea__cont">
                
                
                    <div id="gallery" class="rea__img" data-toggle="modal" data-target="#myModal">
                        <?php foreach ($realisations as $realisation) : ?>
                            <hr class="featurette-divider rea__sepa" style="margin:7% 0 10% 0 ;">
                        <img class="card-img" src="admin/uploads/<?= $realisation["photo"]; ?>" alt="" >
                    </div>
                    <div class="card-body">
                        <h2 class="card-title rea__titre"><?= $realisation['titre'];?></h2>
                        <h3 class="card-title rea__lieu"><?= $realisation['ville'];?></h3>
                        <p class="card-text" style="margin-bottom:5%;"><?= $realisation['txt'];?></p>
                        <div class="d-flex justify-content-center">
                        <a type="button" class="btn btn-outline-primary" href="details_realisations.php?id=<?= $realisation["id"]; ?>" >Voir +</a>
                        </div>
                        

                        <?php endforeach; ?>
                    </div>
            </div>
    </div>


        <!-- FOOTER -->
        <?php require_once "layout/footer.php"; ?>

</main>



<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
</body>

</html>