<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ngaire2.0
 */

get_header(); ?>

	<div id="primary" class="content-area content-area-content-single">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				$type = get_post_type();

				switch ($type) {
					case 'post':
						$type = 'single';
						break;
				}

				get_template_part( 'template-parts/content', $type );
				
				the_post_navigation( array(
					'prev_text'                  => __( '<i class="icon ion-arrow-left-c"></i> Go back to: %title' ),
					'next_text'                  => __( 'Next up: %title <i class="icon ion-arrow-right-c"></i>' ),
					'screen_reader_text' => __( 'Continue Reading' ),
				) );
	
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
	
			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

if(is_singular('foo')) {
	get_sidebar();
}

get_footer();
