<?php
require_once 'db/P62_DBkitDem_conn.php';
require_once '_defines.php';
require_once 'common/start.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'index';
require_once 'view_parts/_page_base.php';
?>


<div id="contact_page"">

    <?php
    require_once "view_parts/_contact_form.php";
    ?>

</div>

<?php
require_once 'view_parts/_page_buttom.php';
?>
