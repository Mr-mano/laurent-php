<?php
session_start();
require_once __DIR__ . "/../model/database.php";
$titre_accueil = getAllEntities("titre_accueil");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laurent Quéré</title>
    <link rel="stylesheet" href="css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>

<body>
    <!-- HEADER -->
    <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item  px-5">
                    <a class="nav-link" href="index.php">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-5">
                    <a class="nav-link" href="realisation.php">Réalisations</a>
                </li>
                <li class="nav-item px-5">
                    <a class="nav-link" href="index.php#contact">Contact</a>
                </li>
                <?php if(!isset($_SESSION['connect'])){ ?>
                    <?php } else { ?>
                        <li class="nav-item px-5">
                    <a class="nav-link" href="admin/admin.php">Admin</a>
                </li>
                <?php  }?>
            </ul>
        </div>
        <div class="phone__container d-flex">
        <?php foreach ($titre_accueil as $titre_accueils) : ?>
            <span class="phone__icone-phone" data-container="body" data-toggle="popover" data-placement="bottom" title="<?php echo $titre_accueils["nom_prenom"];?>" data-content=" 06.09.02.72.91"><i class="fa fa-phone" aria-hidden="true" ></i></span>
            <?php endforeach; ?>
        </div>
            
    </nav>

</header>

