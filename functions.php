<?php
/**
 * ngaire2.0 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ngaire2.0
 */

if ( ! function_exists( 'nagaire_2_0_setup' ) ) :

 // Register Bootstrap Navigation Walker
include_once ('inc/wp_bootstrap_navwalker.php');
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nagaire_2_0_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ngaire2.0, use a find and replace
	 * to change 'nagaire-2-0' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nagaire-2-0', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'nagaire_2_0_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nagaire_2_0_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nagaire_2_0_content_width', 640 );
}
add_action( 'after_setup_theme', 'nagaire_2_0_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nagaire_2_0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nagaire-2-0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nagaire-2-0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nagaire_2_0_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory(). '/inc/register-scripts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Menus.
 */
require get_template_directory() . '/inc/menus.php';

/**
 * CPT's.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Modules.
 */
require get_template_directory() . '/inc/modules.php';

/**
 * Sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Thumbnails
 */
require get_template_directory() . '/inc/thumbnails.php';

/**
 * Woocommerce
 */
require get_template_directory() . '/inc/woocommerce.php';
