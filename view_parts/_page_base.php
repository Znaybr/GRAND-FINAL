<?php
if(!isset($_SESSION))
{
    session_start();







}
//var_dump($_SESSION["langage"]);


?>
<!DOCTYPE html>
<html lang="en">

    <!--************* HEAD *************-->
    <head>
        <meta charset="utf-8">
        <title><?= SITE_NAME . ' - ' . ucfirst($site_data[PAGE_ID]) ?></title>

        <!--LIEN CSS-->
        <link rel = "stylesheet"  type="text/css"  href = "../css/style.css" />

        <!--FAVICON-->
        <link rel="icon" type="image/png" sizes="32x32" href="../images/imagesweb/favico.png">

        <!--REFERENCEMENT-->
        <meta name="description"
              content="Artiste joallier et création originales en or et argent, Bijoux d'Élise" />
        <meta name="keywords"
              content="joallerie, bijoux, création bijoux, or, argent, diamants, pierres précieuses,
              bagues de mariage, bague de fiancailles, colliers, bracelets, boucles d'oreilles"/>

        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="index.php"/>

        <!--RESPONSIVE-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--/****VERSIONS ANTERIEURES IE9****/-->
        <!--<link rel="stylesheet" href="css/fixe.css"/>-->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

</head>


<body>
<div id="wrapper"> <!--ouverture wrapper-->
    <?php require_once '_header.php'; ?>
