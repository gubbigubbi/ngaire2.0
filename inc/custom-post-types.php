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
function custom_post_type_callout() {

	$labels = array(
		'name'                => _x( 'Callouts', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Callout', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Callouts', 'text_domain' ),
		'name_admin_bar'      => __( 'Callouts', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Callout:', 'text_domain' ),
		'all_items'           => __( 'All Callouts', 'text_domain' ),
		'add_new_item'        => __( 'Add New Callout', 'text_domain' ),
		'add_new'             => __( 'Add Callout', 'text_domain' ),
		'new_item'            => __( 'New Callout', 'text_domain' ),
		'edit_item'           => __( 'Edit Callout', 'text_domain' ),
		'update_item'         => __( 'Update Callout', 'text_domain' ),
		'view_item'           => __( 'View Callout', 'text_domain' ),
		'search_items'        => __( 'Search Callout', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'callout', 'text_domain' ),
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
	register_post_type( 'callout', $args );

}

add_action( 'init', 'custom_post_type_callout', 0 );
	

if( in_array('portfolio', $selected) ) {
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
			'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' ),
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
		
	add_action( 'init', 'custom_post_type_portfolio', 0 );
		
	// Register Custom Taxonomy
	function custom_taxonomy_portfolio_category() {
		$labels = array(
			'name'                       => _x( 'Portfolio Category', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Portfolio Category', 'text_domain' ),
			'all_items'                  => __( 'All Portfolio Category', 'text_domain' ),
			'parent_item'                => __( 'Parent Portfolio Category', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Portfolio Category :', 'text_domain' ),
			'new_item_name'              => __( 'New Portfolio Category  Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Portfolio Category ', 'text_domain' ),
			'edit_item'                  => __( 'Edit Portfolio Category ', 'text_domain' ),
			'update_item'                => __( 'Update Portfolio Category ', 'text_domain' ),
			'view_item'                  => __( 'View Portfolio Category ', 'text_domain' ),
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
		register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
	}
	// Hook into the 'init' action
	add_action( 'init', 'custom_taxonomy_portfolio_category', 0 );
	
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
if( in_array('service', $selected) ) {
	// Register Custom Post Type
	function custom_post_type_service() {
	
		$labels = array(
			'name'                => _x( 'Service', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Services', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Services', 'text_domain' ),
			'name_admin_bar'      => __( 'Services', 'text_domain' ),
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
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-tools',
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

	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_service', 0 );

	// Register Custom Taxonomy
	function custom_taxonomy_service_category() {
		$labels = array(
			'name'                       => _x( 'Service Category', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Service Category', 'text_domain' ),
			'all_items'                  => __( 'All Service Category', 'text_domain' ),
			'parent_item'                => __( 'Parent Service Category', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Service Category :', 'text_domain' ),
			'new_item_name'              => __( 'New Service Category  Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Service Category ', 'text_domain' ),
			'edit_item'                  => __( 'Edit Service Category ', 'text_domain' ),
			'update_item'                => __( 'Update Service Category ', 'text_domain' ),
			'view_item'                  => __( 'View Service Category ', 'text_domain' ),
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
		register_taxonomy( 'service_category', array( 'service' ), $args );
	}
	// Hook into the 'init' action
	add_action( 'init', 'custom_taxonomy_service_category', 0 );

}
if( in_array('class', $selected) ) {
// Register Custom Post Type
	function custom_post_type_class() {
	
		$labels = array(
			'name'                => _x( 'Classes', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Class', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Classes', 'text_domain' ),
			'name_admin_bar'      => __( 'Classes', 'text_domain' ),
			'parent_item_colon'   => __( 'Parent Class:', 'text_domain' ),
			'all_items'           => __( 'All Classes', 'text_domain' ),
			'add_new_item'        => __( 'Add New Class', 'text_domain' ),
			'add_new'             => __( 'Add Class', 'text_domain' ),
			'new_item'            => __( 'New Class', 'text_domain' ),
			'edit_item'           => __( 'Edit Class', 'text_domain' ),
			'update_item'         => __( 'Update Class', 'text_domain' ),
			'view_item'           => __( 'View Class', 'text_domain' ),
			'search_items'        => __( 'Search Class', 'text_domain' ),
			'not_found'           => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
		);
		$args = array(
			'label'               => __( 'class', 'text_domain' ),
			'description'         => __( 'Post Type Description', 'text_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-chart-line',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,		
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'class', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_class', 0 );

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
			array( $this, 'render_callback' ),
			'team',
			'side',
			'default'
		);

	}

	public function render_callback( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'custom_meta_team_nonce_action', 'custom_meta_team_nonce' );

		// Retrieve an existing value from the database.
		$custom_meta_team_position = get_post_meta( $post->ID, 'custom_meta_team_position', true );
		$custom_meta_team_linkedin = get_post_meta( $post->ID, 'custom_meta_team_linkedin', true );
		$custom_meta_team_email = get_post_meta( $post->ID, 'custom_meta_team_email', true );

		// Set default values.
		if( empty( $custom_meta_team_position ) ) $custom_meta_team_position = '';
		if( empty( $custom_meta_team_linkedin ) ) $custom_meta_team_linkedin = '';
		if( empty( $custom_meta_team_email ) ) $custom_meta_team_email = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_team_position" class="custom_meta_team_position_label">' . __( 'Position', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="custom_meta_team_position" name="custom_meta_team_position" class="custom_meta_team_position_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $custom_meta_team_position ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_team_linkedin" class="custom_meta_team_linkedin_label">' . __( 'LinkedIn', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="custom_meta_team_linkedin" name="custom_meta_team_linkedin" class="custom_meta_team_linkedin_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $custom_meta_team_linkedin ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="custom_meta_team_email" class="custom_meta_team_email_label">' . __( 'Email', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="email" id="custom_meta_team_email" name="custom_meta_team_email" class="custom_meta_team_email_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $custom_meta_team_email ) . '">';
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

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$custom_meta_team_new_position = isset( $_POST[ 'custom_meta_team_position' ] ) ? sanitize_text_field( $_POST[ 'custom_meta_team_position' ] ) : '';
		$custom_meta_team_new_linkedin = isset( $_POST[ 'custom_meta_team_linkedin' ] ) ? esc_url( $_POST[ 'custom_meta_team_linkedin' ] ) : '';
		$custom_meta_team_new_email = isset( $_POST[ 'custom_meta_team_email' ] ) ? sanitize_email( $_POST[ 'custom_meta_team_email' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'custom_meta_team_position', $custom_meta_team_new_position );
		update_post_meta( $post_id, 'custom_meta_team_linkedin', $custom_meta_team_new_linkedin );
		update_post_meta( $post_id, 'custom_meta_team_email', $custom_meta_team_new_email );

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