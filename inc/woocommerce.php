<?php

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { 
			return true; } 
		else { 
				return false; }
	}
}

// if woocommerce isnt enabled, deactivate the conditionals
if(!is_woocommerce_activated()) {
	function is_product_category() {
		return false;
	}
	function is_shop() {
		return false;
	}
}

if(is_woocommerce_activated()) {
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

	// Remove each style one by one
	add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
	function jk_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
		return $enqueue_styles;
	}

	// Put the tabs below the description
	//remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
	//add_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs',60);

	// Custom Fields

	// Display Fields
	add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

	// Save Fields
	add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

	function woo_add_custom_general_fields() {
	global $woocommerce, $post;
	echo '<div class="options_group">';
		
		// Text Field
		woocommerce_wp_text_input( 
			array( 
				'id'          => '_product_link',
				'label'       => __( 'Product Link', 'woocommerce' ), 
				'placeholder' => "",
				'desc_tip'    => 'true',
				'description' => __( 'If selling through a 3rd part enter link here', 'woocommerce' ) 
			)
		);
		
	echo '</div>';	

	echo '<div class="options_group">';
		
		// Text Field
		woocommerce_wp_text_input( 
			array( 
				'id'          => '_product_callout_text',
				'label'       => __( 'Callout Text', 'woocommerce' ), 
				'placeholder' => "",
				'desc_tip'    => 'true',
				'description' => __( 'Enter the callout text which shows on the product on hover', 'woocommerce' ) 
			)
		);
		
	echo '</div>';	
	}

	function woo_add_custom_general_fields_save( $post_id ){

		$woocommerce_text_field = $_POST['_product_link'];
		$woocommerce_callout_field = $_POST['_product_callout_text'];
		if( !empty( $woocommerce_text_field ) && !empty( $woocommerce_callout_field ) )
			update_post_meta( $post_id, '_product_link', esc_attr( $woocommerce_text_field ) );
			update_post_meta( $post_id, '_product_callout_text', esc_attr( $woocommerce_callout_field ) );
	}

	add_action('woocommerce_single_product_summary','woocommerce_custom_product_link',55);

	function woocommerce_custom_product_link() {
		global $post;
		$product_link = get_post_meta( $post->ID, '_product_link', true);
		if (!$product_link) {
			return false;
		}
		echo '<a href="'.$product_link.'" class="button button--primary offset-top">Shop Now</a>';
	}

	// Archives
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	// Single


	// AJAX add to cart
	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php).
	// Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start();
		
		?>
		<a class="cart-customlocation" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
			Cart<span class="superset text--light small"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
				<div class="woocommerce-cart-tab woocommerce-cart-tab--has-contents"></div>
			</span>
		</a>
		<?php
		
		$fragments['a.cart-customlocation'] = ob_get_clean();
		return $fragments;
		
	}
} else {
	function is_product() {
		return false;
	}
}

// Add support for the gallery

add_action( 'after_setup_theme', 'yourtheme_setup' );
 
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/* This snippet removes the action that inserts thumbnails to products in teh loop
 * and re-adds the function customized with our wrapper in it.
 * Rhys Clay added the ability to have a hover effect on the thumbnails
 *
 * @original plugin: WooCommerce
 * @author of snippet: Michal Cerny / Rhys Clay
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;
        
        if ( has_post_thumbnail() ) {
            
            if (!get_post_meta($post->ID, '_product_callout_text', 'true')):           
                $output .= get_the_post_thumbnail( $post->ID, $size );
            else:
            
            $callout_text = stripcslashes(get_post_meta( $post->ID, '_product_callout_text', true));
            $currentpage = $_SERVER['REQUEST_URI'];
            
            $output .= '<div class="post-thumb">';
                $output .= '<div class="post-thumb-wrapper hide-img-on-hover">';
                    $output .= get_the_post_thumbnail( $post->ID, $size );
                    $output .= '<div class="post-thumb-wrapper-overlay">';
                        $output .= '<span>';
                            if($currentpage == '/') {
                                $output .= '<h2 class="text-center typo-highlight">'.$callout_text.'</h2>';
                            } else {
                                $output .= '<button class="button">View Detail</button>';    
                            }
                        $output .= '</span>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            

            endif;
        }                       
        return $output;
    }
}

// turn off ship to a different address
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

// remove breadcrumbs
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
