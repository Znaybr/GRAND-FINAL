<?php
    // initialisation ici
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Ma partie administration</title>

    <link rel="stylesheet" href="../css/admincss.css">
    <link href='https://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" sizes="32x32" href="../images/imagesweb/favico.png">
  </head>

  <body>

    <div id="admin">
      <img src="../images/imagesweb/logo.png" alt="logo Bijoux d'Élise" title="Entrée sur la partie admin">
      <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">
      <p>Bonjour Élise</p>
      <form name="admin" id="admin">
        <input type="text" id="password" name="password">
        <input type="submit" id="goadmin" name="goadmin" value="Go">
      </form>
    </div>

    <div id="infos-admin">

      <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">

      <section>
        <h2>Ajout d'une création</h2>
        <form method="post">
          <input type="file" accept=".jpg, .png">

          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom">
          <label for="categorie">Catégorie</label>
          <input type="text" id="categorie" name="categorie">
          <label for="description">Description</label>
          <input type="text" id="description" name="description">

          <input type="submit" id="addnew" name="addnew">
        </form>
      </section>

      <img src="../images/imagesweb/separation.png" alt="tiret de séparation" title="sparation des catégories">

      <section>
        <h2>Liste de contacts</h2>



      </section>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/main.js"></script>
  </body>


</html>