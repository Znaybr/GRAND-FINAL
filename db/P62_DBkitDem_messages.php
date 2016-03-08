<?php
/**
 *  Opérations sur les produits
 * 	- ajout de produit
 * 	- lister les catégories de produits
 * 	- lister les produits, tous ou par catégorie
 */

require_once('P62_DBkitDem_conn.php');
require_once('P62_DBkitDem_common.php');

/**
 * Liste des colonnes de la table product
 */
define('MESSAGE_TB_COL_ID', 'id');
define('MESSAGE_TB_COL_PRENOM', 'prenom');
define('MESSAGE_TB_COL_NOM', 'nom');
define('MESSAGE_TB_COL_COURRIEL', 'courriel');
define('MESSAGE_TB_COL_TELEPHONE', 'telephone');
define('MESSAGE_TB_COL_VILLE', 'ville');
define('MESSAGE_TB_COL_SEXE', 'sexe');
define('MESSAGE_TB_COL_PREFERENCE', 'preference');
define('MESSAGE_TB_COL_MESSAGE', 'message');
$product_tb_cols = array(
    MESSAGE_TB_COL_ID,
    MESSAGE_TB_COL_PRENOM,
    MESSAGE_TB_COL_NOM,
    MESSAGE_TB_COL_COURRIEL,
    MESSAGE_TB_COL_TELEPHONE,
    MESSAGE_TB_COL_VILLE,
    MESSAGE_TB_COL_SEXE,
    MESSAGE_TB_COL_PREFERENCE,
    MESSAGE_TB_COL_MESSAGE,
);

/**
 *  Insertion (ajout) d'un nouveau produit
 */
function message_add($prenom, $nom, $courriel, $telephone, $ville, $sexe, $preference, $message) {
    global $pdo, $product_tb_cols;
    $resultat = false; // Mode défensif

    $queryStr = 'INSERT INTO ' . P62_DBKITDEM_TB_MESSAGES. '(' . get_tb_cols($product_tb_cols) . ') VALUES (' . get_tb_cols($product_tb_cols, COLON_CAR) . ')';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        COLON_CAR . MESSAGE_TB_COL_PRENOM => $prenom,
        COLON_CAR . MESSAGE_TB_COL_NOM => $nom,
        COLON_CAR . MESSAGE_TB_COL_COURRIEL => $courriel,
        COLON_CAR . MESSAGE_TB_COL_TELEPHONE => $telephone,
        COLON_CAR . MESSAGE_TB_COL_VILLE => $ville,
        COLON_CAR . MESSAGE_TB_COL_SEXE => $sexe,
        COLON_CAR . MESSAGE_TB_COL_PREFERENCE => $preference,
        COLON_CAR . MESSAGE_TB_COL_MESSAGE => $message,
    );
    $res = $sth->execute($params);
//    $sth->debugDumpParams();
//    var_dump($params);
//    var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0) ) {
        $errorInfo = $sth->errorInfo();
        $errorInfo = $errorInfo[0];
        throw new Exception("Echec lors de la tentative d'ajout du message $nom : (" . $errorInfo . ")<br/>");
    }
    $inserted_user_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_user_id;
    };
    return $resultat;
}