<link rel = "stylesheet"  type="text/css"  href = "css/style.css" />
<?php
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'inscription';
require_once 'view_parts/_page_base.php';

$reparfr = array("Réparations", "Réparation de bijoux", "Réparations de bijoux en or, argent, cuivre :  soudures, mise à grandeur, griffes, chatons, ajout et transformation, serre doigt permanent, changement de fermoir, rivets, raccourcir ou allonger chaînes-colliers-bracelets, réenfilage de collier de perles ou fantaisies.", "Lorsque vous nous soumettrez un bijou à modifier ou à réparer, nous vous remettrons au préalable une estimation du coût de la réparation. Cela sans aucun frais.", "", "", "", "", "", "",);
$reparen = array("Repairs", "Jewelry repairs", "
We can repair gold jewelry, silver, copper : welds, claws, bezel, stone, adding and processing, rivets, shorten or lengthen chains, necklaces, bracelets, re-threading of pearl necklace or fashion.", "When you send us a piece of jewelry for a modification or for repair, we will give you an evaluation of the cost beforehand, at no charge.", "", "", "", "", "", "",);
if ($_SESSION["langage"] == 'en') {
    $reparfr = $reparen;
}
?>

<div id="repar">
    <fieldset>
        <legend><?php echo $reparfr['0']?></legend>
        <div>
            <h2><?php echo $reparfr['1']?></h2>
            <p><?php echo $reparfr['2']?></p>
            <div>
                <img src="images/joallier1.jpg" alt="">
                <img src="images/joallier2.jpg" alt="">
                <img src="images/joallier3.jpg" alt="">
            </div>
        </div>
        <div>
            <h2>Services</h2>

            <p><?php echo $reparfr['3']?></p>
        </div>
    </fieldset>

</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>

