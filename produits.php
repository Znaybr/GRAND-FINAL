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
                            ." '" ."images". "/".$row['illustration']." ');
                    background-size: cover;".
                            "}"
                            ."</style>";


                    }
                    ?>
                    <h3>Bagues</h3>
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
                    //initialiser tableau vide

                    while ($row = $results->fetch(PDO::FETCH_ASSOC))
                    {
                        //ajouter valleur dans un tableau .push?
                        //array.push($row['illustration'])
                        //random avec comme limite array.lenght == nbrRandom
                        //`fin while

                        //echo
//                "<style>"
//                . "#cercle2{
//                    background-image:url("
//                ." '" ."images". "/".$array`[random]." ');
//                    background-size: cover;".
//                "}"
////                ."</style>";


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
                    <h3>Pendentifs</h3>
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
                            ." '" ."images". "/".$row['illustration']." ');
                    background-size: cover;".
                            "}"
                            ."</style>";





                    }
                    ?>
                    <h3>Boucles d'oreilles</h3>
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
                            ." '" ."images". "/".$row['illustration']." ');
                    background-size: cover;".
                            "}"
                            ."</style>";





                    }
                    ?>
                    <h3>Bracelets</h3>
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
                "<div id= 'once' >" .

                "<style>"
                . "#once{
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
