<nav class="navbar navbar-preheader">
    <div class="navbar-inner">
        <div class="row middle-xs end-xs">
            <div class="col-xs">
                <?php global $woocommerce; ?>
                <ul class="nav navbar-nav pull-right">
                                    
                    <?php if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
                    
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
            </div>
        </div>
    </div>
</nav>