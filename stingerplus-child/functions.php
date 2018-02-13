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

add_action('init', function() {
	remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_content', 'wpautop');
});

add_filter('tiny_mce_before_init', function($init) {
	$init['wpautop'] = false;
	$init['apply_source_formatting'] = ture;
	return $init;
});
