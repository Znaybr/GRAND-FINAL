<?php
if(!isset($_GET["lang"])){
    header("Loacation:index.php");}
     else {
         if ($_GET["lang"] == "fr" or $_GET["lang"] == "en") {
             session_start();
             $_SESSION["langage"] = $_GET["lang"];

         }
         else {
                 header("Loacation:index.php");
         }
}
