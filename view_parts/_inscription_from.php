<?php
$in_post = array_key_exists('register', $_POST);
var_dump($_POST);
$firstname_ok = false;
$firstname_msg = '';
if (array_key_exists('firstname',$_POST)){
    $firstname = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_MAGIC_QUOTES);
    $firstname_ok = (1===preg_match('/^[A-Za-z]{2,}$/',$firstname));
    if ( ! $firstname_ok) {
        $firstname_msg = 'Le prénom ne doit contenir que des lettres (min 2).';
    }
    var_dump($firstname);
    var_dump($firstname_ok);
    var_dump($firstname_msg);
}
$lastname_ok = false;
$lastname_msg ='';
if (array_key_exists('lastname',$_POST)){
    $lastname = filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_MAGIC_QUOTES);
    $lastname = filter_var($lastname,FILTER_SANITIZE_STRING);
    $lastname_ok = (1===preg_match('/^[A-Za-z]{4,}$/',$lastname));
    if ( ! $lastname_ok) {
        $lastname_msg = 'Le nom ne doit contenir que des lettres (min 4).';
    }
    var_dump($lastname);
    var_dump($lastname_ok);
}
$gender_ok = array_key_exists('gender', $_POST);
$gender_msg = ''; // Message de feedback validation, affiché si non vide
if ( ! $gender_ok) { // Si le prénom n'est pas valide
    $gender_msg = 'Le sexe n\'est pas coché.';
}
$email_ok = false;
$email_msg = '';
if (array_key_exists('email', $_POST)) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $email_ok = (false !== $email);
    if ( ! $email_ok) { // Si le email n'est pas valide
        $email_msg = 'Le courriel n\'est pas valide.';
    }
//    var_dump($email);
//    var_dump($email_ok);
}
$username_ok=false;
$username_msg = '';
if (array_key_exists('username',$_POST)){
    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_MAGIC_QUOTES);
    $username = filter_var($username,FILTER_SANITIZE_STRING);
    $username_ok = (1===preg_match('/^[a-z0-9]{4,}$/',$username));
    if ( ! $username_ok) {
        $username_msg = 'Le username doit au moins contenir 4 caractères.';
    }
    var_dump($username);
    var_dump($username_ok);
}
$password_0k = false;
$password_msg = '';
if (array_key_exists('password',$_POST)){
    $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password,FILTER_SANITIZE_STRING);
    $password_ok = (1===preg_match('/^[A-Za-z0-9%&$!*?]{8,}$/',$password));
    if ( ! $password_0k) {
        $password_msg = 'Le password n\'est pas valide.';
    }
    var_dump($password);
    var_dump($password_ok);
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Fichier HTML</title>
    <style></style>
</head>
<body>
<form id="inscription" name="inscription" xmlns="http://www.w3.org/1999/html" method="post" novalidate="novalidate">

    <label for="username">Username :</label>
    <input type="text" id="username" name="username" value="<?php echo array_key_exists('username',$_POST) ? $_POST['username'] : '' ?>"
            class="<?php echo $in_post && ! $username_ok ? 'error' : '';?>"/>
    <?php if ($in_post && ! $username_ok) {
        echo "<p class='error_msg'>$username_msg</p>";
    } ?>

    <label for="password">Password :</label>
    <input type="password" id="password" name="password" value="<?php echo array_key_exists('password',$_POST) ? $_POST['password'] : ''?>"
            class="<?php echo $in_post && ! $password_ok ? 'error' : '';?>"/>
    <?php if ($in_post && ! $password_0k) {
        echo "<p class='error_msg'>$password_msg</p>";
    } ?>

    <label for="firstname">Firstname : </label>
    <input type="text" name="firstname" id="firstname" value="<?php echo array_key_exists('firstname', $_POST) ? $_POST['firstname'] : '' ?>"
           class="<?php echo $in_post && ! $firstname_ok ? 'error' : '';?>"/>
    <?php if ($in_post && ! $firstname_ok) {
        echo "<p class='error_msg'>$firstname_msg</p>";
    } ?>
    <br/>

    <label for="lastname">Lastname :</label>
    <input type="text" id="lastname" name="lastname" value="<?php echo array_key_exists('lastname',$_POST) ? $_POST['lastname'] : ''?>"
            class="<?php echo $in_post && ! $lastname_ok ? 'error' : '';?>"/>
    <?php if ($in_post && ! $lastname_ok) {
        echo "<p class='error_msg'>$lastname_msg</p>";
    } ?><br/>

    <label>Sexe : </label>
    <label for="gender_male" >H</label>
    <input type="radio" name="gender" id="gender_male" value="gender_male"
        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_male')) ? 'checked="checked"' : '' ?>/>

    <label for="gender_female" >F</label>
    <input type="radio" name="gender" id="gender_female" value="gender_female"
        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_female')) ? 'checked="checked"' : '' ?>/><br/>

    <label for="email">Courriel : </label>
    <input type="email" name="email" id="email" value="<?php echo array_key_exists('email', $_POST) ? $_POST['email'] : '' ?>"
           class="<?php echo $in_post && ! $email_ok ? 'error' : '';?>"/><br/>

    <?php if ($in_post && ! $email_ok) {
        echo "<p class='error_msg'>$email_msg</p>";
    } ?><br/>
    <input type="submit" name="register" id="register" value="S'inscrire"/>
</form>
</body>
</html>