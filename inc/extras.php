<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ngaire2.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nagaire_2_0_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( get_field('page_background_image') || is_home() ) {
		$classes[] = 'bg-image';
	}

	return $classes;
}
add_filter( 'body_class', 'nagaire_2_0_body_classes' );

/** Setup Options Pages **/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Wordpress Emoticons
if(!get_field('enable_emoticons','options')) {
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function yst_remove_smileys($bool) {
	return false;
}

add_filter('option_use_smilies','yst_remove_smileys',99,1);

}

/**
 * Coming Soon Mode
 */
if ( ! is_user_logged_in() && get_field('coming_soon_mode','options') ) {
	add_filter( 'body_class','my_body_classes' );
	function my_body_classes( $classes ) {
		$classes[] = 'preview';	 
		return $classes;	 
	}
}
 
add_action( 'template_redirect', function() {
	if ( ! is_user_logged_in() && get_field('coming_soon_mode','options') ) {

		get_template_part("head");
		get_template_part('template-parts/preview');
		exit();
	}
});

// Body Classes
add_filter( 'body_class','halfhalf_body_class' );
function halfhalf_body_class( $classes ) {
	
	global $post;
	$show_sidebar = get_post_meta( $post->ID, 'page_options_show_sidebar', true );

 
    if ( $show_sidebar ) {
        $classes[] = 'layout-content-sidebar';
    } else {
		$classes[] = 'content-only';
	}
	
	//if ( is_singular('service') ) {
		//$classes[] = 'layout-full-width';
	//}
	
	$classes[] = 'header-'.get_field('header_type');
	$classes[] = 'navbar-'.get_theme_mod('navbar_menu_alignment');
	$classes[] = 'logo-'.get_theme_mod('logo_position');
	$classes[] = get_theme_mod('social_in_navbar') ? 'show-socials-navbar' : '';
    return $classes;
     
}

// Header Router
function header_router($header_type) {

	if($header_type == 'none' || is_product() || is_product_category() || is_shop() || is_singular('post')) {
		return; // I'm out bitches
	}
	
	if(isset($header_type)) {
		get_template_part('template-parts/header/header',$header_type);	
	} else {
		get_template_part('template-parts/header/header-text-only');
	}
}

// Navbar Router
function navbar_router($navbar_type) {

	// Use the navbar left template if the alignment is right, css will style
	if($navbar_type == 'right') {
		$navbar_type = 'left';
	} 

	if($navbar_type) {
		get_template_part('template-parts/navbar/navbar',$navbar_type);	
	} else {
		get_template_part('template-parts/navbar/navbar-left');
	}
}

function page_title() {

	$content = get_field('header_content');
	
	global $post;
	if($content) {
		echo '<span class="section-header__title">'.$content.'</span>';
	} else {
		if(is_shop()) {
			$title = 'Shop';
		} else if(!is_home()) {
			$title = get_the_title( $post->ID );
		} else {
			$title = get_field( 'header_content', get_option('page_for_posts', true));
		}
		echo '<header class="entry-header">';
			echo '<h1 class="mt0 h2">'.$title.'</h1>';
		echo '</header><!-- .entry-header -->';
	}
}

add_action('header_content','page_title');

// Remove tax label before title

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
 
function et_excerpt_more($more) {
    global $post;
	if ('foo' == get_post_type()):
    	return '<div><a class="small" href="'. get_permalink($post->ID) . '">View Full Post &rarr;</a></div>';
	endif;
}
add_filter('excerpt_more', 'et_excerpt_more');

// Post thumbnails for single

function show_single_thumbnail() {
	
	$post_type = get_post_type();

	if($post_type == 'team') {
		return the_post_thumbnail('square-thumb', ['class' => 'image--circle']);
	} else {
		return the_post_thumbnail('post-thumb');
	}
}

/*
 * Prepend Facebook, Twitter and Google+ social share buttons to the post's content
 *
 */
function add_share_buttons_before_content() {

    global $post;

    // Get the post's URL that will be shared
    $post_url   = urlencode( esc_url( get_permalink($post->ID) ) );
    
    // Get the post's title
    $post_title = urlencode( $post->post_title );
	$post_content = urlencode ( get_the_excerpt( $post->ID ) );
	$image_url = urlencode( get_the_post_thumbnail_url($post->ID) );

    // Compose the share links for Facebook, Twitter and Google+
    $facebook_link    = sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%1$s', $post_url );
    $twitter_link     = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title );
    $google_plus_link = sprintf( 'https://plus.google.com/share?url=%1$s', $post_url );
	$pinterest_link   = 'http://pinterest.com/pin/create/button/?url=' . $post_url . '&media=' . $image_url . '&description=' . $post_content . '';

    // Wrap the buttons
    $output = '<ul class="list-unstyled ml0 mb0 list-inline" id="share-buttons">';
        // Add the links inside the wrapper
        $output .= '<li class="d-inline-block"><a class="h6" target="_blank" href="' . $facebook_link . '"><span class=" d-inline-block v-align-middle text--dark big icon ion-social-facebook"></span> Share</a></li>';
        $output .= '<li class="d-inline-block"><a class="h6" target="_blank" href="' . $twitter_link . '"><span class=" d-inline-block v-align-middle text--dark big icon ion-social-twitter"></span> Tweet</a></li>';
		$output .= '<li class="d-inline-block"><a class="h6" target="_blank" href="' . $pinterest_link . '"><span class=" d-inline-block v-align-middle text--dark big icon ion-social-pinterest"></span> Pin</a></li>';
	$output .= '</ul>';

    // Return the buttons and the original content
    return $output;

}
