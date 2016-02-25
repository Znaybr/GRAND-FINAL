<?php
require_once('P62_DBkitDem_defines.php');

// Creation de l'objet PDO pour la connexion
// Il va nous servir tout au long du code pour l'utilisation de la DB
try {
    $pdo = new PDO(
        'mysql:host=' . P62_DBKITDEM_CONN_HOST . ';dbname=' . P62_DBKITDEM_DBNAME,
        P62_DBKITDEM_CONN_USER,
        P62_DBKITDEM_CONN_PWD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
    );
} catch (PDOException $e) {
    echo 'Echec lors de la connexion à MySQL : (' . $e->getMessage() . ')<br/>';
    die();
}

/*if (!$mysqli->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
}*/

?>


