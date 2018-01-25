<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ngaire2.0
 */
$preloader = get_field('enable_preloader','options');
?>
				</div><!-- .col-xs -->
			</div><!-- .row -->
		</div><!-- #content -->
	</div><!-- content-wrapper -->
	
	<?php if ( is_active_sidebar( 'after-section' ) ) : ?>
		<section class="section section__sidebar section--after-section">
			<div class="container">
				<?php dynamic_sidebar( 'after-section' ); ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'pre-footer-widget' ) ) : ?>
		<section class="section section__sidebar section__pre-footer">
			<div class="container">
				<?php dynamic_sidebar( 'pre-footer-widget' ); ?>
			</div>
		</section>
	<?php endif; ?>

	<footer id="colophon" class="site-footer section" role="contentinfo">
		<?php if (is_active_sidebar('footer-widget-1')): ?>
			<div class="footer-widget-area">
				<?php get_template_part('template-parts/footer/footer-widgets'); ?>
			</div>
		<?php endif; ?>
		
		<div class="site-info">
			<?php get_template_part('template-parts/footer/footer','site-info'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
</div><!-- o-wrapper -->

<?php if($preloader): ?>
	<div id="loader-wrapper">
		<div id="loader">
			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part('template-parts/footer/modal-footer'); ?>
<?php wp_footer();
get_template_part('template-parts/header/navigation__off-page'); 
//get_template_part('template-parts/header/navigation-shop'); 
?>
<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

</body>
</html>
