<?php

foreach ($site_data[MAIN_MENU] as $nom => $url) {
    echo "<li><a href=\"$url\">" . tr($nom) . "</a></li>";
}
