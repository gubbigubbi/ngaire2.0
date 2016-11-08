<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ngaire2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		
		<div class="col-xs-12 col-lg-4">
			<div class="post-thumb-wrapper">
				<?php the_post_thumbnail('post-thumb', array('class' => 'b-lazy')); ?>
			</div>			
		</div>

		<div class="col-xs-12 col-lg-8">

			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title single-post-title">', '</h1>' );
				else :
					the_title( '<h2 class="h3 entry-title archive-single-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php
					the_excerpt();
					//( sprintf(
						/* translators: %s: Name of current post. */
						//wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ngaire-2-0' ), array( 'span' => array( 'class' => array() ) ) ),
						//the_title( '<span class="screen-reader-text">"', '"</span>', false )
					//) );
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ngaire-2-0' ),
						'after'  => '</div>',
					) );
				?>
			
				<?php if ( 'post' === get_post_type() ) : ?>
					<?php get_template_part('template-parts/post-meta'); ?>
				<?php
				endif; ?>
			
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->
