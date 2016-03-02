<?php
require_once "_defines.php";
require_once "data/_main_data.php";
require_once 'db/_cover_data.php';
$site_data[PAGE_ID] = "Disques";
require_once 'common/_start.php';
require_once "view_parts/_page_base.php"; // référence au fichier de référence page_base = HEAD en HTML
require_once(dirname(__FILE__) . '/db/_conn.php');
require_once(dirname(__FILE__) . '/db/turntablelist_product.php');


?>

<div id="main">
    <h1>Notre collection</h1>
    <div id = "menu_produit">
<!--        MENU CATEGORIE -->
        <ul id = "produit_liste">
            <li>
                <a href ="?category_id=1">ROCK</a>
            </li>
            <li>
                <a href ="?category_id=2">RAP</a>
            </li>
            <li>
                <a href ="?category_id=3">JAZZ</a>
            </li>
        </ul>
    </div>

<!--    PRODUITS GLOBAL OU PAR CATEGORIES-->
    <div id = "list_items">
    <?php
        $query = "SELECT * FROM product ";
        if(array_key_exists("category_id",$_GET)){
        $query .=" WHERE category_id=".$_GET["category_id"];
        }

    $results = $pdo->prepare($query);
    $results->execute();

    while ($row = $results->fetch(PDO::FETCH_ASSOC)){
        echo
            "<div id= 'item' >" .

            "<p>Group Name: ".$row["group_name"]."</p>".
            "<p><a href='_pages_produits.php'><img src='image/" .$row['image']."'></a></p>".
            "<p>Price:&pound".$row["price"]."</p>".
            "<p>Album:".$row["album_title"]."</p>".

            "</div>";
    }
    ?>

    </div>

<?php
require_once "view_parts/_page_bottom.php"; // référence au fichier de référence page_base = HEAD en HTML
?>


