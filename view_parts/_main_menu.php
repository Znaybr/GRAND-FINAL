<?php
$menu = array(
    'Accueil' => 'index.php',
    'produits'=> 'produits.php',
    'Contact' => 'contact.php',
    'A propos' => 'apropos.php',
    'Reparations' => 'reparation.php',
);
foreach ($menu as $nom => $url) {
    echo "<li><a href=\"$url\">$nom</a></li>";
}
