<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ngaire2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
			<?php the_title('<h1 class="h2 mb1-2">','</h1>'); ?>
            <?php if ( 'post' === get_post_type() ) : ?>
                <?php get_template_part('template-parts/post-meta'); ?>
            <?php
            endif; ?>
		</header><!-- .entry-header -->            

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ngaire-2-0' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ngaire-2-0' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
</article><!-- #post-## -->