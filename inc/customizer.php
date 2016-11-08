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

function ngaire_social_customize_register($wp_customize) {
	// Lets add a section for #social
	$wp_customize->add_section(
		// ID
		'social_section',
		// Arguments array
		array(
			'title' => __( 'Social & Contact Settings', 'ngaire-2-0' ),
			'description' => __( 'Add / Edit your Social & Contact Links', 'ngaire-2-0' ),
			'priority' => 30,
		)
	);
	
	//#twitter / fb / google / linkedin / insta / youtube
	
	$wp_customize->add_setting("twitter_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("facebook_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("google_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("linkedin_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("instagram_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("youtube_url", array(
		"default" => "",
		"transport" => "postMessage",
	));
		
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"twitter_url",
		array(
			"label" => __("Twitter URL", "customizer_twitter_url_label"),
			"section" => "social_section",
			"settings" => "twitter_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"facebook_url",
		array(
			"label" => __("Facebook URL", "customizer_facebook_url_label"),
			"section" => "social_section",
			"settings" => "facebook_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"google_url",
		array(
			"label" => __("Google URL", "customizer_google_url_label"),
			"section" => "social_section",
			"settings" => "google_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"linkedin_url",
		array(
			"label" => __("Linkedin URL", "customizer_linkedin_url_label"),
			"section" => "social_section",
			"settings" => "linkedin_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"instagram_url",
		array(
			"label" => __("Instagram URL", "customizer_instagram_url_label"),
			"section" => "social_section",
			"settings" => "instagram_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"youtube_url",
		array(
			"label" => __("Youtube URL", "customizer_youtube_url_label"),
			"section" => "social_section",
			"settings" => "youtube_url",
			"type" => "text",
		)
	));
	
	//#contact email / phone / office address / general hours
	
	$wp_customize->add_setting("contact_email_address", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("contact_phone", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("office_address_short", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("general_hours", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contact_email_address",
		array(
			"label" => __("Contact Email", "customizer_contact_email_address_label"),
			"section" => "social_section",
			"settings" => "contact_email_address",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contact_phone",
		array(
			"label" => __("Contact Phone", "customizer_contact_phone_label"),
			"section" => "social_section",
			"settings" => "contact_phone",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"office_address_short",
		array(
			"label" => __("Office Address", "customizer_office_address_short_label"),
			"section" => "social_section",
			"settings" => "office_address_short",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"general_hours",
		array(
			"label" => __("General Hours", "customizer_general_hours_label"),
			"section" => "social_section",
			"settings" => "general_hours",
			"type" => "text",
		)
	));
	
}

add_action( 'customize_register', 'ngaire_customize_register' );
add_action( 'customize_register', 'ngaire_social_customize_register' );

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
			__( 'Page Options', 'ngaire2.0' ),
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
		$page_options_full_width = get_post_meta( $post->ID, 'page_options_full_width', true );
		$page_options_show_sidebar = get_post_meta( $post->ID, 'page_options_show_sidebar', true );

		// Set default values.

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="page_options_full_width" class="page_options_full_width_label">' . __( 'Full Width page?', 'ngaire2.0' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" name="page_options_full_width" class="page_options_full_width_field" value="' . $page_options_full_width . '" ' . checked( $page_options_full_width, 'checked', false ) . '> ' . __( '', 'ngaire2.0' ) . '</label><br>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="page_options_show_sidebar" class="page_options_show_sidebar_label">' . __( 'Show sidebar?', 'ngaire2.0' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" name="page_options_show_sidebar" class="page_options_show_sidebar_field" value="' . $page_options_show_sidebar . '" ' . checked( $page_options_show_sidebar, 'checked', false ) . '> ' . __( '', 'ngaire2.0' ) . '</label><br>';
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

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Sanitize user input.
		$page_options_new_full_width = isset( $_POST[ 'page_options_full_width' ] ) ? 'checked' : '';
		$page_options_new_show_sidebar = isset( $_POST[ 'page_options_show_sidebar' ] ) ? 'checked' : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'page_options_full_width', $page_options_new_full_width );
		update_post_meta( $post_id, 'page_options_show_sidebar', $page_options_new_show_sidebar );
	}

}

new page_options_meta;

add_filter('body_class','custom_field_body_class');
function custom_field_body_class( $classes ) {
	if ( get_post_meta( get_the_ID(), 'page_options_show_sidebar', true ) ) {		
		$classes[] = 'layout-content-sidebar';		
	}
	
	if ( get_post_meta( get_the_ID(), 'page_options_full_width', true ) ) {		
		$classes[] = 'full-width';		
	}
	
	// return the $classes array
	return $classes;
}

