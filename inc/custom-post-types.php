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

