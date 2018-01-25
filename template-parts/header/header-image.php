<?php 

if (is_tax()) {
 
    $term = get_queried_object();
    //var_dump($term);
    $term = $term->taxonomy . '_' . $term->term_id;
 
    $header_image = get_field('header_image', $term);

    // and the image size you want to return
    $image_size = 'full';
    // use wp_get_attachment_image_src to return an array containing the image
    // we'll pass in the $image_id in the first parameter
    // and the image size registered using add_image_size() in the second
    $image_array = wp_get_attachment_image_src($header_image, $image_size);
    // finally, extract and store the URL from $image_array
    $header_image = $image_array[0];
} elseif(is_singular() && !is_page() && !is_singular('service')) {
    $header = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    $header_image = $header[0];
} else {

    $header_image = get_field('header_image');
}

?>

<div class="section-wrapper">
    <div class="section-header__wrapper">
        <section class="section-header section-header--image <?php echo $parallax_option; ?> b-lazy" data-src="<?php echo $header_image; ?>">
            <div class="video-overlay">
        
                <div class="container animated fadeInUp stagger-2">
                    <div>
                        <?php if(!is_tax())
                        do_action('header_content'); ?>
                    </div>
                </div>
        
            </div>
        </section>
        <?php if ( is_active_sidebar( 'after-header' ) ) : ?>
            <section class="section section__sidebar section---header">
                <div class="container">
                    <?php dynamic_sidebar( 'after-header' ); ?>
                </div>
            </section>
        <?php endif; ?>	
    </div>
</div>