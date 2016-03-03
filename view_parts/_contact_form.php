<?php
$in_post=array_key_exists("register", $_POST); // Savoir si le formulaire est en soumission/reception
//$in_post = ('POST' == $_SERVER['REQUEST_METHOD']); // Definie la reception en POST
//var_dump($_POST);


//*****************************************************************************************************VALIDATION PRENOM
$prenom_ok = false;
$prenom_message = ""; //message de feedback en cas de champ erronné, affiché si non vide
if (array_key_exists("prenom", $_POST)) {
    $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING );
    $prenom_ok = (1 === preg_match("/^[A-Za-z0-9]{2,}$/", $prenom));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$prenom_ok){ // si prenom est non valide
        $prenom_message="Votre prénom doit être inscrit au complet";
    }
    /*    var_dump($prenom);
        var_dump($prenom_ok);
        var_dump($prenom_message);*/
}

//*****************************************************************************************************VALIDATION NOM
$nom_ok = false;
$nom_message = ""; //message de feedback en cas de champ erronné, affiché si non vide
if (array_key_exists("nom", $_POST)) {
    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING );
    $nom_ok = (1 === preg_match("/^[A-Za-z0-9]{2,}$/", $nom));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$nom_ok){ // si nom est non valide
        $nom_message="Votre nom doit être inscrit au complet";
    }
    /*    var_dump($nom);
        var_dump($nom_ok);*/
}

//*****************************************************************************************************VALIDATION COURRIEL
$courriel_ok = false;
$courriel_message = ""; //message de feedback en cas de champ erronné, affiché si non vide
if (array_key_exists("courriel", $_POST)) {
    $courriel = filter_input(INPUT_POST, "courriel", FILTER_SANITIZE_EMAIL );
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (false !== $courriel);
    if(!$courriel_ok) { // si nom est non valide
        $courriel_message="Ce champs doit comporter une adresse mail valide";
    }
    /*    var_dump($courriel);
        var_dump($courriel_ok);*/
}

//*****************************************************************************************************VALIDATION TELEPHONE
$telephone_ok = false;
$telephone_message = ""; //message de feedback en cas de champ erronné, affiché si non vide
if (array_key_exists("telephone", $_POST)) {
    $telephone = filter_input(INPUT_POST, "telephone", FILTER_SANITIZE_STRING );
    $telephone_ok = (1 === preg_match('/^\(?\d{3}\)?[-\.\s]?\d{3}[-\.\s]?\d{4}$/', $telephone));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$telephone_ok) { // si nom est non valide
        $telephone_message="Ce champs doit comporter un numéro de téléphone valide";
    }
    /*    var_dump($telephone);
        var_dump($telephone_ok);*/
}

//*****************************************************************************************************VALIDATION VILLE
if (array_key_exists("ville", $_POST)) {
    $ville = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_STRING);
}
    /*    var_dump($ville);
        var_dump($ville_ok);*/

//*****************************************************************************************************VALIDATION SEXE
if (array_key_exists("genre", $_POST)) {
    $sexe = $_POST["genre"];
}
//var_dump($_POST["genre"]);

//*****************************************************************************************************VALIDATION PREFERENCE
if (array_key_exists("pref", $_POST)) {
    $preference = $_POST["pref"];
}
//var_dump($_POST["pref"]);



//*****************************************************************************************************VALIDATION MESSAGE
$message_ok = false;
$message_message = ""; //message de feedback en cas de champ erronné, affiché si non vide
if (array_key_exists("text_message", $_POST)) {
    $message = filter_input(INPUT_POST, "text_message", FILTER_SANITIZE_STRING );
    $message_ok = (1 === preg_match("/^[A-Za-z0-9]{20,}$/", $message));  // 1 siginifie que la condition est vraie et vérifiée
    if(!$message_ok){ // si nom est non valide
        $message_message="Spécifiez un peu plus votre message, je pourrais vous répondre avec plus de précision";
    }
//    var_dump($message);
//    var_dump($message_ok);
}




//**************************************VALIDATION ET ENVOI**************************************************
if ($prenom_ok && $nom_ok && $courriel_ok && $telephone_ok && $message_ok/*true*/){
    //on enregistre les données et s'en va sur une autres page
    require_once "db/P62_DBkitDem_messages.php";
    $message_info = message_add($prenom, $nom, $courriel, $telephone, $ville, $sexe, $preference, $message);
//    $message_info = message_add('dfdf', 'dfdf', 'dfdf', 'dfdf', 'dfdf', 'homme', 'dfgdfgdgdfgdf', 'sdsdfdssdfsdfsfsfsdf');
    header("Location: index.php");
   exit;
}
?>


    <fieldset>
        <legend>Contactez-nous</legend>

        <p>Laissez nous un message, vos questions ainsi que vos coordonnées, nous vous répondrons prochainement.</p>

        <form id="form_contact" action="" method="post">
            <ul>
                <!--        PRENOM-->
                <li><label for="prenom">Prénom <span>*</span></label>
                    <input type="text" id="prenom" name="prenom" autofocus
                           class="<?php echo $in_post && ! $prenom_ok ? 'erreur' : ''; ?>"
                           value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom']: ''?>"/>
                </li>
                <?php if ($in_post && ! $prenom_ok){
                    echo "<p>$prenom_message</p>";
                }  ?>

                <!--        NOM-->
                <li><label for="nom">Nom <span>*</span></label>
                    <input type="text" id="nom" name="nom"
                           class="<?php echo $in_post && ! $nom_ok ? 'erreur' : ''; ?>"
                           value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom']: ''?>"/>
                </li>
                <?php if ($in_post && ! $nom_ok){
                    echo "<p>$nom_message</p>";
                }  ?>

                <!--        COURRIEL-->
                <li><label for="courriel">Courriel <span>*</span></label>
                    <input type="text" id="courriel" name="courriel"
                           class="<?php echo $in_post && ! $courriel_ok ? 'erreur' : ''; ?>"
                           value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel']: ''?>"/>
                </li>
                <?php if ($in_post && ! $courriel_ok){
                    echo "<p>$courriel_message</p>";
                }  ?>

                <!--        TELEPHONE-->
                <li><label for="telephone">Téléphone <span>*</span></label>
                    <input type="text" id="telephone" name="telephone"
                           class="<?php echo $in_post && ! $telephone_ok ? 'erreur' : ''; ?>"
                           value="<?php echo array_key_exists('telephone', $_POST) ? $_POST['telephone']: ''?>"/>
                </li>
                <?php if ($in_post && ! $telephone_ok){
                    echo "<p>$telephone_message</p>";
                }  ?>

                <!--        VILLE-->
                <li><label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville"
                </li>

                <!--        SEXE-->
                <li><label>Sexe : </label>
                    <div id="genre">
                        <label id="f" for="femme">Femme</label>
                        <input type="radio" id="femme" name="genre" value="femme"/>
                        <label id="h" for="homme">Homme</label>
                        <input type="radio" id="homme" name="genre" value="homme"/>
                    </div>
                </li>

                <!--        PREFERENCE-->
                <li>
                    <label for="pref">Préférence</label>
                    <input list="pref-list" type="text" id="pref" name="pref"/>
                        <datalist id="pref-list">
                            <option value="1">Bagues</option>
                            <option value="2">Colliers</option>
                            <option value="3">Boucles d'oreilles</option>
                            <option value="4">Bracelets</option>
                        </datalist>
                </li>

                <!--        MESSAGE-->
                <li>
                    <label for="text_message" id="label_message">Message</label>
                    <textarea rows="" cols="" id="text_message" name="text_message"></textarea>
                </li>
                <?php if ($in_post && ! $message_ok){
                    echo "<p>$message_message</p>";
                }  ?>

                <li><input type="submit" value="Envoyer" id="register" name="register"></li>
            </ul>
            <?php if($in_post){ echo "<p>Merci de corriger les champs comportants un *.</p>"; } ?>
        </form>
    </fieldset>
