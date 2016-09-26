<?php
/**
 * Navigation template
 *
 * @package Ngaiire
 */
$contact_email = get_field('contact_email_address','options');
$contact_number = get_field('contact_phone','options');
?>

<nav id="c-menu--push-left" class="c-menu c-menu--push-left admin-bar__fix">
  <button class="c-menu__close button__block">&larr; Close Menu</button>
  <?php if($contact_email): ?>
    <div class="row internal">
      <div class="col-md-6">
        <a class="button button__primary c-menu__button button__block" ahref="mailto:<?php echo $contact_email; ?>">
          <span class="icon ion-ios-email-outline"></span>
        </a>
      </div>
      <div class="col-md-6">
        <a class="button button__primary c-menu__button button__block" ahref="tel:<?php echo $contact_number; ?>">
          <span class="icon ion-ios-telephone-outline"></span>
        </a>
      </div>
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