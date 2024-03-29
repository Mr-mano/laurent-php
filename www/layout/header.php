<?php
session_start();
require_once __DIR__ . "/../model/database.php";
$adresses = getAllEntities("adresse");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan peintre</title>
    <link rel="stylesheet" href="css/styles.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>

<body>
    <!-- HEADER -->
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pl-5" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-5" href="index.php">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-5" href="realisation.php">Réalisations</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link mx-5" href="index.php#contact">Contact</a>
                </li>
                <?php if(!isset($_SESSION['connect'])){ ?>
                    <?php } else { ?>
                        <li class="nav-item mx-auto">
                    <a class="nav-link mx-5" style="color:#fbb300;" href="admin/admin.php">Admin</a>
                </li>
                <?php  }?>
            </ul>
        </div>
        <div class="phone__container d-flex">
        <?php foreach ($adresses as $adresse) : ?>
            <span class="phone__icone-phone" data-container="body" data-toggle="popover" data-placement="bottom" title="<?= $adresse["nom_prenom"];?>" data-content="<?= $adresse["tel"]?>"><i class="fa fa-phone" aria-hidden="true" ></i></span>
            <?php endforeach; ?>
        </div>
            
    </nav>

</header>

