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
		wp_enqueue_script( 'all', get_template_directory_uri() . '/dist/js/all.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array( 'jquery', 'all' ), false, false );
		
	} else {
		wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ngaire-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );   
		wp_enqueue_script( 'slide-menu', get_template_directory_uri() . '/js/slideMenu.js', array( 'jquery' ), false, true );
		//wp_enqueue_script( 'popup', get_template_directory_uri() . '/js/jquery.popupoverlay.js', array( 'jquery' ), false, true );
		//wp_enqueue_script('loading', get_template_directory_uri() . '/js/loadingoverlay.min.js', array( 'jquery' ), false, true);
		//wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.js');	
		wp_enqueue_script( 'blazy', get_template_directory_uri().'/js/blazy.min.js', false, false, true);
		//wp_enqueue_script( 'colorbox', get_template_directory_uri().'/js/jquery.colorbox.js', false, false, true);
		wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.js');
		//wp_register_script( 'ajax-query', get_template_directory_uri() . '/js/ajax-query.js', array( 'jquery' ), false, true );
		wp_enqueue_script('bootstrap-dropdown', get_template_directory_uri().'/js/bootstrap-dropdown.js', false, false, true);
	}
	
	// Note for future development animate.css adds 80kB - could be reduced to styles likely to use
	wp_enqueue_style('animate','https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
	wp_enqueue_style('ionicons','http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

}

add_action( 'wp_enqueue_scripts', 'ngaire_scripts' );

/**
 * Remove plugin styles and scripts
 */
function remove_plugin_scripts() {

}

add_action('wp_print_styles', 'remove_plugin_scripts', 100);

/**
 * B Lazy setup
 */
function modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
    $id = get_post_thumbnail_id(); // gets the id of the current post_thumbnail (in the loop)
    $src = wp_get_attachment_image_src($id, $size); // gets the image url specific to the passed in size (aka. custom image size)
    $alt = get_the_title($id); // gets the post thumbnail title
    //$class = $attr['class']; // gets classes passed to the post thumbnail, defined here for easier function access

    // Check to see if a 'retina' class exists in the array when calling "the_post_thumbnail()", if so output different <img/> html

    $html = '<img src="' . $src[0] . '" data-src="' . $src[0] . '" data-alt="' . $alt . '" class="b-lazy ' . $class . '" />';

    return $html;
}
//add_filter('post_thumbnail_html', 'modify_post_thumbnail_html', 99, 5);