<?php

require_once __DIR__ . "/../model/database.php";


// Récupérer l'identifiant de la ligne à supprimer en BDD
$id = $_POST["id"];
$realisation_id = isset($_POST["realisation_id"]);
// Appel de la fonction pour supprimer
$errcode = delete("pictures", $id);
// Redirection de l'utilisateur
if ($errcode) {
    header("Location: admin_realisation.php?errcode=" . $errcode);
} else {
    header("Location: admin_realisation.php" . $realisation_id);
    exit();
}

?>