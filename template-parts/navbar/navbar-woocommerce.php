<?php if (class_exists('WooCommerce')) { ?>
    <ul class="nav navbar-nav navbar-nav__right navbar__collapse no-margin-bottom navbar-contact navbar-first no-margin-left">                                   
        
            <?php global $woocommerce; ?>
            <li class="nav-item hidden">
                <?php wp_loginout(); ?>
            </li>
                
            <li class="nav-item">
                <a class="cart-customlocation" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                    Cart<span class="superset text--light small"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                        <div class="woocommerce-cart-tab woocommerce-cart-tab--has-contents"></div>
                    </span>
                </a>
            </li>   
        
    </ul>
<?php } ?>