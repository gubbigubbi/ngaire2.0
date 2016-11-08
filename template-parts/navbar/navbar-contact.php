<?php $contact_phone = get_field('contact_phone','options');
$contact_email = get_field('contact_email_address','options');
?>

<ul class="nav navbar-nav navbar-nav__left navbar-contact navbar-first no-margin-left">
						
    <?php if(get_field('office_address_short','options')): ?>
    <li class="nav-item">
        <i class="icon ion-ios-home-outline"></i>
        <?php echo get_field('office_address_short','options'); ?>
    </li>
    <?php endif; ?>
    
    <?php if(get_field('general_hours','options')): ?>
        <li class="nav-item">
            <i class="icon ion-clock"></i>
            <?php echo get_field('general_hours','options'); ?>
        </li>
    <?php endif; ?>
    
    <?php if($contact_phone): ?>
        <li class="nav-item">
            <a href="tel:<?php echo $contact_phone; ?>">
                <i class="icon ion-ios-telephone"></i> <?php echo $contact_phone; ?>
            </a>
        </li>
    <?php endif; ?>
    
  <?php if($contact_email): ?>
        <li class="nav-item">
            <a href="tel:<?php echo $contact_email; ?>">
                <i class="icon ion-ios-email"></i> <?php echo $contact_email; ?>
            </a>
        </li>
    <?php endif; ?>
                                   
    <?php if (class_exists('WooCommerce')) { ?>
        <?php global $woocommerce; ?>
        <li class="nav-item">
            <?php wp_loginout(); ?>
        </li>
    
        <li class="nav-item">
            <?php if(is_user_logged_in()) { ?>
                <a href="/my-account" title="<?php esc_attr_e('My Account', 'woocommerce'); ?>">
                    <i class="icon ion-person"></i> My Account
                </a>
            <?php } else { ?>
                <a href="/my-account" title="<?php esc_attr_e('My Account', 'woocommerce'); ?>">
                    <i class="icon ion-person-add"></i> Create Account
                </a>
            <?php } ?>
        </li>
        
        <li class="nav-item">
            <a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'woocommerce'); ?>">
                <i class="icon ion-ios-cart-outline"></i> <?php echo $woocommerce->cart->get_cart_total(); ?>
            </a>
        </li>
        
        <?php if ( $woocommerce->cart->get_cart_contents_count() !== 0 ):
            // Do something fun ?>
            <li class="nav-item">
                <a class="cart-checkout" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" title="<?php esc_attr_e('Checkout', 'woocommerce'); ?>">
                    <i class="icon ion-checkmark-round"></i> Checkout!
                </a>
            </li>
        <?php endif; ?>
    <?php } ?>
</ul>