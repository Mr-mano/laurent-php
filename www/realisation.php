<?php require_once "layout/header.php"; ?>

    <main class="rea__main-rea" role="main">
        
        <div class="container rea__cont1">
            <div class="container rea__titre-container">
                <h3 class="rea__h3-accueil"><i class="fas fa-camera-retro"></i> Photo</h3>
                <h1 class="rea__h1-accueil">
                    Chantier de rénovation intérieur,extérieur.
                </h1>
                <p class="card-text rea__text">Ils m'ont fait confiance, découvrez les dernièrs chantiers réalisés dans
                    la vallée d'Aulps.</p>
            </div>
 <!-- photo 1 -->
            <div class="container rea__cont">
                <hr class="featurette-divider rea__sepa">
                <div id="gallery" class="rea__img" data-toggle="modal" data-target="#myModal">
                    <img id="myImg" class="card-img hover-shadow cursor" onclick="openModal();currentSlide(1)"  src="images/chambre.jpg" alt="" >
                    <img class="card-img rea__small-img hover-shadow cursor" onclick="openModal();currentSlide(2)" src="images/chalet.jpg" alt="">
                    <img class="card-img rea__small-img hover-shadow cursor" onclick="openModal();currentSlide(3)" src="images/chalet2.jpg" alt="">
                </div>

                <div class="card-body">
                    <h2 class="card-title rea__titre">Rénovation bois chalet</h2>
                    <h3 class="card-title rea__lieu">Morzine</h3>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>

                </div>
            </div>
 <!-- photo 1 -->
            <div class="container rea__cont">
                <hr class="featurette-divider rea__sepa">
                <div id="gallery" class="rea__img" data-toggle="modal" data-target="#myModal">
                    <img id="myImg" class="card-img hover-shadow cursor" onclick="openModal();currentSlide(1)"  src="images/chambre2.jpg" alt="" >
                </div>

                <div class="card-body">
                    <h2 class="card-title rea__titre">Enduit et peinture chambre parental</h2>
                    <h3 class="card-title rea__lieu">Avoriaz</h3>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>

                </div>
            </div>

        </div>
        </div>
        </div>
        <!-- Trigger the Modal -->



        <div id="myModal" class="modal">
            <span class="close cursor" data-dismiss="modal">&times;</span>
            <div class="modal-content">

                <div class="mySlides">
                    <img src="images/chambre.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="images/chalet.jpg" style="width:100%">
                </div>

                <div class="mySlides">
                    <img src="images/chalet2.jpg" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

               


                
                
            </div>
        </div>

       

        <!-- FOOTER -->
        <?php require_once "layout/footer.php"; ?>

    </main>



    <script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>