<?php 
/**
 * Enqueue scripts and styles.
 */
function ngaire_scripts() {
	wp_enqueue_style( 'ngaire-2-0-style', get_stylesheet_uri() ); 

	//styling vars
	$txtcolors = array('light', 'dark', 'text', 'neutral', 'grey');

	foreach( $txtcolors as $txtcolor ) {
		${color_.$txtcolor} = get_theme_mod('color-'.$txtcolor, NULL);
	}

	$fonts = array('headings', 'main');

	foreach( $fonts as $font ) {
		${font_.$font} = get_theme_mod('font-'.$font, NULL);
	}	

	$font_sizes = array('base','navbar','preheader','footer','buttons');

	foreach( $font_sizes as $font_size ) {
		${font_size_.$font_size} = get_theme_mod('font-size-'.$font_size, NULL);
	}	

	$heading_font = str_replace(' ','+',get_theme_mod('font-headings'));
	$body_font = str_replace(' ','+',get_theme_mod('font-main'));

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family='.$heading_font.':400,700|'.$body_font.':400,700', false, false );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(get_field('enable_developer_mode','options')) {
		wp_enqueue_script( 'all', get_template_directory_uri() . '/assets/js/all.min.js', array( 'jquery' ), false, true );
		wp_localize_script( 'all', 'myAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'color-light' 			=> $color_light,
			'color-dark' 			=> $color_dark,
			'color-text' 			=> $color_text,
			'color-neutral' 		=> $color_neutral,
			'color-grey' 			=> $color_grey,
			'font-headings' 		=> $font_headings,
			'font-main'				=> $font_main,
			'font-size-base' 		=> $font_size_base,
			'font-size-navbar'		=> $font_size_navbar,
			'font-size-preheader' 	=> $font_size_preheader,
			'font-size-footer'		=> $font_size_footer,
			'font-size-buttons'		=> $font_size_buttons
		));

	} else {
		wp_enqueue_script( 'app-js', get_template_directory_uri() . '/src/js/app.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/src/js/vendor/custom.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ajax-query', get_template_directory_uri() . '/src/js/vendor/ajax-query.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ngaire-skip-link-focus-fix', get_template_directory_uri() . '/src/js/vendor/skip-link-focus-fix.js', array(), '20130115', true );   
		wp_enqueue_script( 'slide-menu', get_template_directory_uri() . '/src/js/vendor/slideMenu.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'slick', get_template_directory_uri().'/src/js/vendor/slick.js');	
		wp_enqueue_script( 'blazy', get_template_directory_uri().'/src/js/vendor/blazy.min.js', false, false, true);
		wp_enqueue_script( 'colorbox', get_template_directory_uri().'/src/js/vendor/jquery.colorbox.js', false, false, true);
		wp_enqueue_script('bootstrap-util', get_template_directory_uri().'/src/js/vendor/bootstrap-util.js', false, false, true);
		wp_enqueue_script('bootstrap-dropdown', get_template_directory_uri().'/src/js/vendor/bootstrap-dropdown.js', false, false, true);
		wp_enqueue_script('bootstrap-modal', get_template_directory_uri().'/src/js/vendor/bootstrap-modal.js', false, false, true);
		wp_enqueue_script('bootstrap-button', get_template_directory_uri().'/src/js/vendor/bootstrap-button.js', false, false, true);
		wp_enqueue_script('isotope', get_template_directory_uri().'/src/js/vendor/isotope.pkgd.min.js', false, false, true);
		wp_enqueue_script('imagesloaded', get_template_directory_uri().'/src/js/vendor/imagesloaded.pkgd.min.js', false, false, true);

		wp_localize_script( 'ajax-query', 'myAjax', array(
			'ajaxurl' 				=> admin_url( 'admin-ajax.php' ),
			'color-light' 			=> $color_light,
			'color-dark' 			=> $color_dark,
			'color-text' 			=> $color_text,
			'color-neutral' 		=> $color_neutral,
			'color-grey' 			=> $color_grey,
			'font-headings' 		=> $font_headings,
			'font-main'				=> $font_main,
			'font-size-base' 		=> $font_size_base,
			'font-size-navbar'		=> $font_size_navbar,
			'font-size-preheader' 	=> $font_size_preheader,
			'font-size-footer'		=> $font_size_footer,
			'font-size-buttons'		=> $font_size_buttons
		));
		
	}
	
	wp_enqueue_style('ionicons','https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

}

add_action( 'wp_enqueue_scripts', 'ngaire_scripts' );

/**
 * Remove plugin styles and scripts
 */
function remove_plugin_scripts() {
	if(get_field('enable_developer_mode','options')) {
		wp_deregister_style( 'contact-form-7' );
	}
}

add_action('wp_print_styles', 'remove_plugin_scripts', 100);