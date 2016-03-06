<?php
$site_data = array();//les variables du site

$site_data[USER_ISLOGGED] = false;//L'utilisateur n'est pas connecté par défaut

$site_data[PAGE_IS_PUBLIC] = true; // définie toutes les page de facon initiales comme public
$menufr = array("Accueil", "Créations", "Contact", "A propos", "Reparations",);
$menuen = array("Home", "My creations", "Contact", "About", "Repairs",);

if ($_SESSION["langage"] == 'en') {
    $menufr = $menuen;
}


$site_data[MAIN_MENU] = array(
     $menufr['0'] => 'index.php',
    $menufr['1']=> 'produits.php',
    $menufr['2'] => 'contact.php',
    $menufr['3'] => 'apropos.php',
    $menufr['4'] => 'reparation.php',
);