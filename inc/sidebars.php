<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ngaiire_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ngaiire' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title-wrapper"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Widget 1',
		'id'            => 'footer-widget-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Widget 2',
		'id'            => 'footer-widget-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
    register_sidebar( array(
        'name'          => 'Footer Widget 3',
        'id'            => 'footer-widget-3',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
	
    register_sidebar( array(
        'name'          => 'Footer Widget 4',
        'id'            => 'footer-widget-4',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
	
	register_sidebar( array(
		'name'          => 'After Footer Widget',
		'id'            => 'after-footer-widget',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	
	
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => 'Shop Sidebar',
			'id'            => 'shop-sidebar',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title-wrapper"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		) );
	} 
	
}
add_action( 'widgets_init', 'ngaiire_widgets_init' );



/**
 * Add Widget Areas
 */
// Register Sidebars
function custom_sidebars() {

	$args = array(
		'id'            => 'pre-header',
		'name'          => __( 'Pre-Header', 'text_domain' ),
		'description'   => __( 'Widget Area showed before the header', 'text_domain' ),
		'before_title'  => '<p class="h4">',
		'after_title'   => '</p>',
		'before_widget' => '<div id="%1$s" class="widget widget_text">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'after-section',
		'name'          => __( 'After Section', 'text_domain' ),
		'description'   => __( 'Widget area shown after sections if enabled', 'text_domain' ),
		'before_title'  => '<h4 class="h3 widget-title">',
		'after_title'   => '</h4>',
		'before_widget' => '<div id="%1$s" class="widget widget_text">',
		'after_widget'  => '</div>',
	);
    
	register_sidebar( $args );
    
	$args = array(
		'id'            => 'pages-sidebar',
		'name'          => __( 'Pages Sidebar', 'text_domain' ),
		'description'   => __( 'Widget area shown on sidebar if enabled', 'text_domain' ),
		'before_title'  => '<div class="widget-title-wrapper"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget widget_text">',
		'after_widget'  => '</div>',
	);
    
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );