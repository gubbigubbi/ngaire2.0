<?php 
/**
 * Enqueue scripts and styles.
 */
function ngaire_scripts() {
	wp_enqueue_style( 'ngaire-2-0-style', get_stylesheet_uri() ); 

	if(get_field('enable_google_fonts','options')):
		$heading_font = str_replace(' ','+',get_field('headings_font','options'));
		$body_font = str_replace(' ','+',get_field('body_font','options'));
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family='.$heading_font.':400,700|'.$body_font.':400,700', false, false );
	endif; 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if(get_field('enable_developer_mode','options')) {
		wp_enqueue_script( 'all', get_template_directory_uri() . '/assets/js/all.min.js', array( 'jquery' ), false, true );
		//wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery', 'all' ), false, false );
		
		wp_localize_script( 'all', 'myAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		));

	} else {
		wp_enqueue_script( 'app-js', get_template_directory_uri() . '/src/js/app.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/src/js/vendor/custom.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ajax-query', get_template_directory_uri() . '/src/js/vendor/ajax-query.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ngaire-skip-link-focus-fix', get_template_directory_uri() . '/src/js/vendor/skip-link-focus-fix.js', array(), '20130115', true );   
		wp_enqueue_script( 'slide-menu', get_template_directory_uri() . '/src/js/vendor/slideMenu.js', array( 'jquery' ), false, true );
		//wp_enqueue_script( 'popup', get_template_directory_uri() . '/src/js/vendor/jquery.popupoverlay.js', array( 'jquery' ), false, true );
		//wp_enqueue_script('loading', get_template_directory_uri() . '/src/js/vendor/loadingoverlay.min.js', array( 'jquery' ), false, true);
		//wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/src/js/vendor/picturefill.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'slick', get_template_directory_uri().'/src/js/vendor/slick.js');	
		wp_enqueue_script( 'blazy', get_template_directory_uri().'/src/js/vendor/blazy.min.js', false, false, true);
		wp_enqueue_script( 'colorbox', get_template_directory_uri().'/src/js/vendor/jquery.colorbox.js', false, false, true);
		wp_enqueue_script('wow', get_template_directory_uri().'/src/js/vendor/wow.js');
		//wp_register_script( 'ajax-query', get_template_directory_uri() . '/src/js/vendor/ajax-query.js', array( 'jquery' ), false, true );
		wp_enqueue_script('bootstrap-util', get_template_directory_uri().'/src/js/vendor/bootstrap-util.js', false, false, true);
		wp_enqueue_script('bootstrap-dropdown', get_template_directory_uri().'/src/js/vendor/bootstrap-dropdown.js', false, false, true);
		wp_enqueue_script('bootstrap-modal', get_template_directory_uri().'/src/js/vendor/bootstrap-modal.js', false, false, true);
		wp_enqueue_script('bootstrap-button', get_template_directory_uri().'/src/js/vendor/bootstrap-button.js', false, false, true);
		wp_enqueue_script('isotope', get_template_directory_uri().'/src/js/vendor/isotope.pkgd.min.js', false, false, true);
		//wp_enqueue_script( 'director', get_template_directory_uri() . '/src/js/vendor/director.min.js', false, false, true );
		
		wp_localize_script( 'ajax-query', 'myAjax', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		));
		
		// Note for future development animate.css adds 80kB - could be reduced to styles likely to use
		wp_enqueue_style('animate','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
		


	}
	
	wp_enqueue_style('ionicons','http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

}

add_action( 'wp_enqueue_scripts', 'ngaire_scripts' );

/**
 * Remove plugin styles and scripts
 */
function remove_plugin_scripts() {
	if(get_field('enable_developer_mode','options')) {
		wp_deregister_style( 'siteorigin-panels-front' );
		wp_deregister_style( 'contact-form-7' );
	}
}

add_action('wp_print_styles', 'remove_plugin_scripts', 100);

