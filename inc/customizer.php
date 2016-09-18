<?php
/**
 * Ngaire Theme Customizer.
 *
 * @package Ngaire
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ngaire_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting( 'site_logo' ); // Add setting for logo uploader
	$wp_customize->add_setting( 'site_logo_mobile' ); // Add setting for logo uploader
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'site_logo',
		   array(
			   'label'      => __( 'Upload a logo', 'ngaire' ),
			   'section'    => 'title_tagline',
			   'settings'   => 'site_logo',
		   )
	   )
	);
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'site_logo_mobile',
           array(
               'label'      => __( 'Upload a logo for mobile devices', 'ngaire' ),
               'section'    => 'title_tagline',
               'settings'   => 'site_logo_mobile',
           )
       )
   );
	
}
add_action( 'customize_register', 'ngaire_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ngaire_customize_preview_js() {
	wp_enqueue_script( 'ngaire_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ngaire_customize_preview_js' );


// Customizer


class page_options_meta {

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
			'page_options',
			__( 'Page Options', 'ngaire' ),
			array( $this, 'render_metabox' ),
			'page',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'page_options_nonce_action', 'page_options_nonce' );

		// Retrieve an existing value from the database.
		$page_options_show_sidebar = get_post_meta( $post->ID, 'page_options_show_sidebar', true );

		// Set default values.
		if( empty( $page_options_show_sidebar ) ) $page_options_show_sidebar = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="page_options_show_sidebar" class="page_options_show_sidebar_label">' . __( 'Show sidebar?', 'ngaire' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" id="page_options_show_sidebar" name="page_options_show_sidebar" class="page_options_show_sidebar_field" value="' . $page_options_show_sidebar . '" ' . checked( $page_options_show_sidebar, 'checked', false ) . '> ' . __( '', 'ngaire' ) . '</label>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['page_options_nonce'] ) ? $_POST['page_options_nonce'] : '';
		$nonce_action = 'page_options_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Sanitize user input.
		$page_options_new_show_sidebar = isset( $_POST[ 'page_options_show_sidebar' ] ) ? 'checked'  : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'page_options_show_sidebar', $page_options_new_show_sidebar );

	}

}

new page_options_meta;

if(get_post_meta( $post->ID, 'page_options_show_sidebar', true )) {
	add_filter( 'body_class', function( $classes ) {
		return array_merge( $classes, array( 'layout-content-sidebar' ) );
	} );
}