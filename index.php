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
       // $query = "SELECT * FROM produits  WHERE  categorie = 2";

        $results = $pdo->prepare($query);
        $results->execute();

        while ($row = $results->fetch(PDO::FETCH_ASSOC))
        {
            $row["id"];

            echo


                "<div id= 'image_index' >" .

                "<figure><img src='images/" .$row['illustration']."'></figure>".

                "</div>".

                "<div id='details'>".

                "<p>Dernière réalisation</p>".

                "<h3>".$row['nom'] ."</h3>".

                "<figcaption>".$row['description'] ."</figcaption>".

                "</div>";
        }

        ?>
    </section>
    <img src="images/imagesweb/separation.png" alt="ligne de séparation" class="separ"/>
    <section id="categorie">

        <div id="cat1">
            <a href="?categorie=1">
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
                    background-size: cover;
                    background-position:center;".
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
                    background-size: cover;
                    background-position:center;".
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
                    background-size: cover;
                    background-position:center;".
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
                    background-size: cover;
                    background-position:center;".
                    "}"
                    ."</style>";

            }
            ?>
            <h3>Bracelets</h3>
        </div>
                </a>
        </div>
    </section>
    <img src="images/imagesweb/separation.png" alt="ligne de séparation" class="separ"/>
</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>




