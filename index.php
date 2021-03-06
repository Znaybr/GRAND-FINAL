<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';


$indfr = array("Dernière réalisation", "description", "Bagues", "Pendentifs", "Boucles d'oreilles", "",);
$inden = array("Latest creation", "description_en", "Rings", "Necklaces", "Earrings", "", "", "",);

if ($_SESSION["langage"] == 'en') {
    $indfr = $inden;
}
?>

<div id="main">

    <!--IMAGE A LA UNE-->
    <section id="img_princ">
        <?php
        $query = "SELECT * FROM produits ORDER BY id DESC ";
       // $query = "SELECT * FROM produits  WHERE  categorie = 2";

        $results = $pdo->prepare($query);
        $results->execute();
        $donne = $results->fetch();
            echo
                "<figure>".
                    "<img style='width: 700px;' src='images/" .$donne['image']."'>".
                    "<div id='details'>".
                        "<p>".$indfr['0']."</p>".

                        "<h3>".$donne['nom'] ."</h3>".

                        "<figcaption>".$donne[$indfr['1']]."</figcaption>".
                    "</div>".
                "</figure>";
        ?>

    </section>


    <!--SOUS CATEGORIES-->
    <section id="categorie">
        <img src="images/imagesweb/separation.png" alt="ligne de séparation" class="separ"/>


        <!--CATEGORIE 1-->
        <div id="cat1">
            <a href="produits.php?categorie=1">
                <div id="cercle1" class="cercle">
                    <?php
                    $nbIteration = 0;

                    $query = "SELECT * FROM produits  WHERE  categorie =1";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    $results2 = $pdo->prepare($query);
                    $results2->execute();

                    while($savoirCombien = $results2->fetch())
                        $nbIteration++;

                    $randomPick = rand (1, $nbIteration);

                    for($i = 0 ; $i <= $randomPick -1; $i++)
                    {
                        $row = $results->fetch(PDO::FETCH_ASSOC);
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle1{
                            background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }
                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3><?php echo $indfr['2']?></h3>
                    </div>
                </div>
            </a>
        </div>

        <!--CATEGORIE 2-->
        <div id="cat2">
            <a href="produits.php?categorie=2">
                <div id="cercle2" class="cercle">
                    <?php

                    $nbIteration = 0;

                    $query = "SELECT * FROM produits  WHERE  categorie =2";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    $results2 = $pdo->prepare($query);
                    $results2->execute();

                    while($savoirCombien = $results2->fetch())
                        $nbIteration++;

                    $randomPick = rand (1, $nbIteration);

                    for($i = 0 ; $i <= $randomPick -1; $i++)
                    {
                        $row = $results->fetch(PDO::FETCH_ASSOC);
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle2{
                            background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }


                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3><?php echo $indfr['3']?></h3>
                    </div>
                </div>
            </a>
        </div>

        <!--CATEGORIE 3-->
        <div id="cat3">
            <a href="produits.php?categorie=3">
                <div id="cercle3" class="cercle">
                    <?php
                    $nbIteration = 0;
                    $query = "SELECT * FROM produits  WHERE  categorie =3";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    $results2 = $pdo->prepare($query);
                    $results2->execute();

                    while($savoirCombien = $results2->fetch())
                        $nbIteration++;

                    $randomPick = rand (1, $nbIteration);

                    for($i = 0 ; $i <= $randomPick -1; $i++)
                    {
                        $row = $results->fetch(PDO::FETCH_ASSOC);
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle3{
                            background-image:url("
                            ." '" ."images". "/".$row['image']." ');
                            background-size: cover;".
                            "}"
                            ."</style>";
                    }
                    ?>

                    <!--HOVER APPARITION AU SURVOL-->
                    <div class="hover">
                        <h3><?php echo $indfr['4']?></h3>
                    </div>
                </div>
            </a>
        </div>

        <!--CATEGORIE 4-->
        <div id="cat4">
            <a href="produits.php?categorie=4">
                <div id="cercle4" class="cercle">
                    <?php

                    $nbIteration = 0;

                    $query = "SELECT * FROM produits  WHERE  categorie =4";

                    $results = $pdo->prepare($query);
                    $results->execute();
                    $results2 = $pdo->prepare($query);
                    $results2->execute();

                    while($savoirCombien = $results2->fetch())
                        $nbIteration++;

                    $randomPick = rand (1, $nbIteration);

                    for($i = 0 ; $i <= $randomPick -1; $i++)
                    {
                        $row = $results->fetch(PDO::FETCH_ASSOC);
                        $row["id"];
                        echo
                            "<style>"
                            . "#cercle4{
                            background-image:url("
                            ." '" ."images". "/".$row['image']." ');
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

        <img src="images/imagesweb/separation.png" alt="ligne de séparation" class="separ"/>
    </section>
</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>




