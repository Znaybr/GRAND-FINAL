<?php

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
    $description_ok = (1 === preg_match("/^[A-Za-z0-9]{4,}$/", $description));  // 1 siginifie que la condition est vraie et vérifiée
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
$illustration_ok = true;
$illustration = '';


if ($nom_ok && $categorie_ok && $description_ok && $upload_valid && $materiaux_ok){
    //on enregistre les données sur la BD et redirection sur page index
    require_once "../db/P62_DBkitDem_product.php";
    $produit_info = product_add($nom, $description, $illustration, $categorie, $materiaux);
    header("Location: admin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ma partie administration - CONNECTÉE</title>

    <link rel="stylesheet" href="../css/admincss.css">
    <link href='https://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/imagesweb/favico.png">
</head>


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

        <!--CREATION/AJOUT PRODUIT-->
        <section>
            <h2>Ajout d'une création</h2>
            <form name="ajout" id="ajout" method="post" action="_upload.php">
                <ul>
                    <li>
                        <input type="file" name="image_files" id="image_files" accept="image/*"
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

                    <!--CATEGORIE-->
                        <label for="categorie">Catégorie <span><?php echo $warning_categorie ?></span></label>
                        <input type="text" id="categorie" name="categorie"
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

        <!--LISTE DES CONTACTS-->
        <section>
            <h2>Liste de contacts</h2>
            <table>
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
                <tr>
                    <td>Prénom</td>
                    <td>Nom</td>
                    <td>Courriel</td>
                    <td>Téléphone</td>
                    <td>Ville</td>
                    <td>Sexe</td>
                    <td>Préférence</td>
                    <td>Message</td>
                </tr>
                <tr>
                    <td>Prénom</td>
                    <td>Nom</td>
                    <td>Courriel</td>
                    <td>Téléphone</td>
                    <td>Ville</td>
                    <td>Sexe</td>
                    <td>Préférence</td>
                    <td>Message</td>
                </tr>
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
