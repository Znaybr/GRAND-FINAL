<?php
/**
 *  Script de test des opérations principales sur les produits de la base de données p62_dbkitdem
 * 	- authentification d'un utilisateur
 * 	- ajout d'un produit
 * 	- parcours (listage) des catégories de produits
 * 	- parcours (listage) des produits
 */

require_once('P62_DBkitDem_product.php');

var_dump(get_tb_cols($product_tb_cols));


/**
 * Gestion des produits
 *
 * UC1: Ajout d'un produit
 * UC2: Lister tous les produits
 * UC3: Lister toutes les catégories
 * UC4: Lister les produits d'une seule catégorie
 * UC5: Lister les produits dont le nom contient la sous-chaîne 'Montréal'
 */


/**
 * UC1: Ajout d'un produit (si il n'existe pas déjà)
 */
$evenements_insectarium = product_list(false, 'insectarium');
//var_dump($evenements_insectarium);
if (false === $evenements_insectarium) {
    $product_id = product_add('Portes ouvertes insectarium de Montréal', 3, 'L\'insectarium de Montréal est heureux d\'ouvrir sa <em>fabuleuse collection</em> de papillons ...', 0.0);
    //var_dump($product_id);
};

/**
 * UC2: Lister tous les produits
 */
$produits = product_list();
//var_dump($produits);

/**
 * UC3: Lister toutes les catégories
 */
$categories = product_category_list();
var_dump($categories);

/**
 * UC4: Lister tous les évènements de musique (category_id = 1)
 */
// On commence par rechercher la catégorie de la Musique (plus prudent si les id bougent)
$categorie_musique_id = array_search('Musique', $categories);
$evenements_musique = product_list($categorie_musique_id);
//var_dump($evenements_musique);

/**
 * UC5: Lister tous les évènements dont le nom contient la sous-chaîne 'Montréal'
 */
$evenements_montreal = product_list(false, 'Montréal');
var_dump($evenements_montreal);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        .nom {
            font-size: larger;
            font-weight: bolder;
        }
        .categorie {
            margin-left: 1em;;
            font-style: italic;
        }
        .description{
             color: darkblue;
        }
    </style>
</head>
<body>

<h2>Tous les évènements</h2>
<ul>
<?php
foreach ($produits as $produit) {
    echo '<li><span class="nom">', $produit['name'], '</span><span class="categorie">', $categories[$produit['category_id']], '</span><p class="description">', $produit['description'], '</p>', '</li>';
}
?>
</ul>
<h2>Musique</h2>
<ul>
<?php
foreach ($evenements_musique as $ev) {
    echo '<li><span class="nom">', $ev['name'], '</span></li>';
}
?>
</ul>
<h2>Événements à Montréal</h2>
<ul>
    <?php
    foreach ($evenements_montreal as $ev_mntl) {
        echo '<li><span class="nom">', $ev_mntl['name'], '</span></li>';
    }
    ?>
</ul>
</body>
</html>
