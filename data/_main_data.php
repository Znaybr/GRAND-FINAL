<?php
$site_data = array();//les variables du site

$site_data[USER_ISLOGGED] = false;//L'utilisateur n'est pas connecté par défaut

$site_data[PAGE_IS_PUBLIC] = true; // définie toutes les page de facon initiales comme public

$site_data[MAIN_MENU] = array(
    'Accueil' => 'index.php',
    'Créations'=> 'produits.php',
    'Contact' => 'contact.php',
    'À propos' => 'apropos.php',
    'Reparations' => 'reparation.php',
);