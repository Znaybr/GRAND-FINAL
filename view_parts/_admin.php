<?php

// Réception des données du formulaire de login/logout
$username = null;
$password = null;
if(array_key_exists('dologin', $_POST)
&& array_key_exists('username', $_POST)
&& array_key_exists('password', $_POST)){
require_once ("../db/_user.php");
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
if(user_authenticate($username, $password)){
do_login($username);
}else{} //TODO BLALA

}elseif(array_key_exists('dologout', $_POST)){
do_logout(); // On le deconnect
header('location' . ADMIN_PAGE);
}

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


  <?php if(!check_login()) { ?>
    <!--Si l'utilisateur n'est pas connecté-->
    <form name="admin" id="admin" method="post">
      <input type="text" id="username" name="username">
      <input type="text" id="password" name="password">
      <input type="submit" id="dologin" name="dologin" value="Go">
    </form>
  <?php } else { ?>
    <!--Si l'utilisateur est connecté-->
    <form id="logout" name="logout" method="post">
      <input type="submit" name="dologout" id="dologout" value="Quitter"/>
    </form>
  <?php } ?>
</div>


</body>


</html>