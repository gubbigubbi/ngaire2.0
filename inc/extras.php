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
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings Settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Allow SVG's
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

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

 
    if ( $show_sidebar || is_singular('post') || is_singular('trainer') || is_singular('class') || is_singular('team') || is_singular('portfolio') || is_singular('service') || is_search() || is_archive() && !is_post_type_archive() ) {
        $classes[] = 'layout-content-sidebar';
    }
	
	if ( !$show_sidebar || is_404() || is_search() || is_archive() && !is_post_type_archive() ) {
		$classes[] = 'content-only';
	}
	
	//if ( is_singular('service') ) {
		//$classes[] = 'layout-full-width';
	//}
	
    return $classes;
     
}

// Header Router
function header_router($header_type) {

	if($header_type == 'none') {
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
	if ($navbar_type == 'navbar-center') {
		get_template_part('template-parts/navbar/navbar-center');
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
		$title = !is_home() ? get_the_title( $post->ID ) : get_the_title( get_option('page_for_posts', true));
		echo '<header class="entry-header">';
			echo '<h1 class="h2 entry-title">'.$title.'</h1>';
		echo '</header><!-- .entry-header -->';
	}
}

add_action('header_content','page_title');

/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
 
function et_excerpt_more($more) {
    global $post;
    return '<div><a class="small" href="'. get_permalink($post->ID) . '">View Full Post &rarr;</a></div>';
}
add_filter('excerpt_more', 'et_excerpt_more');
