<?php
add_action( 'wp_ajax_nopriv_loop_output', 'loop_output' );
add_action( 'wp_ajax_loop_output', 'loop_output' );

function loop_output() {
    
	$post_type = $_POST['query_type'];
    $post_ID = $_POST['postID'];
    
    $args = array (
        'post_type'              => $post_type,
        'post_status'            => 'publish',
        'posts_per_page'         => 1,
        'p'                      => $post_ID,
    );
    
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
	?>
    
        <?php the_field('pop_up_content'); ?>

    <?php wp_reset_query(); endwhile;
	die();
}