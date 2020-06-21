<?php

require_once __DIR__ . "/../../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD
$id = $_POST["id"];
// Appel de la fonction pour supprimer
$errcode = delete("carousel", $id);
// Redirection de l'utilisateur
if ($errcode) {
    header("Location: admin_carousel.php?errcode=" . $errcode);
} else {
    header("Location: admin_carousel.php");
}

?>