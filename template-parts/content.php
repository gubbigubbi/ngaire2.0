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

		<div class="col-xs col-sm col-md col-sm-12">
			
			<div class="post-thumb-wrapper">
				<?php the_post_thumbnail('post-thumb'); ?>
			</div>
			
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
		
				if ( 'post' === get_post_type() ) : ?>
					<?php get_template_part('template-parts/post-meta'); ?>
				<?php
				endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nagaire-2-0' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nagaire-2-0' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php nagaire_2_0_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article><!-- #post-## -->
