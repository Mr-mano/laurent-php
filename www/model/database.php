<?php
require_once __DIR__ . "/../config/parameters.php";

// Création de la connexion à la base de données
try {
    $bdd = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASS, [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4', lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}


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
    } catch (PDOException $exception) {
        $errcode = $exception->getCode();
    }
    return $errcode; 
}


    function updateEntity(string $table, int $id, array $values){
        global $bdd;
        $errcode = null;
        $query = "UPDATE $table SET ";
        foreach ($values as $key => $value) {
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ", ");
        $query .= " WHERE id = :id";
        $stmt = $bdd->prepare($query);
        foreach ($values as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            $errcode = $ex->getCode();
        }
        return $errcode;
    }

    function getAllTechniques(int $id = null)
{
    global $bdd;

    $query = " SELECT * FROM techniques";

    if (isset($id)) {
        $query .= " WHERE id = :id";
    }

    $stmt = $bdd->prepare($query);
    if (isset($id)) {
        $stmt->bindParam(":id", $id);
    }
    $stmt->execute();

    return (isset($id)) ? $stmt->fetch() : $stmt->fetchAll();
}


function editTitreAccueil(int $id, string $nom_prenom, string $job, string $ville) {
    /* @var $connection PDO */
    global $bdd;
    
    $query = "UPDATE titre_accueil SET nom_prenom = :nom_prenom, job = :job, ville = :ville WHERE id = :id;";

    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nom_prenom", $nom_prenom);
    $stmt->bindParam(":job", $job);
    $stmt->bindParam(":ville", $ville);
    $stmt->execute();
}

function editTechnique(int $id, string $libelle, string $txt, string $alt, string $picture) {
    /* @var $connection PDO */
    global $bdd;
    
    $query = "UPDATE techniques SET libelle = :libelle, txt = :txt, alt = :alt,  picture = :picture WHERE id = :id;";

    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->bindParam(":txt", $txt);
    $stmt->bindParam(":alt", $alt);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}


function getTechnique(int $id) {
    /* @var $connection PDO */
    global $bdd;
    $query = "SELECT * FROM techniques WHERE techniques.id = :id;";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getArticle(int $id) {
    /* @var $connection PDO */
    global $bdd;
    $query = "SELECT * FROM articles WHERE articles.id = :id;";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getTitreAccueil(int $id) {
    /* @var $connection PDO */
    global $bdd;
    $query = "SELECT * FROM titre_accueil WHERE titre_accueil.id = :id;";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getAdresse(int $id) {
    /* @var $connection PDO */
    global $bdd;
    $query = "SELECT * FROM adresse WHERE adresse.id = :id;";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertEntity(string $table, array $record){
    global $bdd;
    $query = "INSERT INTO $table (";

    foreach ($record as $key => $item) {
        $query .= $key . ',';
    }
    $query = rtrim($query,",") . ")";
    $query .= " VALUES (";

    foreach($record as $key => $item) {
        $query .= ':' . $key . ',';
    }
    $query = rtrim($query,",") . ")";
    $stmt = $bdd->prepare($query);

    foreach($record as $key => $item) {
        $stmt->bindValue(":" . $key , $item);
    }
    $stmt->execute();
    return $bdd->lastInsertId();
}