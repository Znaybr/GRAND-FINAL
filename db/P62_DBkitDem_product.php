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
define('PRODUCT_TB_COL_NAME', 'name');
define('PRODUCT_TB_COL_CATEGORY_ID', 'category_id');
define('PRODUCT_TB_COL_DESCRIPTION', 'description');
define('PRODUCT_TB_COL_PRICE', 'price');
define('PRODUCT_TB_COL_IS_ONLINE', 'is_online');
$product_tb_cols = array(
    PRODUCT_TB_COL_ID,
    PRODUCT_TB_COL_NAME,
    PRODUCT_TB_COL_CATEGORY_ID,
    PRODUCT_TB_COL_DESCRIPTION,
    PRODUCT_TB_COL_PRICE,
    PRODUCT_TB_COL_IS_ONLINE,
);

/**
 *  Insertion (ajout) d'un nouveau produit
 */
function product_add($name, $category_id, $description, $price) {
    global $pdo, $product_tb_cols;
    $resultat = false; // Mode défensif
    $queryStr = 'INSERT INTO ' . P62_DBKITDEM_TB_PRODUCT . '(' . get_tb_cols($product_tb_cols) . ') VALUES (' . get_tb_cols($product_tb_cols, COLON_CAR) . ')';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        COLON_CAR . PRODUCT_TB_COL_NAME => $name,
        COLON_CAR . PRODUCT_TB_COL_CATEGORY_ID => $category_id,
        COLON_CAR . PRODUCT_TB_COL_DESCRIPTION => $description,
        COLON_CAR . PRODUCT_TB_COL_PRICE => $price,
        COLON_CAR . PRODUCT_TB_COL_IS_ONLINE => true,
    );
    $res = $sth->execute($params);
    //$sth->debugDumpParams();
    //var_dump($params);
    //var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        throw new Exception("Echec lors de la tentative d'ajout du produit $name : (" . $sth->errorInfo()[0] . ")<br/>");
    }
    $inserted_user_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_user_id;
    };
    return $resultat;
}


/**
 * Lister (parcourir) les catégories de produits
 * @return array
 */
function product_category_list() {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT * FROM ' . P62_DBKITDEM_TB_PRODUCT_CATEGORY;
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array();
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister les catégories de produits : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res) {
        $resultat = $sth->fetchALL(PDO::FETCH_KEY_PAIR); // Permet d'avoir la colonne 0 (id) en clef, la colonne 1 (name) en valeur
    }
    return $resultat;
}


/**
 * Lister (parcourir) ou rechercher les produits
 * NB : Pas de limite mise en place ici (à améliorer si le nb de produits devient important
 * @param bool|int $category_id: Catégorie du produit, false pour toutes les catégories
 * @param bool|string $name: Nom du produit ou partie de ce nom (operateur %like%)
 * @return bool|mixed
 */
function product_list($category_id = false, $name = false) {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT * FROM ' . P62_DBKITDEM_TB_PRODUCT;
    if (false !== $category_id) {
        $queryStr .= ' WHERE ' . get_tb_col_pair(PRODUCT_TB_COL_CATEGORY_ID);
    }
    if (false !== $name) {
        $queryStr .= (strpos($queryStr, 'WHERE') > 0) ? ' AND ' : ' WHERE '; // Suivant qu'une clause WHERE est déjà présente
        $queryStr .= get_tb_col_pair(PRODUCT_TB_COL_NAME, 'LIKE');
    }
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array();
        if (false !== $category_id) {
            $params[COLON_CAR . PRODUCT_TB_COL_CATEGORY_ID] = $category_id;
        }
        if (false !== $name) {
            $params[COLON_CAR . PRODUCT_TB_COL_NAME] = '%' . $name . '%';
        }
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister produits pour catégorie $category_id : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res && ($sth->rowCount() > 0)) {
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}