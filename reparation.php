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
            <h2>Matériaux travaillés</h2>
            <p>Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco nec postulo, facis amice; sed, ut mihi videris, non recte iudicas de </p>
            <div>
                <img src="images/joallier1.jpg" alt="">
                <img src="images/joallier2.jpg" alt="">
                <img src="images/joallier3.jpg" alt="">
            </div>
        </div>
        <div>
            <h2>Réalisations personnelles</h2>

            <p>Tu autem, Fanni, quod mihi tantum tribui dicis quantum ego nec adgnosco nec postulo, facis amice; sed, ut mihi videris, non recte iudicas de Catone; aut enim nemo, quod quidem magis credo, aut si quisquam, ille </p>
        </div>
    </fieldset>

</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>

