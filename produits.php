<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';
?>
<h1>Les plus belles créations d'Élise</h1>
<div id="product">

    <div id="productclas">
        <!--CATEGORIE 1-->
        <div id="cat1">
            <a href="?category_id=1">
                <div id="cercle1" class="cercle">
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
                            ." '" ."images". "/".$row['illustration']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }
                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3>Bagues</h3>
                    </div>
                </div>
            </a>
        </div>

        <!--CATEGORIE 2-->
        <div id="cat2">
            <a href="?category_id=2">
                <div id="cercle2" class="cercle">
                    <?php
                    $query = "SELECT * FROM produits  WHERE  categorie =2";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    //initialiser tableau vide

                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        $row["id"];

                        echo
                            "<style>"
                            . "#cercle2{
                            background-image:url("
                            ." '" ."images". "/".$row['illustration']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }

                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3>Pendentifs</h3>
                    </div>
                </div>
            </a>
        </div>


        <!--CATEGORIE 3-->
        <div id="cat3">
            <a href="?category_id=3">
                <div id="cercle3" class="cercle">
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
                            ." '" ."images". "/".$row['illustration']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }
                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3>Boucles d'oreilles</h3>
                    </div>
                </div>
            </a>
        </div>

        <!--CATEGORIE 4-->
        <div id="cat4">
            <a href="?category_id=4">
                <div id="cercle4" class="cercle">
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
                            ." '" ."images". "/".$row['illustration']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";

                    }
                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3>Bracelets</h3>
                    </div>
                </div>
            </a>
        </div>


    </div>
    <img src="images/imagesweb/separation.png" alt="ligne de séparation" class="separ"/>
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
                "<div id='char_set'>" .

                "<style>"
                . ".once{
                    background-image:url("
                ." '" ."images". "/".$row['illustration']." ');
                    background-position:center;
                    background-size:cover;
                    background-repeat:no-repeat;
                    ".
                "}"
                ."</style>".


                "<h3>".$row["nom"]."</h3>".



                "<figcaption>".$row["description"]."</figcaption>".
                "<p>".$row["materiaux"]."</p>".

                "</div>";
        }
        ?>

    </div>
</div>


<?php
require_once 'view_parts/_page_buttom.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/main.js"></script>
