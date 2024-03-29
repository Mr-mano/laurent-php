
<?php
require_once __DIR__ . "/model/database.php";

$titre_accueil = getAllEntities("titre_accueil");
$carousel = getCarousel("carousel");
$carousel_2 = getCarousel("carousel_2");
$carousel_3 = getCarousel("carousel_3");
$techniques = getAllEntities("techniques");
$articles = getAllEntities("articles");
$adresses = getAllEntities("adresse");
$errcode = isset($_GET["errcode"]) ? $_GET["errcode"] : NULL;


?>
<?php require_once __DIR__ . "/layout/header.php"; ?>
	<main role="main">
		<!--CAROUSEL-->
		<div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel">
			<!--IMAGE 1 CAROUSEL-->
			<div class="carousel-inner">
					<div class="carousel-item active">
						<?php foreach ($carousel as $carousels) : ?>
						<img class="first-slide" src="admin/uploads/<?= $carousels["image"]; ?>" alt="<?= $carousel["alt"]; ?>">
						<div class="container">
							<div class="carousel-caption text-left">
							<h3 class="h-carousel"><?php echo $carousels["title"]?></h3>
							<p><?php echo $carousels["txt"]?></p>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="effet-img"></div>
					</div>
				<!--IMAGE 2 CAROUSEL-->
				<div class="carousel-item">
				<?php foreach ($carousel_2 as $carousel_2s) : ?>
					<img class="seconde-slide" src="admin/uploads/<?= $carousel_2s["image_2"]; ?>" alt="<?= $carousel_2s["alt_2"]; ?>">
					<div class="container">
						<div class="carousel-caption">
						<h3 class="h-carousel"><?php echo $carousel_2s["title_2"]?></h3>
						<p><?php echo $carousel_2s["txt_2"]?></p>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="effet-img"></div>
				</div>
				<!--IMAGE 3 CAROUSEL-->
				<div class="carousel-item">
				<?php foreach ($carousel_3 as $carousel_3s) : ?>
					<img class="third-slide" src="admin/uploads/<?= $carousel_3s["image_3"]; ?>" alt="<?= $carousel_3s["alt_3"]; ?>">
					<div class="container">
						<div class="carousel-caption  text-right">
						<h3 class="h-carousel"><?php echo $carousel_3s["title_3"]?></h3>
						<p><?php echo $carousel_3s["txt_3"]?></p>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="effet-img"></div>
				</div>
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- FIN DU CAROUSEL -->

		<!--TITRE PRESENTATION NOM, PRENOM, ARTISAN...-->
		<section class="pt-5">
		<div class="container marketing ">
			<div class="container mt-5"> 
				<?php foreach ($titre_accueil as $titre_accueils) : ?>
					<h1 class="titre__h1-accueil mt-1">
					<i class="fas fa-paint-roller"></i> 
					<?php echo $titre_accueils["job"];?>
					</h1>
					<h3 class="text-muted mt-2 ml-5"><?php echo $titre_accueils["nom_prenom"];?></h3>
					<h2 class="titre__h2-accueil mt-1"><?php echo $titre_accueils["ville"];?></h2>
						<div class="container m-4">
							<p style="text-align:justify; font-size:1.2rem;"><?php echo $titre_accueils["txt"];?></p>
						</div>
				<?php endforeach; ?>
			</div>
			

			<!--SPECIALITES, TECHNIQUES PEINTURE, ENDUIT...-->
			<div class="row mt-5">
			<!--AFFICHAGES SPECIALITES, TECHNIQUES-->
			<?php foreach ($techniques as $technique) : ?>
				<div class="col-lg-4 mt-5">
						<img class="rounded-circle"  src="admin/uploads/<?= $technique["picture"]; ?>" alt="<?= $technique["alt"]; ?>" width="170" height="170">
						<h2><?php echo $technique["libelle"]?></h2>
						<p class="titre__h2-accueil mt-2"><?php echo $technique["txt"];?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="container d-flex justify-content-center mt-5">
			<a class="btn btn-primary envoyer-contact" href="index.php#contact">Demander un devis</a>
			</div>
			<hr class="featurette-divider">
			<!--FIN SPECIALITES, TECHNIQUES-->
			
			
			
<!--AFFICHAGES DES ARTICLES-->
			
<?php 
$tab = count($articles); 
$i = 1;
?>
				<?php foreach ($articles as $article) : ?>
					<?php while ($i < $tab) : $i++; endwhile;?>
					<?php $i++;?>
					
				<div class="row featurette">
				<div class="col-md-7 <?php if($i % 2 == 1) echo "order-md-2";?>">
					<h2 class="featurette-heading" style="font-size:3rem;"><?php echo $article["titre_1"]?><br>
						<span class="text-muted" style="font-size:2rem;"><?php echo $article["titre_2"]?></span>
					</h2>
					<p class="lead"><?php echo $article["txt"]?></p>	
				</div> 
				<div class="col-md-5 <?php if($i % 2 == 1) echo "order-md-1";?>">
					<img class="featurette-image img-fluid mx-auto"  src="admin/uploads/<?= $article["picture"]; ?>"
						data-src="holder.js/500x500/auto" alt="<?= $article["alt"]; ?>">
				</div>
			</div>
			<hr class="featurette-divider">
			<?php endforeach; ?>
			</section>
			<!--début formualire contact-->
			<section id="contact" class="mb-4 form-contact">
				<!--Section heading-->
				<h2 class="h1-responsive font-weight-bold text-center my-4">Contact / Devis</h2>
				<!--Section description-->
				<?php foreach ($adresses as $adresse) : ?>
				<p class="text-center w-responsive mx-auto mb-5"><?= $adresse["txt"]; ?></p>
					<?php endforeach ?>
				<div class="row">
					<!--Grid column-->
					<div class="col-md-9 mb-md-0 mb-5">
						<form id="contact-form" name="contact-form" action="mail.php" method="POST">
							<!--Grid row-->
							<div class="row">
								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="text" id="name" name="name" class="form-control">
										<label for="name" class="">Votre nom</label>
									</div>
								</div>
								<!--Grid column-->
								<!--Grid column-->
								<div class="col-md-6">
									<div class="md-form mb-0">
										<input type="text" id="email" name="email" class="form-control">
										<label for="email" class="">Votre email</label>
									</div>
								</div>
								<!--Grid column-->
							</div>
							<!--Grid row-->
							<!--Grid row-->
							<div class="row">
								<div class="col-md-12">
									<div class="md-form mb-0">
										<input type="text" id="subject" name="subject" class="form-control">
										<label for="subject" class="">Sujet</label>
									</div>
								</div>
							</div>
							<!--Grid row-->
							<!--Grid row-->
							<div class="row">
								<!--Grid column-->
								<div class="col-md-12">
									<div class="md-form">
										<textarea type="text" id="message" name="message" rows="6"
											class="form-control md-textarea"></textarea>
										<label for="message">Votre message</label>
									</div>
								</div>
							</div>
							<!--Grid row-->
						</form>
						<div class="text-center text-md btn-envoyer pl-5">
							<a class="btn btn-primary envoyer-contact"
								onclick="document.getElementById('contact-form').submit();">Envoyer</a>
						</div>
						<div class="status"></div>
					</div>
					<!--Grid column-->
					<div class="col-md-3 text-center">

						<ul class="list-unstyled mb-0">
						<?php foreach ($adresses as $adresse) : ?>
							<li>
								<i class="fas fa-map-marker-alt fa-2x m-2"></i>
								<h5 class="m-0" style="color: #0c65ff;"><?php echo $adresse["nom_prenom"]?></h5>
								<h4 class="m-0" style="color: #0c65ff;"><?php echo $adresse["artisan"]?></h4>
								<p class="m-0" style="color: #0c65ff;"><?php echo $adresse["codepostal"] ." ". $adresse["ville"]?></p>
								<p class="m-0" style="color: #0c65ff;">siret : <?php echo $adresse["siret"]?></p>
							</li>
							<li>
								<i class="fas fa-phone mt-4 fa-2x m-2"></i>
								<h6 style="color: #0c65ff;"><?php echo $adresse["tel"]?></h6>
							</li>
							<li>
								<i class="fas fa-envelope mt-4 fa-2x m-2"></i>
								<p style="color: #0c65ff;"><?php echo $adresse["email"]?></p>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
					<!--Grid column-->
				</div>
			</section>
			<!--fin formualire contact-->

		</div>


		<!-- FOOTER -->
		
		<?php require_once __DIR__ . "/layout/footer.php"; ?>

		
		
	</main>
	
<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>




	<script>
		$(function () {
		$('[data-toggle="popover"]').popover()})
	</script>

</body>

</html>

