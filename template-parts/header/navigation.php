<?php /* Primary navigation */
wp_nav_menu( array(
  'theme_location' => 'primary',
  'depth' => 2,
  'container' => false,
  'menu_class' => 'nav navbar-nav navbar__collapse navbar-nav__right no-margin-bottom',
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
							