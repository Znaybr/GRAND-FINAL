

<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';
?>

<div id="main">
    <section id="img_princ">
        <?php
        $query = "SELECT * FROM produits  WHERE  id = 6";
//        $query = "SELECT * FROM produits  WHERE  category = 1";

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
    <section id="categorie">
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

        </div>

        <div id="cercle2" class="cercle">
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

        </div>
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
        </div>
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
        </div>
    </section>
</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>




