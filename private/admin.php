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
            <form name="ajout" id="ajout" method="post">
                <ul>
                    <li>
                        <input type="file" accept=".jpg, .png">
                    </li>
                    <li>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                        <label for="categorie">Catégorie</label>
                        <input type="text" id="categorie" name="categorie">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description">
                    </li>
                    <li>
                        <input type="submit" id="addnew" name="addnew">
                    </li>
                </ul>
            </form>
        </section>

        <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">

        <!--LISTE DES CONTACTS-->
        <section>
            <h2>Liste de contacts</h2>
        </section>
</div>

<!--SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/main.js"></script>

<!--FONCTION LOGIN/LOGOUT ADMIN-->
    <?php
    if (isset($_POST["password"])){
        if ($_POST["password"] = "egypte2015"){
            echo "<script>
                $(infos_admin).show();
            </script>";
        }
    }
    ?>

</body>
</html>
