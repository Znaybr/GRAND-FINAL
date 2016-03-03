<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'inscription';
require_once 'view_parts/_page_base.php';

?>

<div id="repar">
    <fieldset>
        <legend>Réparations</legend>
        <div>
            <h2>Réparation de bijoux</h2>
            <p>Réparations de bijoux en or, argent, cuivre :  soudures, mise à grandeur, griffes, chatons, ajout et transformation, serre doigt permanent, changement de fermoir, rivets, raccourcir ou allonger chaînes-colliers-bracelets, réenfilage de collier de perles ou fantaisies.</p>
            <div>
                <img src="images/joallier1.jpg" alt="">
                <img src="images/joallier2.jpg" alt="">
                <img src="images/joallier3.jpg" alt="">
            </div>
        </div>
        <div>
            <h2>Services</h2>

            <p>Lorsque vous nous soumettrez un bijou à modifier ou à réparer, nous vous remettrons au préalable une estimation du coût de la réparation. Cela sans aucun frais.</p>
        </div>
    </fieldset>

</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>

