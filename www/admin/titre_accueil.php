<?php

require_once __DIR__ . "/../model/database.php";


if(isset($_POST['nom_prenom']) && isset($_POST['title_accueil']) && isset($_POST['ville'])){

    $nom_prenom = $_POST['nom_prenom'];
    $title_accueil = $_POST['title_accueil'];
    $ville = $_POST['ville'];

    $requete = $bdd->prepare('INSERT INTO titre_accueil(nom_prenom, titre_accueil, ville) VALUES(? , ?, ?)');
    $requete->execute([$nom_prenom, $title_accueil, $ville]);
    
} 

