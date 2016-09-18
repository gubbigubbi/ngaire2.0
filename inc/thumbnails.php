<?php
/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'post-thumb', 720, 600, array( 'center', 'center' ) ); // Hard crop in the center
	add_image_size( 'testimonial-thumb', 720, 360, array( 'center', 'center' ) ); // Hard crop in the center

function my_image_sizes($sizes) {
    $addsizes = array(
        "post-thumb" => "Gallery Thumbnail",
    );
    return array_merge($sizes, $addsizes);
}

add_filter('image_size_names_choose', 'my_image_sizes');
