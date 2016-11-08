<nav class="navbar navbar-preheader hidden-xs">
    <div class="navbar-inner">
        <div class="row middle-xs">
			
			<?php if ( is_active_sidebar( 'pre-header' ) ) : ?>
				<div class="col-md-8 col-xs hidden-sm">
					<?php dynamic_sidebar( 'pre-header' ); ?>
				</div>
				<div class="col-md-4 col-xs end-xs">
					<?php echo do_shortcode('[socials alignment="right"]'); ?> 	
				</div>
			<?php else: ?>			
				<div class="col-md col-xs end-xs">
					<?php get_template_part('template-parts/navbar/navbar','contact'); ?>
					<?php /* Primary navigation */
					if ( has_nav_menu('pre_header')):
						wp_nav_menu( array(
						  'theme_location' => 'pre_header',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'nav navbar-nav navbar-contact',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker(),
						  )
						);
					endif;
					?>
					
					<?php echo do_shortcode('[socials alignment="right"]'); ?>  
				</div>
			<?php endif; ?>
        </div>
    </div>
</nav>