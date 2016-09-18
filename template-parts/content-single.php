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
	<div class="row">
        
        <header class="entry-header col-md-12">
            <?php
            if ( is_single() ) :
                the_title( '<h1 class="h3 entry-title no-margin">', '</h1>' );
            else :
                the_title( '<h2 class="h3 entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; ?>

			<?php the_post_thumbnail('post-thumb'); ?>
            
            <?php if ( 'post' === get_post_type() ) : ?>
                <?php get_template_part('template-parts/post-meta'); ?>
            <?php
            endif; ?>
		</header><!-- .entry-header -->            

		<div class="col-md-12">
		
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