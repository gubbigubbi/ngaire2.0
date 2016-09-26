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

?>
			</div><!-- .col-xs -->
		</div><!-- .row -->
	</div><!-- #content -->
	
	<?php if ( is_active_sidebar( 'after-section' ) ) : ?>
		<section class="section section__sidebar block__white">
			<div class="container">
				<?php dynamic_sidebar( 'after-section' ); ?>
			</div>
		</section>
	<?php endif; ?>

	<footer id="colophon" class="site-footer section" role="contentinfo">
		<div class="footer-widget-area">
			<?php get_template_part('template-parts/footer/footer-widgets'); ?>
		</div>
		
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-xs">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'nagaire-2-0' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'nagaire-2-0' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'nagaire-2-0' ), 'nagaire-2-0', '<a href="http://breezydesigns.com.au" rel="designer">Rhys Clay</a>' ); ?>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->
</div><!-- o-wrapper -->

<?php get_template_part('template-parts/footer/modal-footer'); ?>
<?php wp_footer();
get_template_part('template-parts/header/navigation__off-page'); 
?>

</body>
</html>
