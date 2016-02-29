

<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';
?>

<div id="main">
    <section>
        <?php
        $query = "SELECT * FROM produits  WHERE  id = 6";
        $results = $pdo->prepare($query);
        $results->execute();

        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {
            $row["id"];

            echo

                "<div id= 'image_index' >" .

                "<p>".$row['description'] ."</p>".

                "<p><img src='images/" .$row['illustration']."'></p>".

                "</div>";
        }

        ?>
    </section>
</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>




