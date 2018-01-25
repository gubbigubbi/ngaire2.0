<div class="section-wrapper">
	<div class="section-header__shortcode">
		<div class="header-shortcode-wrapper">
			<?php
				$map_shortcode = get_field('header_shortcode');
				$map = do_shortcode($map_shortcode);
				echo $map;
			?>
		</div>
	</div>
	<?php if ( is_active_sidebar( 'after-header' ) ) : ?>
		<section class="section section__sidebar section---header">
			<div class="container">
				<?php dynamic_sidebar( 'after-header' ); ?>
			</div>
		</section>
	<?php endif; ?>	
</div>