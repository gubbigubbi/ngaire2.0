<?php
/**
 * Navigation template
 *
 * @package Ngaiire
 */
$contact_email = get_field('contact_email_address','options');
?>

<nav id="c-menu--push-left" class="c-menu c-menu--push-left admin-bar__fix">
  <button class="c-menu__close button__block">&larr; Close Menu</button>
  <?php if($contact_email): ?>
  <div class="col-md">
    <a class="button button__primary button__block c-menu__button" ahref="mailto:<?php echo $contact_email; ?>">
      <span class="icon ion-ios-email-outline"></span> <?php echo $contact_email; ?>
    </a>
  </div>
  <?php endif; ?>
  <?php wp_nav_menu( array('theme_location'   => 'mobile',
                           'menu_class' => 'c-menu__items',
                           'menu_id'    => '',
                           'container'  => '',
                           'depth'      => '1',
                           
                           )); ?>
</nav><!-- /slide menu left -->

<div id="c-mask" class="c-mask"></div><!-- /c-mask -->