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
$navbar_position = get_field('navbar_position','options') ? get_field('navbar_position','options') : 'static';
$navbar_alignment = get_field('navbar_menu_alignment','options') ? get_field('navbar_menu_alignment','options') : 'left';
$show_socials = get_field('social_in_navbar','options') ? get_field('social_in_navbar','options') : '';
?>
<?php get_template_part("head"); ?>
<div id="o-wrapper" class="o-wrapper">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ngaire-2-0' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
			<?php get_field('show_preheader','options') AND get_template_part('template-parts/header/preheader'); ?>	
			<nav class="navbar navbar-primary navbar-static-top navbar-<?php echo $navbar_position; ?> navbar-is-at-top" role="navigation">
				<div class="navbar-inner">
					<div class="row middle-xs center-xs">
						<?php if($show_socials) { ?>
							<div class="col-lg-10 col-md-12 col-xs-12">
								<?php echo navbar_router($navbar_alignment); ?>
							</div>
							
							<div class="col-lg hidden-md nav-item__border-left">
								<?php echo do_shortcode('[socials alignment="left"]'); ?>
							</div>
						<?php } else { ?>
							<div class="col-lg-12 col-md-12 col-xs-12">
								<?php echo navbar_router($navbar_alignment); ?>
							</div>						
						<?php } ?>
					</div>
					<div class="search-bar form-small" style="display: none;">
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
	<?php echo header_router(get_field('header_type')); ?>
	<div id="content" class="site-content">
		<div class="row">
			<div class="col-xs inner-content">