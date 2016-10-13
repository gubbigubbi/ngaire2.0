<?php

$logo = get_theme_mod( 'site_logo' );
$logo_mobile = get_theme_mod('site_logo_mobile') ? get_theme_mod('site_logo_mobile') : get_theme_mod( 'site_logo' );
$logo_align = get_field('center_logo','options');

class appLogo {
	
    function __construct($logo, $logo_mobile) { // constructors
		$this->logo = $logo;
		$this->logo_mobile = $logo_mobile;
	}
	
	function outputSVG() {
		$logo = str_replace( site_url(), '', $this->logo);
			include(ABSPATH . $logo);
		return $output;
	}
	
	function outputNonSVG() {
	
		$output = '';
		$output .= '<picture>';
			$output .= '<!--[if IE 9]><video style="display: none;"><![endif]-->';
			$output .= '<source srcset="'.$this->logo.'" media="(min-width: 1200px)">';				
			$output .= '<!--[if IE 9]></video><![endif]-->';
			$output .= '<img srcset="'.$this->logo_mobile.'">';
		$output .= '</picture>';
		
		return $output;
	}
}

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
        <h1 class="h4 site-title no-margin-bottom">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
		
		<?php $description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description no-margin-top no-margin-bottom"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif; ?>
    <?php } ?>

</div>