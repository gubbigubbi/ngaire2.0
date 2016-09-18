<?php

// Register Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'primary' => __( 'Primary Menu', 'ngaire' ),
		'mobile' => __( 'Mobile Menu', 'ngaire' ),
		'pre_header' => __( 'Menu shown above header', 'ngaire' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );