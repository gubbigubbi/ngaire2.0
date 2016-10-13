<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ngaire2.0
 */

?>
<?php get_template_part("head"); ?>
<div id="o-wrapper" class="o-wrapper">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nagaire-2-0' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
			<?php get_field('show_preheader','options') AND get_template_part('template-parts/header/preheader'); ?>	
			<nav class="navbar navbar-primary navbar-static-top" role="navigation">
				<div class="navbar-inner">
					<div class="row middle-xs center-xs start-sm">
						<div class="col-xs-8 col-sm-8 col-md-6 col-lg-4 col-xl-4 site-branding">
							<?php get_template_part('template-parts/header/logo'); ?>
						</div><!-- .site-branding -->
					
						<div class="col-xs-4 col-sm-4 col-md-6 col-lg-8 col-xl-8">
							<?php /* Primary navigation */
							wp_nav_menu( array(
							  'theme_location' => 'primary',
							  'depth' => 2,
							  'container' => false,
							  'menu_class' => 'nav navbar-nav navbar__collapse',
							  //Process nav menu using our custom nav walker
							  'walker' => new wp_bootstrap_navwalker(),
							  )
							);
							?>
							
							<div class="navbar__toggle">
								<button type="button" id="c-button--push-left" class="c-hamburger c-hamburger--htla c-button">
									<span class="sr-only">Toggle navigation</span>
									<span>toggle menu</span>
								</button>
							</div>
							
						</div>

					</div>
				</div>
			</nav>
	</header><!-- #masthead -->
	<?php echo header_router(get_field('header_type')); ?>
	<div id="content" class="site-content">
		<div class="row">
			<div class="col-xs">