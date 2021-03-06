
<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';

$prodfr = array("Les plus belles créations d'Élise", "materiaux", "description", "Bagues", "Pendentifs", "Boucles d'oreilles", "", );
$proden = array("The most beautiful creations of Elise", "materiaux_en", "description_en", "Rings", "Necklaces", "Earrings", "", "",);

if ($_SESSION["langage"] == 'en') {
    $prodfr = $proden;
}
?>
<h1><?php echo $prodfr['0']?></h1>
<div id="product">

    <div id="productclas">
        <div id="cat1">
            <a href="?categorie=1">
                <div id="cercle1" class="cercle2">
                    <?php
                    $query = "SELECT * FROM produits  WHERE  categorie =1";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle1{
                    background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                    background-size: cover;
                    background-position:center;".
                            "}"
                            ."</style>";
                    }
                    ?>
                    <div class="hover">
                    <h3><?php echo $prodfr['3']?></h3>
                    </div>
                </div>

            </a>
        </div>

        <div id="cat2">
            <a href="?categorie=2">
                <div id="cercle2" class="cercle2">
                    <?php
                    $query = "SELECT * FROM produits  WHERE  categorie =2";

                    $results = $pdo->prepare($query);
                    $results->execute();


                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle2{
                    background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                    background-size: cover;
                    background-position:center;".
                            "}"
                            ."</style>";
                    }

                    ?>
                    <div class="hover">
                        <h3><?php echo $prodfr['4']?></h3>
                    </div>
                </div>
            </a>
        </div>
        <div id="cat3">
            <a href="?categorie=3">
                <div id="cercle3" class="cercle2">
                    <?php
                    $query = "SELECT * FROM produits  WHERE  categorie =3";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        $row["id"];
                        echo

                            "<style>"
                            . "#cercle3{
                    background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                    background-size: cover;
                    background-position:center;".
                            "}"
                            ."</style>";
                    }
                    ?>
                    <div class="hover">
                        <h3><?php echo $prodfr['5']?></h3>
                    </div>
                </div>
            </a>
        </div>
        <div id="cat4">
            <a href="?categorie=4">
                <div id="cercle4" class="cercle2">
                    <?php
                    $query = "SELECT * FROM produits  WHERE  categorie =4";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle4{
                    background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                    background-size: cover;
                    background-position:center;".
                            "}"
                            ."</style>";

                    }
                    ?>
                    <div class="hover">
                        <h3>Bracelets</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="separation">
    <img src="images/imagesweb/separation.png" alt="ligne de séparation"/>
    </div>
        <div id="productdetail">
        <?php
        $query = "SELECT * FROM produits ";
        if(array_key_exists("categorie",$_GET)){
            $query .=" WHERE categorie=".$_GET["categorie"];
        }

        $results = $pdo->prepare($query);
        $results->execute();

        while ($row = $results->fetch(PDO::FETCH_ASSOC)){
            echo


            "<div class='photo' style='background-image:url(" ."images". "/".$row['image'].");
             background-position:center;
             background-size:cover;
             background-repeat:no-repeat;
            '>".


                "<h3>".$row["nom"]."</h3>".

                "<p>".$row[$prodfr['1']]."</p>".

                "<figcaption>".$row[$prodfr['2']]."</figcaption>".


                "</div>";
        }
        ?>

    </div>
</div>


<?php
require_once 'view_parts/_page_buttom.php';
?>
