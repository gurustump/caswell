<?php
if (!is_admin()) {
	// register main stylesheet
	wp_register_style( 'caswell-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
	wp_enqueue_style( 'caswell-stylesheet' );
}
function list_registered_scripts() {
	global $wp_scripts;
	foreach ($wp_scripts -> registered as $script) {
		echo '<pre>';
		print_r($script);
		echo '</pre>';
	}
}
function list_script_handles() {
	global $wp_scripts;
	foreach ($wp_scripts -> queue as $handle) {
		echo '<pre>';
		echo $handle;
		echo '</pre>';
	}
}
?>