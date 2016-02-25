<?php
/**
 * Prépare la base de donnée de DB_kitDem
 * Ce script m'est pas encore écrit
 * La préparation de la base de donnée est faite via le PHPMyAdmin et le fichier P62_DBkitDem_schema.sql
 * Remarques:
 * Le mot de passe encrypté devrait être d'une taille minimale de 60 caractères, idéalement de 255 caractère
 * pour supporter des encryptages complexes modernes
 */
require_once('P62_DBkitDem_conn.php');

// Création d'un table d'essai
if (!$mysqli->query("DROP TABLE IF EXISTS essai") ||
    !$mysqli->query("CREATE TABLE essai(id INT)") ||
    !$mysqli->query("INSERT INTO essai(id) VALUES (1)")) {
    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
}
