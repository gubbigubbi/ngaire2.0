<?php 
class single_portfolio {   
    function __construct($thumb_url, $thumbnail_classes) {
        $this->thumb_url = $thumb_url;
        $this->thumbnail_classes = $thumbnail_classes;
    }
    function return_html() {
        
            $portfolio_link = get_field('portfolio_link') ? get_field('portfolio_link') : get_the_permalink();
        
            $html_output .= '<a href="'.$portfolio_link.'">';
            $html_output .= '<div class="post-thumb">';
                $html_output .= '<div class="post-thumb-wrapper text-center hide-img-on-hover">';
                    $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
                    $html_output .= '<div class="post-thumb-wrapper-overlay">';
                    $html_output .= '<span><h4 class="text-uppercase no-margin-top">'.get_the_title().'</h4>';
                    $html_output .= '<p class="block__link"><span class="ion-plus-circled"></span></p></span>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
            $html_output .= '</div>';
            $html_output .= '</a>';
        return $html_output;
    }   
}

class single_post extends single_portfolio {
    function return_html() {
            if (!has_post_thumbnail($post->ID)) {
                $thumb_wrapper = 'no-post-thumb';
            }
            $html_output .= '<div class="row '.$thumb_wrapper.'">';
        
                $html_output .= '<div class="block__img-wrapper col-md-3 col-sm-12 col-xs offset-top-sm">';
                    $html_output .= has_post_thumbnail($post->ID) ? get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes)) : '';
                $html_output .= '</div>';
                
                $html_output .= '<div class="block__text-wrapper col-md-9 col-sm-12 col-xs offset-top-sm">';
                    $html_output .= '<h4 class="h4 no-margin-bottom">'.get_the_title().'</h4>';
                    $html_output .= '<p class="no-margin-top">'.get_the_excerpt().'</p>';
                    $html_output .= '<a href="'.get_the_permalink().'">Read more</a>';
                $html_output .= '</div>';
            $html_output .= '</div>';

        return $html_output;
    } 
}

class single_service extends single_portfolio {
    function return_html() {
        $html_output .= '<a class="block__content">';
            $html_output .= '<i class="calculator-icon icon '.get_field('service_icon').'"></i>';
            $html_output .= '<p>'.get_the_title().'</p>';
        $html_output .= '</a>';
        
        return $html_output;        
    }
}

class single_team extends single_portfolio {
    function return_html() {
        
        global $post;
        $post_type = get_post_type($post->ID);

        $position = get_post_meta($post->ID, 'custom_meta_team_position', true);
        $linkedin = get_post_meta($post->ID, 'custom_meta_team_linkedin', true);
        $email = get_post_meta($post->ID, 'custom_meta_team_email', true);
        
            $html_output .= get_the_post_thumbnail($post->ID, 'testimonial-thumb', array('class' => $this->thumbnail_classes));
            $html_output .= '<div class="block__content">';
                $html_output .= '<h4 class="no-margin-bottom">'.get_the_title().'</h4>';
                $html_output .= '<p>'.$position.'</p>';
                if($linkedin) {
                    $html_output .= '<a style="margin-right: 0.5em" href="'.$linkedin.'"><span class="icon-left icon ion-social-linkedin-outline"></span>LinkedIn</a>';
                }
                if($email) {
                    $html_output .= '<a href="'.$email.'"><span class="icon-left icon ion-email-unread"></span>Email</a>';
                }
                $html_output .= '<hr></hr>';
                $html_output .= get_the_excerpt();
                $html_output .= '<hr></hr>';
            $html_output .= '</div>';

        return $html_output;        
    }
}

class single_class extends single_portfolio {
    function return_html() {
        global $post;
        $class_time = get_post_meta($post->ID, 'custom_meta_class_hours', true);
        
        $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
        $html_output .= '<div class="block__content">';
            $html_output .= '<a href="'.get_the_permalink().'"><h4>'.get_the_title().'</h4></a>';
            $html_output .= '<p><strong>';
            $html_output .= $class_time;
            $html_output .= '</strong></p>';
            $html_output .= get_the_excerpt();
        $html_output .= '</div>';
        return $html_output;        
    }
}

class single_special extends single_portfolio {
    function return_html() {

        $html_output .= '<div class="block__content">';
            $html_output .= '<h3 class="h2 text__light">'.get_the_title().'</h3>';
            $html_output .= '<p>'.get_the_content().'</p>';
            $html_output .= '<p>*terms and conditions apply</p>';
            $html_output .= '<button class="button button__primary ajax-query" data-loading-text="<i class=\'icon icon-spin ion-aperture icon-animated\'></i> Loading" data-type="'.get_post_type().'" data-id="'.get_the_ID().'" data-offer="'.get_the_title().'">Apply Now</button>';
        $html_output .= '</div>';
        
        return $html_output;        
    }
}

class single_membership extends single_portfolio {
    function return_html() {

        global $post;
        $html_output .= '<div class="block__content">';
            $html_output .= '<h3 class="h2 text__light">'.get_the_title().'</h3>';
            $html_output .= '<p class="h4">'.get_the_content().'</p>';
            $html_output .= '<button class="button button__primary ajax-query" data-loading-text="<i class=\'icon icon-spin ion-aperture icon-animated\'></i> Loading" data-type="'.get_post_type().'" data-id="'.get_the_ID().'" data-offer="'.get_the_title().'">Join Now</button>'; 
            $html_output .= '<p>'.get_post_meta($post->ID, 'custom_meta_membership_payment_conditions', true).'</p>';
        $html_output .= '</div>';
        
        return $html_output;        
    }
}

class single_testimonial extends single_portfolio {
    function return_html() {
        
        $html_output .= '<div class="row">';
 
            $html_output .= '<div class="col-xs-12">';
                $html_output .= '<p><i>'.get_the_content().'</i></p>';
                $html_output .= '<p class="strong small">- '.get_the_title().'</p>';
                //$html_output .= '<a class="button button__primary" href="'.get_the_permalink().'">Read more</a>';
            $html_output .= '</div>';
            
            if(has_post_thumbnail($post->ID)) {
                $html_output .= '<div class="col-xs-12">';
                    $html_output .= '<div class="row middle-xs">';
                        $html_output .= '<div class="col-xs-4">';
                            $html_output .= get_the_post_thumbnail($post->ID, 'thumb', array('class' => $this->thumbnail_classes));
                        $html_output .= '</div>';
                        $html_output .= '<div class="col-xs-8">';
                            $html_output .= '<h4>'.get_the_title().'</h4>';
                        $html_output .= '</div>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
            }
            
        $html_output .= '</div>';
        return $html_output;        
    }
}


function ngaire_post_type_loop($atts) {
    $output = '';
    $i = 1;
    $shortcode_atts = shortcode_atts( array(
            'type'            => 'portfolio',
            'number'          => '6',
            'cols'            => '3',
            'class'           => '',
            'animation'       => '',
            'block-class'     => '',
            'thumbnail-class' => '',
            'iso-taxonomy'    => '',

    ), $atts);
    
    $post_type = $shortcode_atts['type'];

    $thumbnail_classes = 'b-lazy img__post-block '.$shortcode_atts['thumbnail-class'];

    // WP_Query arguments
    $args = array (
        'post_type'              => array( $post_type ),
        'posts_per_page'         => $shortcode_atts['number'],
    );
    
    $iso_class = $shortcode_atts['iso-taxonomy'];

    // The Query
    $query = new WP_Query( $args );
    
    if($query->have_posts()):
     $cols = $shortcode_atts['cols'];
        $grid_cols = 12 / $cols;
        $output .= '<div class="row hentry-offset '.$shortcode_atts['class'].'">';
    
        $animation = $shortcode_atts['animation'];
        $count = $query->post_count;

        while ($query->have_posts()) : $query->the_post();
        
            if ($iso_class) {
                $tax_terms = '';
                $terms = wp_get_post_terms( $query->post->ID, $iso_class );
                foreach ($terms as $term) {
                    $tax_terms .= $term->slug.' ';
                }
            }
        
            if($i == ($cols+1)) { $i = 1; }
            $animation_stagger = animation_stagger($i);
            $output .= '<div class="col-lg-'.$grid_cols.' col-md-6 col-sm-12 col-xs-12 wow '.$animation.' '.$animation_stagger.' offset-bottom '.$tax_terms.'">';
                $output .= '<div class="'.$post_type.'-block hentry">';
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    $thumb_url = $thumb_url_array[0];
                    $block_class = $shortcode_atts['block-class'];
                    
                    switch($post_type) {
                        case 'portfolio':
                        case 'service':
                        case 'product':
                            $newObj = new single_portfolio($thumb_url, $thumbnail_classes);
                        break;
                        case 'post':
                            $newObj = new single_post($thumb_url, $thumbnail_classes);
                        break;                                               
                        case 'team':
                        case 'trainer':
                            $newObj = new single_team($thumb_url, $thumbnail_classes);
                        break;
                        case 'testimonial':
                            $newObj = new single_testimonial($thumb_url, $thumbnail_classes);
                        break;
                        case 'class':
                            $newObj = new single_class($thumb_url, $thumbnail_classes);
                        break;
                        case 'special':
                            $newObj = new single_special($thumb_url, $thumbnail_classes);
                        break;
                        case 'membership':
                            $newObj = new single_membership($thumb_url, $thumbnail_classes);
                        break;
                        case 'challenge':
                            $newObj = new single_challenge($thumb_url, $thumbnail_classes);
                        break;                            
                    }
                    
                    $output .= $newObj->return_html();
                $output .= '</div>';
            $output .= '</div>';
        $i++; endwhile; wp_reset_query();

        $output .= '</div>';
    endif;
    return $output;
}

function animation_stagger($i) {
    return "stagger-{$i}";   
}

function socials_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
            'alignment'      => 'left',

    ), $atts);

    $classes = 'icon fw';
    $output = '';
    
    $twitter_url = get_theme_mod('twitter_url') ? get_theme_mod('twitter_url') : '';
    $facebook_url = get_theme_mod('facebook_url') ? get_theme_mod('facebook_url') : '';
    $google_url = get_theme_mod('google_url') ? get_theme_mod('google_url') : '';
    $linkedin_url = get_theme_mod('linkedin_url') ? get_theme_mod('linkedin_url') : '';
    $instagram_url = get_theme_mod('instagram_url') ? get_theme_mod('instagram_url') : '';
    $youtube_url = get_theme_mod('youtube_url') ? get_theme_mod('youtube_url') : '';
    
    $output .= '<ul class="nav navbar-nav navbar-nav__socials navbar-nav__'.$shortcode_atts['alignment'].' no-margin-left">';
        if(!empty($twitter_url)): $output .= '<li class="nav-item"><a href='.$twitter_url.' target="_blank"><span class="'.$classes.' ion-social-twitter"></span></a></li>'; endif;
        if(!empty($facebook_url)): $output .=  '<li class="nav-item"><a href='.$facebook_url.' target="_blank"><span class="'.$classes.' ion-social-facebook"></span></a></li>'; endif; 
        if(!empty($google_url)): $output .=  '<li class="nav-item"><a href='.$google_url.' target="_blank"><span class="'.$classes.' ion-social-googleplus"></span></a></li>'; endif;
        if(!empty($linkedin_url)): $output .=  '<li class="nav-item"><a href='.$linkedin_url.' target="_blank"><span class="'.$classes.' ion-social-linkedin-outline"></span></a></li>'; endif; 
        if(!empty($instagram_url)): $output .=  '<li class="nav-item"><a href='.$instagram_url.' target="_blank"><span class="'.$classes.' ion-social-instagram"></span></a></li>'; endif;
        if(!empty($youtube_url)): $output .=  '<li class="nav-item"><a href='.$youtube_url.' target="_blank"><span class="'.$classes.' ion-social-youtube"></span></a></li>'; endif;
    $output .= '</ul>';
    return $output;
}

function contact_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(

    ), $atts);

    $classes = 'icon icon-left fw';
    $output = '';
    
    
    $contact_email_address = get_theme_mod('contact_email_address') ? get_theme_mod('contact_email_address') : '';
    $contact_phone = get_theme_mod('contact_phone') ? get_theme_mod('contact_phone') : '';

    
    $output .= '<ul class="list-unstyled no-margin-left">';
        if(!empty($contact_email_address)): $output .= '<li><a href="mailto:'.$contact_email_address.'" target="_blank"><span class="'.$classes.' ion-ios-email-outline"></span> '.$contact_email_address.'</a></li>'; endif;
        if(!empty($contact_phone)): $output .=  '<li><a href="tel:'.$contact_phone.'" target="_blank"><span class="'.$classes.' ion-ios-telephone-outline"></span> '.$contact_phone.'</a></li>'; endif; 
    $output .= '</ul>';
    return $output;
}

function button_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
        'link' => '/',
        'class' => 'primary',
        'text' => '',
    ), $atts);


    $output = '';
    
    $output .= '<a href="'.$shortcode_atts['link'].'" class="button button__'.$shortcode_atts['class'].'">'.$shortcode_atts['text'].'</a>';
    return $output;
}

function show_categories($atts) {
    
    $output = '';
    
     $args = array(
       'orderby'    => 'title',
       'order'      => 'ASC',
       'hide_empty' => true,
       'parent'     => 0,
    );

    $shortcode_atts = shortcode_atts( array(
       'taxonomy'       => '',
       'wrapper_class'  => '',
    ), $atts);
    
    $product_categories = get_terms( $shortcode_atts['taxonomy'], $args );
    $count = count($product_categories);
    
    if ( $count > 0 ){
        $output .= '<div class="'.$shortcode_atts['wrapper_class'].'">';
        $loop = 0;
        
        $output .= '<a class="button button__grey single-filter focus" data-filter="*">All</a>';    
        
        foreach ($product_categories as $category) {
            $output .= '<a class="button button__grey single-filter" data-filter=".'.$category->slug.'">'.$category->name.'</a>';    
        }
        $output .= '</div>';
        //var_dump($product_categories);

    }
    
    return $output;
}          

function register_shortcodes(){
    add_shortcode('post-loop', 'ngaire_post_type_loop');
    add_shortcode('socials', 'socials_shortcode_function');
    add_shortcode('contact-details', 'contact_shortcode_function');
    add_shortcode('button', 'button_shortcode_function');
    add_shortcode('categories-loop', 'show_categories');
}

add_action( 'init', 'register_shortcodes');

// Logo
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
			$output .= '<source srcset="'.$this->logo.'" media="(min-width: 769px)">';				
			$output .= '<!--[if IE 9]></video><![endif]-->';
			$output .= '<img srcset="'.$this->logo_mobile.'">';
		$output .= '</picture>';
		
		return $output;
	}
}

