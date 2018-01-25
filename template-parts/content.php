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

		<div class="entry-content row middle-md content-post-block">
			<div class="col-lg-2 col-md-3 col-xs-12">
				<?php the_post_thumbnail('square-thumb', array( 'class' => 'b-lazy image--circle border--image' )); ?>
			</div>
			<div class="col-lg col-md col-xs-12 mt1-xs">
				<header class="entry-header">
					<?php the_title('<h2 class="h4 mt0">','</h2>'); ?>
					<?php if ( 'post' === get_post_type() ) : ?>
						<?php get_template_part('template-parts/post-meta'); ?>
					<?php endif; ?>
				</header><!-- .entry-header -->  
				<p class="mb0"><?php echo get_the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" class="button button--primary mt2">Read More</a>
			</div>
		</div><!-- .entry-content -->
		
</article><!-- #post-## -->
