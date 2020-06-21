<?php
require_once __DIR__ . "/../config/parameters.php";

// Création de la connexion à la base de données
try {
    $bdd = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4', lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $exception) {
    echo "Erreur de connexion à la base de données";
    exit;
}

/*function getAllTitreAccueil(){
    global $bdd;

    $query = 'SELECT * FROM titre_accueil';
    $req = $bdd->prepare($query);
    $req->execute();

    return $req->fetchAll();
}*/

/** Récupère les lignes d'une table donnée en paramètre
 * @param string $table Nom de la table
 * @return array
 */
function getCarousel(string $table){
    global $bdd;

    $query = "SELECT * FROM $table LIMIT 1";
    $stmt = $bdd->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
    
}


/** Récupère les lignes d'une table donnée en paramètre
 * @param string $table Nom de la table
 * @return array
 */
function getAllEntities(string $table){
    global $bdd;

    $query = "SELECT * FROM $table";
    $stmt = $bdd->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();  
}

/** Count * sur une table donnée en paramètre
 * @param string $table Nom de la table
 * @return int
 */
function delete(string $table, int $id){
    global $bdd;
    $errcode = NULL;
    $query = " DELETE FROM $table WHERE id = :id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);

    try{
        $stmt->execute();
    } catch (PDOException $ex) {
        $errcode = $ex->getCode();
    }
    return $errcode; 
}


// Insert dans la table titre_accueil
function insertTitreAccueil(string $label){
    global $bdd;

    $query = "INSERT INTO titre_accueil (label) VALUES (:label) LIMIT 1";

    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":label", $label);
    $stmt->execute();
    return $bdd->lastInsertId();
}

