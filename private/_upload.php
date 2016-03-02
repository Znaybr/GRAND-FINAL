<?php
if (array_key_exists('image_files', $_FILES)) {
    var_dump($_FILES);
} else {
    exit;
};

$target_dir = "uploaded_files/";
$target_file = $target_dir . basename($_FILES["image_files"]["name"]);

$upload_valid = true; // Indique si le processus de upload est correcte
$error_msg = ''; // Message d'erreur le cas échéant

// Vérification des fichiers uploadés : Sont-ce des images valides ?
if (isset($_POST["addnew"])) {
    $check = getimagesize($_FILES["image_files"]["tmp_name"]);
    $upload_valid = ($check !== false);
    if ( ! $upload_valid) {
        $error_msg = 'Le fichier téléversé n\'est une images valide.';
    }
    //echo 'Le fichier téléversé est une images valide (' . $check["mime"] . ').';
}

// Check if file already exists
if (file_exists($target_file)) {
    $error_msg .= '<br>Le fichier existe déjà.';
    $upload_valid = false;
}

// Check file size
if ($_FILES["image_files"]["size"] > 500000) {
    $error_msg .= '<br>Le fichier trop gros : (La taille maximale est 500000 octets).';
    $upload_valid = false;
}

// Allow certain file formats
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error_msg .= '<br>Le format de fichier est invalide : (JPG, JPEG, PNG & GIF uniquement).';
    $upload_valid = false;
}

// Transfert du fichier
if ( ! move_uploaded_file($_FILES["image_files"]["tmp_name"], $target_file)) {
    $upload_valid = false;
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Résultat du téléversement</title>
</head>
<body>
<h1>Résultat du téléversement</h1>
<?php
if ($upload_valid) {
    echo '<p>Le fichier '. basename( $_FILES["image_files"]["name"]). ' a été téléversé avec succès.</p>';
    echo '<img src="uploaded_files/' . $_FILES["image_files"]["name"] . '" title="uploaded images" />';
} else {
    echo '<p>Le fichier n\'a pas été téléchargé.</p>';
    echo "<p>$error_msg</p>";
    echo '<img width="200px" src="images/grumpy-cat_1_0.jpg" title="uploaded images" />';
}
?>
</body>
</html>