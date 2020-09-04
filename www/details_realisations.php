
<?php
require_once __DIR__ . "/model/database.php";

$id = (isset($_GET['id']) ? $_GET["id"] : 1) or (isset($_POST['id'])); 
$realisations = getRealisation($id);
$pictures = getAllRealisationPicture($id);
$photo = getPicture($id);

?>


<?php require_once "layout/header.php"; ?>
<body>
<main class="rea__main-rea" role="main">
    <div class="container rea__cont1">  
        <div class="container rea__titre-container">
            </div>
                <div class="container rea__cont">
                    <div class="card-body">
                        <h1 class="card-title rea__titre" style="margin:0 ;"><?= $realisations["titre"]; ?></h1>
                        <div class="d-flex justify-content-between">
                            <h2 class="card-title rea__h3-accueil" style="margin: 0;"><?= $realisations["ville"]; ?></h2>
                            <p style="font-size:0.9rem; margin:3% 0 0 0 ;"><?= $realisations["date_creation"]; ?></p>
                        </div>
                        <div id="gallery" class="rea__img" data-toggle="modal" data-target="#myModal">
                        <img id="myImg" class="card-img hover-shadow cursor" onclick="openModal();currentSlide(1)"  src="admin/uploads/<?= $realisations["photo"]; ?>" alt="" >
                    </div>
                    <div>
                        <?php foreach($pictures as $picture) : ?>
                            <img style="width:auto; max-height:90px; margin-top:5%;" src="admin/uploads/<?= $picture["photo_rea"]; ?>" alt="" >
                        <?php endforeach; ?>
                    </div>
                        <p class="card-text" style="margin-top:5%;"><?= $realisations["txt"]; ?></p>
                </div>
                <div class="d-flex justify-content-center">
                    <a  type="button" class="btn btn-outline-primary"  style="margin:5% 0 0 0 ;" href="javascript:history.back()">Retour</a>
                </div>
            </div>
        </div>
    </div>
            <!-- Trigger the Modal -->

            <div id="myModal" class="modal">
                <span class="close cursor" data-dismiss="modal">&times;</span>
                <div class="modal-content">

                    <div class="mySlides">
                        <img src="admin/uploads/<?= $realisations["photo"]; ?>" style="width:100%">
                    </div>
                    <?php foreach($pictures as $picture) : ?>
                    <div class="mySlides">
                        <img src="admin/uploads/<?= $picture["photo_rea"]; ?>" style="width:100%">
                    </div>
                    <?php endforeach; ?>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>

</main>
                <!-- FOOTER -->
<?php require_once "layout/footer.php"; ?>
<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>


