<?php
if ( !defined( 'ABSPATH' ) ) {
exit;
}

if (locate_template('/st-kanri.php') !== '') {
require_once locate_template('/st-kanri.php');
}

if (locate_template('/st-theme-customization.php') !== '') {
require_once locate_template('/st-theme-customization.php');
}

if (locate_template('/st-widgets.php') !== '') {
require_once locate_template('/st-widgets.php');
}

