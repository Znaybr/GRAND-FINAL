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
define('PRODUCT_TB_COL_ID', 'id');
define('PRODUCT_TB_COL_NOM', 'nom');
define('PRODUCT_TB_COL_DESCRIPTION', 'description');
define('PRODUCT_TB_COL_DESCRIPTION_EN', 'description_en');
define('PRODUCT_TB_COL_IMAGE', 'image');
define('PRODUCT_TB_COL_CATEGORIE', 'categorie');
define('PRODUCT_TB_COL_MATIERE', 'materiaux');
define('PRODUCT_TB_COL_MATIERE_EN', 'materiaux_en');
$product_tb_cols = array(
    PRODUCT_TB_COL_ID,
    PRODUCT_TB_COL_NOM,
    PRODUCT_TB_COL_DESCRIPTION,
    PRODUCT_TB_COL_DESCRIPTION_EN,
    PRODUCT_TB_COL_IMAGE,
    PRODUCT_TB_COL_CATEGORIE,
    PRODUCT_TB_COL_MATIERE,
    PRODUCT_TB_COL_MATIERE_EN,
);

/**
 *  Insertion (ajout) d'un nouveau produit
 */
function product_add($nom, $description, $description_en, $image, $categorie, $materiaux,  $materiaux_en) {
    global $pdo, $product_tb_cols;
    $resultat = false; // Mode défensif
    $queryStr = 'INSERT INTO ' . P62_DBKITDEM_TB_PRODUCT . '(' . get_tb_cols($product_tb_cols) . ') VALUES (' . get_tb_cols($product_tb_cols, COLON_CAR) . ')';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        COLON_CAR . PRODUCT_TB_COL_NOM => $nom,
        COLON_CAR . PRODUCT_TB_COL_DESCRIPTION => $description,
        COLON_CAR . PRODUCT_TB_COL_DESCRIPTION_EN => $description_en,
        COLON_CAR . PRODUCT_TB_COL_IMAGE => $image,
        COLON_CAR . PRODUCT_TB_COL_CATEGORIE => $categorie,
        COLON_CAR . PRODUCT_TB_COL_MATIERE => $materiaux,
        COLON_CAR . PRODUCT_TB_COL_MATIERE_EN => $materiaux_en,
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