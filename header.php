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
$navbar_position = get_theme_mod('navbar_type') ? get_theme_mod('navbar_type') : 'static';
$navbar_alignment = get_theme_mod('navbar_menu_alignment') ? get_theme_mod('navbar_menu_alignment') : 'left';

?>
<?php get_template_part("head"); ?>

<div id="o-wrapper" class="o-wrapper">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ngaire-2-0' ); ?></a>
	<header id="masthead" class="site-header navbar-<?php echo $navbar_position; ?>" role="banner">
			<?php get_theme_mod('show_preheader') AND get_template_part('template-parts/header/preheader'); ?>	
			<nav class="navbar navbar-primary navbar-is-at-top" role="navigation">
				<div class="navbar-inner">
					<div class="row middle-xs center-xs">
						<div class="col-lg-12 col-md-12 col-xs-12">
							<?php echo navbar_router($navbar_alignment); ?>
						</div>						
					</div>
					<div class="search-bar" style="display: none;">
						<div class="search-bar-wrapper">
							<div class="row">
								<div class="col-xs-12">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
	</header><!-- #masthead -->
	<?php if(!is_home()):
	echo header_router(get_field('header_type')); 
	endif; ?>
	<div class="site-content-wrapper">
		<div id="content" class="site-content">
			<div class="row">
				<div class="col-xs inner-content">