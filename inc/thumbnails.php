<?php
/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'potrait-thumb', 476, 580, array( 'center', 'top' ) ); // Hard crop in the center
	add_image_size( 'post-thumb', 720, 520, array( 'center', 'center' ) ); // Hard crop in the center
	add_image_size( 'testimonial-thumb', 720, 360, array( 'center', 'center' ) ); // Hard crop in the center
	add_image_size( 'square-thumb', 520, 520, array( 'center', 'center' ) ); // Hard crop in the center
	add_image_size( 'square-thumb-small', 150, 150, array( 'center', 'center' ) ); // Hard crop in the center

function my_image_sizes($sizes) {
    $addsizes = array(
        "post-thumb" 		=> "Gallery Thumbnail",
		"square-thumb" 		=> "Square Thumbnail",
    );
    return array_merge($sizes, $addsizes);
}

add_filter('image_size_names_choose', 'my_image_sizes');


// Setup thumbnails for b-lazy

function modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {

    $id = get_post_thumbnail_id(); // gets the id of the current post_thumbnail (in the loop)
    $src = wp_get_attachment_image_src($id, $size); // gets the image url specific to the passed in size (aka. custom image size)
    $alt = get_the_title($id); // gets the post thumbnail title
    $class = isset($attr['class']) ? $attr['class'] : ''; // gets classes passed to the post thumbnail, defined here for easier function access

    // Check to see if a 'b-lazy' class exists in the array when calling "the_post_thumbnail()", if so output different <img/> html
    if (strpos($class, 'b-lazy') !== false) {
        $html = '<img src="' . $src[0] . '" data-src="' . $src[0] . '" alt="' . $alt . '" class="' . $class . '" />';
    } else {
        $html = '<img src="' . $src[0] . '" alt="' . $alt . '" class="' . $class . '" />';
    }

    return $html;
}

add_filter('post_thumbnail_html', 'modify_post_thumbnail_html', 99, 5);
