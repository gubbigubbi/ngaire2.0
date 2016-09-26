<?php

$selected = get_field('custom_post_types','options');
if (empty($selected)) {
	$selected = array("none");
}

if( in_array('testimonials', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_testimonial() {
	
		$labels = array(
			'name'                => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Testimonials', 'text_domain' ),
			'name_admin_bar'      => __( 'Testimonials', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Testimonial:', 'text_domain' ),
			'all_items'           => __( 'All Testimonials', 'text_domain' ),
			'add_new_item'        => __( 'Add New Testimonial', 'text_domain' ),
			'add_new'             => __( 'Add Testimonial', 'text_domain' ),
			'new_item'            => __( 'Testimonial Testimonial', 'text_domain' ),
			'edit_item'           => __( 'Edit Testimonial', 'text_domain' ),
			'update_item'         => __( 'Update Testimonial', 'text_domain' ),
			'view_item'           => __( 'View Testimonial', 'text_domain' ),
			'search_items'        => __( 'Search Testimonial', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'testimonial', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-awards',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,		
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'testimonial', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_testimonial', 0 );
}

// Register Custom Post Type
function custom_post_type_portfolio() {

	$labels = array(
		'name'                => _x( 'Portfolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Portfolio', 'text_domain' ),
		'name_admin_bar'      => __( 'Portfolios', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Portfolio Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Portfolio Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Portfolio Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Portfolio Item', 'text_domain' ),
		'update_item'         => __( 'Update Portfolio Item', 'text_domain' ),
		'view_item'           => __( 'View Portfolio Item', 'text_domain' ),
		'search_items'        => __( 'Search Portfolio Items', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );

}

if( in_array('portfolio', $selected) ) {
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_portfolio', 0 );
}

if( in_array('partner', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_partner() {
	
		$labels = array(
			'name'                => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Partners', 'text_domain' ),
			'name_admin_bar'      => __( 'Partners', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Partners', 'text_domain' ),
			'add_new_item'        => __( 'Add New Partner', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Partner', 'text_domain' ),
			'edit_item'           => __( 'Edit Partner', 'text_domain' ),
			'update_item'         => __( 'Update Partner', 'text_domain' ),
			'view_item'           => __( 'View Partner', 'text_domain' ),
			'search_items'        => __( 'Search Partners', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'partner', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'partner', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_partner', 0 );
}

if( in_array('class', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_class() {
	
		$labels = array(
			'name'                => _x( 'Classes', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Class', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Classes', 'text_domain' ),
			'name_admin_bar'      => __( 'Classes', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Classes', 'text_domain' ),
			'add_new_item'        => __( 'Add New Class', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Class', 'text_domain' ),
			'edit_item'           => __( 'Edit Class', 'text_domain' ),
			'update_item'         => __( 'Update Class', 'text_domain' ),
			'view_item'           => __( 'View Class', 'text_domain' ),
			'search_items'        => __( 'Search Classes', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'class', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-groups',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'class', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_class', 0 );
}

if( in_array('video-gallery', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_video_gallery() {
	
		$labels = array(
			'name'                => _x( 'Video Galleries', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Video Gallery', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Video Galleries', 'text_domain' ),
			'name_admin_bar'      => __( 'Video Galleries', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Video Galleries', 'text_domain' ),
			'add_new_item'        => __( 'Add New Video Gallery', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Video Gallery', 'text_domain' ),
			'edit_item'           => __( 'Edit Video Gallery', 'text_domain' ),
			'update_item'         => __( 'Update Video Gallery', 'text_domain' ),
			'view_item'           => __( 'View Video Gallery', 'text_domain' ),
			'search_items'        => __( 'Search Video Galleries', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'video-gallery', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-video',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'video-gallery', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_video_gallery', 0 );
}

// Register Custom Post Type
function custom_post_type_service() {

	$labels = array(
		'name'                => _x( 'Service', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Service', 'text_domain' ),
		'name_admin_bar'      => __( 'Service', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Services', 'text_domain' ),
		'add_new_item'        => __( 'Add New Service', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Service', 'text_domain' ),
		'edit_item'           => __( 'Edit Service', 'text_domain' ),
		'update_item'         => __( 'Update Service', 'text_domain' ),
		'view_item'           => __( 'View Service', 'text_domain' ),
		'search_items'        => __( 'Search Service', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'service', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'service', $args );

}

if( in_array('service', $selected) ) {
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_service', 0 );
}

// Register Custom Post Type
function custom_post_type_special() {

	$labels = array(
		'name'                => _x( 'Specials', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Special', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Specials', 'text_domain' ),
		'name_admin_bar'      => __( 'Specials', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Specials', 'text_domain' ),
		'add_new_item'        => __( 'Add New Special', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Special', 'text_domain' ),
		'edit_item'           => __( 'Edit Special', 'text_domain' ),
		'update_item'         => __( 'Update Special', 'text_domain' ),
		'view_item'           => __( 'View Special', 'text_domain' ),
		'search_items'        => __( 'Search Special', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'special', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-star-empty',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'special', $args );

}

// Register Custom Post Type
function custom_post_type_challenge() {

	$labels = array(
		'name'                => _x( 'Challenge', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Challenge', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Challenge', 'text_domain' ),
		'name_admin_bar'      => __( 'Challenge', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Challenges', 'text_domain' ),
		'add_new_item'        => __( 'Add New Challenge', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Challenge', 'text_domain' ),
		'edit_item'           => __( 'Edit Challenge', 'text_domain' ),
		'update_item'         => __( 'Update Challenge', 'text_domain' ),
		'view_item'           => __( 'View Challenge', 'text_domain' ),
		'search_items'        => __( 'Search Challenge', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'challenge', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-flag',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'challenge', $args );

}

// Register Custom Post Type
function custom_post_type_membership() {

	$labels = array(
		'name'                => _x( 'Membership', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Membership', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Membership', 'text_domain' ),
		'name_admin_bar'      => __( 'Membership', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Memberships', 'text_domain' ),
		'add_new_item'        => __( 'Add New Membership', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Membership', 'text_domain' ),
		'edit_item'           => __( 'Edit Membership', 'text_domain' ),
		'update_item'         => __( 'Update Membership', 'text_domain' ),
		'view_item'           => __( 'View Membership', 'text_domain' ),
		'search_items'        => __( 'Search Membership', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'membership', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-nametag',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'membership', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_challenge', 0 );
add_action( 'init', 'custom_post_type_membership', 0 );
add_action( 'init', 'custom_post_type_special', 0 );


if( in_array('trainer', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_trainer() {
	
		$labels = array(
			'name'                => _x( 'Trainers', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Trainers', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Trainers', 'text_domain' ),
			'name_admin_bar'      => __( 'Trainers', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Trainers', 'text_domain' ),
			'add_new_item'        => __( 'Add New Trainer', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Trainer', 'text_domain' ),
			'edit_item'           => __( 'Edit Trainer', 'text_domain' ),
			'update_item'         => __( 'Update Trainer', 'text_domain' ),
			'view_item'           => __( 'View Trainer', 'text_domain' ),
			'search_items'        => __( 'Search Trainer', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'trainer', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-chart-line',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'trainer', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_trainer', 0 );
	
	// Register Custom Taxonomy
	function custom_taxonomy_trainer_category() {
		$labels = array(
			'name'                       => _x( 'Trainer Categories', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Trainer Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Trainer Category', 'text_domain' ),
			'all_items'                  => __( 'All Trainer Categories', 'text_domain' ),
			'parent_item'                => __( 'Parent Trainer Category ', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Trainer Category :', 'text_domain' ),
			'new_item_name'              => __( 'New Trainer Category  Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Trainer Category ', 'text_domain' ),
			'edit_item'                  => __( 'Edit Trainer Category ', 'text_domain' ),
			'update_item'                => __( 'Update Trainer Category ', 'text_domain' ),
			'view_item'                  => __( 'View Trainer Category ', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'exclude_from_search' 		 => true,
		);
		register_taxonomy( 'trainer_category', array( 'trainer' ), $args );
	}
	// Hook into the 'init' action
	add_action( 'init', 'custom_taxonomy_trainer_category', 0 );
}


if( in_array('team', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_team() {
	
		$labels = array(
			'name'                => _x( 'Team', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Team', 'text_domain' ),
			'name_admin_bar'      => __( 'Team', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
			'all_items'           => __( 'All Team Members', 'text_domain' ),
			'add_new_item'        => __( 'Add New Team Member', 'text_domain' ),
			'add_new'             => __( 'Add New', 'text_domain' ),
			'new_item'            => __( 'New Team', 'text_domain' ),
			'edit_item'           => __( 'Edit Team', 'text_domain' ),
			'update_item'         => __( 'Update Team', 'text_domain' ),
			'view_item'           => __( 'View Team', 'text_domain' ),
			'search_items'        => __( 'Search Team', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'team', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-universal-access-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'team', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_team', 0 );
	
	// Register Custom Taxonomy
	function custom_taxonomy_department() {
		$labels = array(
			'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Department', 'text_domain' ),
			'all_items'                  => __( 'All Departments', 'text_domain' ),
			'parent_item'                => __( 'Parent Department ', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Department :', 'text_domain' ),
			'new_item_name'              => __( 'New Department  Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Department ', 'text_domain' ),
			'edit_item'                  => __( 'Edit Department ', 'text_domain' ),
			'update_item'                => __( 'Update Department ', 'text_domain' ),
			'view_item'                  => __( 'View Department ', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'exclude_from_search' 		 => true,
		);
		register_taxonomy( 'department', array( 'team' ), $args );
	}
	// Hook into the 'init' action
	add_action( 'init', 'custom_taxonomy_department', 0 );
}

// Custom Meta


class custom_meta_team {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'team_options',
			__( 'Team Member options', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'team',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'custom_meta_team_nonce_action', 'custom_meta_team_nonce' );

		// Retrieve an existing value from the database.
		$custom_meta_team_position = get_post_meta( $post->ID, 'custom_meta_team_position', true );

		// Set default values.
		if( empty( $custom_meta_team_position ) ) $custom_meta_team_position = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_team_position" class="custom_meta_team_position_label">' . __( 'Position', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="custom_meta_team_position" name="custom_meta_team_position" class="custom_meta_team_position_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $custom_meta_team_position ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['custom_meta_team_nonce'] ) ? $_POST['custom_meta_team_nonce'] : '';
		$nonce_action = 'custom_meta_team_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Sanitize user input.
		$custom_meta_team_new_position = isset( $_POST[ 'custom_meta_team_position' ] ) ? sanitize_text_field( $_POST[ 'custom_meta_team_position' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'custom_meta_team_position', $custom_meta_team_new_position );

	}

}

new custom_meta_team;

// Custom meta classes

class custom_meta_class {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'class_options',
			__( 'Class options', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'class',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'custom_meta_class_nonce_action', 'custom_meta_class_nonce' );

		// Retrieve an existing value from the database.
		$custom_meta_class_hours = get_post_meta( $post->ID, 'custom_meta_class_hours', true );

		// Set default values.
		if( empty( $custom_meta_class_hours ) ) $custom_meta_class_hours = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_class_hours" class="custom_meta_class_hours_label">' . __( 'Class hours', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="custom_meta_class_hours" name="custom_meta_class_hours" class="custom_meta_class_hours_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $custom_meta_class_hours ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['custom_meta_class_nonce'] ) ? $_POST['custom_meta_class_nonce'] : '';
		$nonce_action = 'custom_meta_class_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Sanitize user input.
		$custom_meta_class_new_hours = isset( $_POST[ 'custom_meta_class_hours' ] ) ? sanitize_text_field( $_POST[ 'custom_meta_class_hours' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'custom_meta_class_hours', $custom_meta_class_new_hours );

	}

}

new custom_meta_class;



class cutom_meta_membership {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'membership_options',
			__( 'Membership Options', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'membership',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$custom_meta_membership_payment_conditions = get_post_meta( $post->ID, 'custom_meta_membership_payment_conditions', true );

		// Set default values.
		if( empty( $custom_meta_membership_payment_conditions ) ) $custom_meta_membership_payment_conditions = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_membership_payment_conditions" class="custom_meta_membership_payment_conditions_label">' . __( 'Payment conditions', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<textarea id="custom_meta_membership_payment_conditions" name="custom_meta_membership_payment_conditions" class="custom_meta_membership_payment_conditions_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '">' . $custom_meta_membership_payment_conditions . '</textarea>';
		echo '			<p class="description">' . __( 'Enter any payment conditions which apply', 'text_domain' ) . '</p>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$custom_meta_membership_new_payment_conditions = isset( $_POST[ 'custom_meta_membership_payment_conditions' ] ) ? sanitize_text_field( $_POST[ 'custom_meta_membership_payment_conditions' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'custom_meta_membership_payment_conditions', $custom_meta_membership_new_payment_conditions );

	}

}

new cutom_meta_membership;



