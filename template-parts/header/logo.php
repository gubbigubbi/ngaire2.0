<?php
$logo 		 = get_theme_mod( 'site_logo' );
$logo_mobile = get_theme_mod('site_logo_mobile') ? get_theme_mod('site_logo_mobile') : get_theme_mod( 'site_logo' );
$logo_align  = get_field('center_logo','options');

$myAppLogo = new appLogo($logo, $logo_mobile);
?>

<div class="logo <?php echo $logo_align; ?>">
    <?php if (get_theme_mod('site_logo')) { ?>

		<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home' class="logo-link">
			<?php if ( strpos( $logo, '.svg' ) !== false ) :
				echo $myAppLogo->outputSVG();
			else:
				echo $myAppLogo->outputNonSVG();
			endif; ?>		   
		</a>
		   

    <?php } else { ?>
        <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
		
		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description mt0 mb0"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
    <?php } ?>

</div>