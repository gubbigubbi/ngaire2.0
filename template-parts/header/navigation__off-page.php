<?php
/**
 * Navigation template
 *
 * @package Ngaiire
 */
$contact_email = get_theme_mod('contact_email_address');
$contact_number = get_theme_mod('contact_phone');
?>

<nav id="c-menu--slide-left" class="c-menu c-menu--slide-left admin-bar__fix">
  <button class="c-menu__close button--block"><i class="ion-arrow-left-c"></i> Close Menu</button>
  <?php if($contact_email || $contact_number): ?>
    <div class="row internal">
      <div class="col-xs">
        <a class="ga-trigger-email button button--primary c-menu__button button--block" href="mailto:<?php echo $contact_email; ?>">
          <span class="icon ion-ios-email-outline"></span>
        </a>
      </div>
      <?php if($contact_number): ?>
        <div class="col-xs">
          <a class="ga-trigger-call button button--primary c-menu__button button--block" href="tel:<?php echo $contact_number; ?>">
            <span class="icon ion-ios-telephone-outline"></span>
          </a>
        </div>
      <?php endif; ?>
    </div>

  <?php endif; ?>
  <?php wp_nav_menu( array('theme_location'   => 'mobile',
                           'menu_class' => 'c-menu__items',
                           'menu_id'    => '',
                           'container'  => '',
                           'depth'      => '2',
                           
                           )); ?>
</nav><!-- /slide menu left -->