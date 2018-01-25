<?php /* Primary navigation */
$navbar_alignment = get_theme_mod('navbar_menu_alignment');

wp_nav_menu( array(
  'theme_location' => 'primary',
  'depth' => 2,
  'container' => false,
  'menu_class' => 'nav navbar-nav navbar__collapse mb0 navbar-nav__'.$navbar_alignment,
  //Process nav menu using our custom nav walker
  'walker' => new wp_bootstrap_navwalker(),
  )
);
?>

<div class="navbar__toggle">
    <button type="button" id="c-button--toggle" class="c-hamburger c-hamburger--htla c-button">
        <span class="sr-only">Toggle navigation</span>
        <span>toggle menu</span>
    </button>
</div>
							