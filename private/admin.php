<?php
require_once '../db/P62_DBkitDem_conn.php';
require_once '../_defines.php';
require_once '../data/_main_data.php';

define('UPLOAD_TARGET_DIR' ,"../images/"); // Répertoire des uploads d'images

//var_dump($_FILES);
//var_dump($_POST);

$in_post=array_key_exists("addnew", $_POST); // Savoir si le formulaire est en soumission/reception
//$in_post = ('POST' == $_SERVER['REQUEST_METHOD']); // Definie la reception en POST

//var_dump($_POST);

$nom_ok = false;
$nom = null;
$warning_nom = ""; //message de feedback en cas de champ erronné
if (array_key_exists("nom", $_POST)) {
    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING );
    $nom_ok = (1 === preg_match("/^[A-Za-z0-9]{4,}$/", $nom));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$nom_ok){ // si prenom est non valide
        $warning_nom=" *";
    }
}

$categorie_ok = false;
$categorie = null;
$warning_categorie = ""; //message de feedback en cas de champ erronné
if (array_key_exists("categorie", $_POST)) {
    $categorie = filter_input(INPUT_POST, "categorie", FILTER_SANITIZE_STRING );
    $categorie_ok = (1 === preg_match("/^[1-4]$/", $categorie));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$categorie_ok){ // si categorie est non valide
        $warning_categorie=" *";
    }
}

$description_ok = false;
$description = null;
$warning_description = ""; //message de feedback en cas de champ erronné
if (array_key_exists("description", $_POST)) {
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING );
    $description_ok = (1 === preg_match("/^[A-Za-z0-9 ]{4,}$/", $description));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$description_ok){ // si prenom est non valide
        $warning_description=" *";
    }
}

$materiaux_ok = false;
$materiaux = null;
$warning_materiaux = ""; //message de feedback en cas de champ erronné
if (array_key_exists("materiaux", $_POST)) {
    $materiaux = filter_input(INPUT_POST, "materiaux", FILTER_SANITIZE_STRING );
    $materiaux_ok = (1 === preg_match("/^[A-Za-z0-9]{4,}$/", $materiaux));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$materiaux_ok){ // si prenom est non valide
        $warning_materiaux=" *";
    }
}

/***********************************Gérer le file upload***********************************/
$upload_valid = false;
$illustration = null;
if (array_key_exists('image_files', $_FILES)) {
    $illustration = basename($_FILES["image_files"]["name"]); // Nom du fichier d'upload
    var_dump($illustration);
    $target_file = UPLOAD_TARGET_DIR . basename($_FILES["image_files"]["name"]);

    $upload_valid = true; // Indique si le processus de upload est correcte
    $upload_error_msg = ''; // Message d'erreur le cas échéant

    // Vérification des fichiers uploadés : Sont-ce des images valides ?
    if (isset($_POST["addnew"])) {
        $check = getimagesize($_FILES["image_files"]["tmp_name"]);
        $upload_valid = ($check !== false);
        if (!$upload_valid) {
            $upload_error_msg = 'Le fichier téléversé n\'est une images valide.';
        }
        //echo 'Le fichier téléversé est une images valide (' . $check["mime"] . ').';
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $upload_error_msg .= '<br>Le fichier existe déjà.';
        $upload_valid = false;
    }


    // Check file size
    if ($_FILES["image_files"]["size"] > 500000) {
        $upload_error_msg .= '<br>Le fichier trop gros : (La taille maximale est 500000 octets).';
        $upload_valid = false;
    }

    // Allow certain file formats
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $upload_error_msg .= '<br>Le format de fichier est invalide : (JPG, JPEG, PNG & GIF uniquement).';
        $upload_valid = false;
    }

    // Transfert du fichier
    if (!move_uploaded_file($_FILES["image_files"]["tmp_name"], $target_file)) {
        $upload_valid = false;
    }

}
var_dump($nom_ok ,  $categorie_ok , $description_ok , $upload_valid , $materiaux_ok);

if ($nom_ok && $categorie_ok && $description_ok && $upload_valid && $materiaux_ok){
    //on enregistre les données sur la BD et redirection sur page index
    require_once "../db/P62_DBkitDem_product.php";
    $produit_info = product_add($nom, $description, $illustration, $categorie, $materiaux);
    header("Location: admin.php");
    exit;
}

?>




<!--***********************************************************************************************-->
<!--*******************************************PAGE HTML*******************************************-->
<!--***********************************************************************************************-->

<!DOCTYPE html>
<html lang="fr">

<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <title>Ma partie administration - CONNECTÉE</title>

    <link rel="stylesheet" href="../css/admincss.css">
    <link href='https://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/imagesweb/favico.png">
</head>


<!--BODY-->
<body>

<!--    ADMIN LOGIN-->
    <div id="admin">
        <img src="../images/imagesweb/logo.png" alt="logo Bijoux d'Élise" title="Entrée sur la partie admin">
        <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">
        <p>Bonjour Élise</p>

        <form name="adminco" id="adminco" method="post" action="">
            <input type="password" id="password" name="password">
            <input type="submit" id="dologin" name="dologin" value="Go">
        </form>
    </div>


<!--    ADMIN GESTION-->
    <div id="infos_admin">

<!--        <img src="../images/imagesweb/logo.png" alt="logo Bijoux d'Élise" title="Entrée sur la partie admin">-->
        <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">

        <!--PARTIE - CREATION/AJOUT PRODUIT-->
        <section>
            <h2>Ajout d'une création</h2>
            <form id="ajout" method="post" enctype="multipart/form-data">
                <ul>
                    <li>
                        <input type="file" name="image_files" id="image_files" accept="image/*" />
                    </li>
                    <li>
                        <ul>1 = bague</ul>
                        <ul>2 = collier</ul>
                        <ul>3 = boucle</ul>
                        <ul>4 = bracelet</ul>
                    </li>

                    <li>

                    <!--NOM-->
                        <label for="nom">Nom <span><?php echo $warning_nom ?></span></label>
                        <input type="text" id="nom" name="nom"
                               class="<?php echo $in_post && ! $nom_ok ? 'erreur' : ''; ?>"
                               value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom']: ''?>"/>


<!--                <!--CATEGORIE-->
<!--                    <label for="categorie">Catégorie <span>--><?php //echo $warning_categorie ?><!--</span></label>-->
<!--                    <input type="text" id="categorie" name="categorie"-->
<!--                            class="--><?php //echo $in_post && ! $categorie_ok ? 'erreur' : ''; ?><!--"-->
<!--                            value="--><?php //echo array_key_exists('categorie', $_POST) ? $_POST['categorie']: ''?><!--"/>-->



                    <!--CATEGORIE-->
                        <label for="categorie">Catégorie <span><?php echo $warning_categorie ?></span></label>
                        <input list="" type="text" id="categorie" name="categorie"
                               class="<?php echo $in_post && ! $categorie_ok ? 'erreur' : ''; ?>"
                               value="<?php echo array_key_exists('categorie', $_POST) ? $_POST['categorie']: ''?>"/>

                    <!--DESCRIPTION-->
                        <label for="description">Description <span><?php echo $warning_description ?></label>
                        <input type="text" id="description" name="description"
                               class="<?php echo $in_post && ! $description_ok ? 'erreur' : ''; ?>"
                               value="<?php echo array_key_exists('description', $_POST) ? $_POST['description']: ''?>"/>

                    <!--MATERIAUX-->
                        <label for="materiaux">Matériaux <span><?php echo $warning_materiaux ?></label>
                        <input type="text" id="materiaux" name="materiaux"
                               class="<?php echo $in_post && ! $materiaux_ok ? 'erreur' : ''; ?>"
                               value="<?php echo array_key_exists('materiaux', $_POST) ? $_POST['materiaux']: ''?>"/>

                        <input type="submit" id="addnew" name="addnew">

                    </li>
                </ul>
                <?php if($in_post){ echo "<p>N'oublies pas de remplir les champs avec un *.</p>"; } ?>
            </form>
        </section>

        <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">


        <!--PARTIE - LISTE DES CONTACTS-->
        <section>
            <h2>Liste de contacts</h2>
            <table>
                <!--HEADER DU TABLEAU DE CONTACTS-->
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Téléphone</th>
                    <th>Ville</th>
                    <th>Sexe</th>
                    <th>Préférence</th>
                    <th>Message</th>
                </tr>

                <!--INTEGRATION DES INFOS DANS LE TABLEAU ADMIN CONTACTS-->
                <?php
                $query = "SELECT * FROM messages ORDER BY id DESC";

                $results = $pdo->prepare($query);
                $results->execute();

                while ($row = $results->fetch(PDO::FETCH_ASSOC)){
                    echo

                    "<tr>".
                        "<td>".$row["prenom"]."</td>".
                        "<td>".$row["nom"]."</td>".
                        "<td>".$row["courriel"]."</td>".
                        "<td>".$row["telephone"]."</td>".
                        "<td>".$row["ville"]."</td>".
                        "<td>".$row["sexe"]."</td>".
                        "<td>".$row["preference"]."</td>".
                        "<td>".$row["message"]."</td>".
                    "</tr>";
                }

                ?>

            </table>

        </section>
</div>

<!--SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/main.js"></script>

<!--FONCTION LOGIN/LOGOUT ADMIN-->
<!--    --><?php
//    if (isset($_POST["password"])){
//        if ($_POST["password"] = "egypte2015"){
//            echo "<script>
//                $(infos_admin).show();
//            </script>";
//        }
//    }
//    ?>

</body>
</html>
