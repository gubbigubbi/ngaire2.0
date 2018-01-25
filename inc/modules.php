<?php 
class single_portfolio {   
    function __construct($thumb_url, $thumbnail_classes,$link = NULL) {
        $this->thumb_url = $thumb_url;
        $this->thumbnail_classes = $thumbnail_classes;
        $this->link = $link;
    }
    function return_html() {
        
            $portfolio_link = get_field('portfolio_link') ? get_field('portfolio_link') : get_the_permalink();
        
            $html_output .= '<div class="block--border gallery-icon block--white">';
            $html_output .= '<div class="px1">';
                $html_output .= '<h4 class="mt0 mb0">'.get_the_title().'</h4>';
            $html_output .= '</div>';
            $html_output .= '<a href="'.get_the_post_thumbnail_url($post->ID, 'full').'">';
                $html_output .= '<div class="post-thumb">';
                    $html_output .= '<div class="post-thumb-wrapper text-center hide-img-on-hover">';
                        $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
                        $html_output .= '<div class="post-thumb-wrapper-overlay">';
                        $html_output .= '<span><p class="big text-uppercase mt0">'.get_the_title().'</p>';
                        $html_output .= '<p class="block--link"><span style="font-size: 4em" class="ion-ios-search-strong"></span></p>';
                        $html_output .= '</span>';
                        $html_output .= '</div>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
            $html_output .= '</a>';

            $html_output .= '<div class="px1">';
                $html_output .= '<p class="my0">'.get_the_excerpt().'</p>';
            $html_output .= '</div>';
            $html_output .= '</div>';

        return $html_output;
    }   
}

class single_service_list extends single_portfolio {
    function return_html() {

            $html_output .= '<a class="w100 px1 block--dark text--white f-left hover__light text--light my0" href="'.get_the_permalink().'">';
                $html_output .= get_the_title().' <i class="text--white f-right ion-arrow-right-b"></i>';
            $html_output .= '</a>';

            
        return $html_output;
    } 
}

class single_service_thumb extends single_portfolio {
    function return_html() {
            $html_output .= '<a class="service-block--thumb" href="'.get_the_permalink().'">';
                $html_output .= '<div class="post-thumb">';
                    $html_output .= '<div class="post-thumb-wrapper text-center">';
                        $html_output .= get_the_post_thumbnail($post->ID, 'testimonail-thumb', array('class' => $this->thumbnail_classes));
                        $html_output .= '<div class="post-thumb-wrapper-overlay overlay__shaded">';
                        $html_output .= '<span class="btm-l"><h3 class="h2 text--white text-uppercase my0">'.get_the_title().'</h3>';
                        $html_output .= '</span>';
                        $html_output .= '</div>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
           
                $html_output .= '<div class="px1 block--light text--white">';
                    $html_output .= '<p class="my0">'.get_the_excerpt().'</p>';
                $html_output .= '</div>';
            $html_output .= '</a>';


        return $html_output;
    } 
}

class single_partner extends single_portfolio {
    function return_html() {
        
            $portfolio_link = get_field('portfolio_link') ? get_field('portfolio_link') : get_the_permalink();
        
            $html_output .= '<a href="'.$portfolio_link.'">';
                    $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb-small', array('class' => $this->thumbnail_classes));
            $html_output .= '</a>';
            $html_output .= '<h4>'.get_the_title().'</h4>';
            $html_output .= '<a class="small" href="'.$portfolio_link.'">'.$portfolio_link.'</a>';
            
        return $html_output;
    } 
}

class single_page extends single_portfolio {
    function return_html() {
        
            $portfolio_link = get_field('portfolio_link') ? get_field('portfolio_link') : get_the_permalink();
        
            $html_output .= '<a href="'.$portfolio_link.'">';

                    $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));

                    $html_output .= '<h4 class="text-uppercase mb0">'.get_the_title().'</h4>';
                    $html_output .= '<p class="mt0 block--link"><span class="ion-plus-circled"></span> View More</p>';
 
            $html_output .= '</a>';
        return $html_output;
    } 
}

class single_post extends single_portfolio {
    function return_html() {
        global $post;
        
        
        $html_output .= '<div>';
            $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb', array('class' => $this->thumbnail_classes));
        $html_output .= '</div>';
        $html_output .= '<div class="block--white p1 center-xs">';
            $html_output .= '<a href="'.get_the_permalink().'"><h4 class="h5 mt0 mb1">'.get_the_title().'</h4></a>';
            $html_output .= '<a class="button button--primary">Read More</a>';
        $html_output .= '</div>';
        return $html_output;        
    }
}

class single_product extends single_portfolio {
    function return_html() {
        global $post;
        $product = wc_get_product( $post->ID );
        $link = get_the_permalink();
        
        $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb', array('class' => $this->thumbnail_classes));
        
        $html_output .= '<div class="card__content">';
            $html_output .= '<a href="'.$link.'"><h4 class="h3 mt0 mb1 text-center">'.get_the_title().'</h4></a>';
            $html_output .= '<p class="text-center">Starting at: $'.$product->get_price().'</p>';
                        // check if the repeater field has rows of data
                if( have_rows('product_features') ):
                    $html_output .= '<h4 class="text-center strong">Features</h4>';
                    $html_output .= '<ul class="list-unstyled">';
                    // loop through the rows of data
                while ( have_rows('product_features') ) : the_row();

                    // display a sub field value
                    the_sub_field('sub_field_name');

                    $html_output .= '<li><i class="text--light big mr1-2 icon '.get_sub_field('feature_icon').'"></i>';
                    $html_output .= get_sub_field('feature_title').'</li>';
                endwhile;
                    $html_output .= '</ul>';

                else :

                // no rows found

                endif;
            
            $html_output .= '<a class="button button--primary w100" href="'.$link.'">Get started now</a>';
        $html_output .= '</div>';
        return $html_output;        
    }
}

class single_service extends single_portfolio {
    function return_html() {

        $content = get_the_content();

        $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb-small', array('class' => $this->thumbnail_classes));
        $html_output .= '<div class="location-content">';
            $html_output .= '<h4 class="testimonial-user text--light my0">'.get_the_title().'</h4>';
            $html_output .= '<p class="testimonial-content mb0">'.$content.'</p>';
        $html_output .= '</div>';

        return $html_output;        
    }
}

class single_callout extends single_portfolio {
    function return_html() {

        $content = get_the_content();

        $html_output .= '<div class="row middle-xs">';

            $html_output .= '<div class="col-lg-2 col-md-3 col-xs-12">';
                $html_output .= '<i class="text--light grande icon '.get_field('callout_icon').'"></i>';
            $html_output .= '</div>';

            $html_output .= '<div class="col-lg-10 col-md-9 col-xs-12 callout__content">';
                $html_output .= '<h4 class="mt0 text--light">'.get_the_title().'</h4>';
                $html_output .= '<p class="testimonial-content my0">'.$content.'</p>';
            $html_output .= '</div>';

        $html_output .= '</div>';

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
        
            $html_output .= '<div class="card__image" href="'.get_the_permalink().'">';
                $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
            $html_output .= '</div>';
            $html_output .= '<div class="card__content" href="'.get_the_permalink().'">';

                $html_output .= '<a href="'.get_the_permalink().'"><h4 class="my0">'.get_the_title().'</h4></a>';
                $html_output .= '<p>'.$position.'</p>';
                $html_output .= '<hr></hr>';
                
                if($linkedin) {
                    $html_output .= '<a style="margin-right: 0.5em" href="'.$linkedin.'"><span class="icon-left icon ion-social-linkedin-outline"></span>LinkedIn</a>';
                }
                if($email) {
                    $html_output .= '<a href="'.$email.'"><span class="icon-left icon ion-email-unread"></span>Email</a>';
                }

                $html_output .= get_the_excerpt() ? get_the_excerpt() : get_the_content();

            $html_output .= '</div>';

        return $html_output;        
    }
}

class single_class extends single_portfolio {
    function return_html() {
        global $post;
        $class_time = get_post_meta($post->ID, 'custom_meta_class_hours', true);
        
        $html_output .= '<div class="py2 px1">';
            $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb', array('class' => $this->thumbnail_classes));
        $html_output .= '</div>';
        $html_output .= '<div class="p1 block--white center-xs">';
            $html_output .= '<a href="'.get_the_permalink().'"><h4 class="h5 mt0 mb1">'.get_the_title().'</h4></a>';
            $html_output .= '<a class="button button--primary" href="/class-information">Read More</a>';
        $html_output .= '</div>';
        return $html_output;        
    }
}

class single_testimonial extends single_portfolio {
    function return_html() {

        $content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
        
            $html_output .= '<div class="center-xs">';
                
                $html_output .= get_the_post_thumbnail($post->ID, 'square-thumb-small', array('class' => $this->thumbnail_classes));
                $html_output .= '<h4 class="testimonial-user text--light mb0">'.get_the_title().'</h4>';
                $html_output .= '<p class="testimonial-content mb0">'.$content.'</p>';
                
                //$html_output .= '<a class="button button--primary" href="'.get_the_permalink().'">Read more</a>';
            $html_output .= '</div>';
 
        return $html_output;        
    }
}

function ngaire_post_type_loop($atts) {
    $output = '';
    $i = 1;
    $shortcode_atts = shortcode_atts( array(
            'type'            => 'portfolio',
            'subtype'         => '',  
            'number'          => '6',
            'cols'            => '3',
            'class'           => '',
            'block-class'     => '',
            'thumbnail-class' => '',
            'iso-taxonomy'    => '',
            'taxonomy'        => '',
            'terms'           => '',
            'exclude-post'    => '',
            'include-post'    => '',
            'order'           => '', 
            'link'            => ''   

    ), $atts);

    if ($shortcode_atts['taxonomy']) {
        $tax_query[] = array (
            'taxonomy'  => $shortcode_atts['taxonomy'],
            'terms'     => $shortcode_atts['terms'],
            'field'     => 'slug', // term id, term slug or term name
        );
    }
    
    if($shortcode_atts['include-post']) {
        $post_include = explode(',',$shortcode_atts['include-post']);
    }
    
    $post_type = $shortcode_atts['type'];
    $sub_type = $shortcode_atts['subtype'];

    $thumbnail_classes = 'b-lazy img__post-block '.$shortcode_atts['thumbnail-class'];

    // WP_Query arguments
    $args = array (
        'post_type'              => array( $post_type ),
        'order'                  => $shortcode_atts['order'],
        'posts_per_page'         => $shortcode_atts['number'],
        'post__in'               => $post_include,
        'post__not_in'           => array($shortcode_atts['exclude-post']),
        'tax_query'              => $tax_query,
        'ignore_sticky_posts'    => 1
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
            $output .= '<div class="col-lg-'.$grid_cols.' col-md-6 col-sm-12 col-xs-12 '.$tax_terms.'">';
                $output .= '<div class="block--'.$post_type.' '.$sub_type.' hentry w100 f-left">';
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    $thumb_url = $thumb_url_array[0];
                    $block_class = $shortcode_atts['block-class'];
                    
                    switch($post_type) {
                        case 'post':
                            $newObj = new single_post($thumb_url, $thumbnail_classes);
                        break;
                        case 'product':
                        $newObj = new single_product($thumb_url, $thumbnail_classes);
                        break;
                        case 'portfolio':
                            if('list' == $sub_type) {
                                $newObj = new single_service_list($thumb_url, $thumbnail_classes);
                            } else {
                                $newObj = new single_portfolio($thumb_url, $thumbnail_classes); 
                            }  
                        break;
                        case 'service':
                            if('list' == $sub_type) {
                                $newObj = new single_service_list($thumb_url, $thumbnail_classes);
                            } elseif('thumb' == $sub_type) {
                                $newObj = new single_service_thumb($thumb_url, $thumbnail_classes);
                            } else {
                                $newObj = new single_service($thumb_url, $thumbnail_classes, $shortcode_atts['link']);
                            }
                        break;
                        case 'page':
                            $newObj = new single_page($thumb_url, $thumbnail_classes);
                        break;
                        case 'partner':
                            $newObj = new single_partner($thumb_url, $thumbnail_classes);
                        break; 
                        case 'team':
                            $newObj = new single_team($thumb_url, $thumbnail_classes);
                        break;
                        case 'testimonial':
                            $newObj = new single_testimonial($thumb_url, $thumbnail_classes);
                        break; 
                        case 'callout':
                            $newObj = new single_callout($thumb_url, $thumbnail_classes);
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
            'alignment'     => 'left',
            'class'         => '',
            'type'          => '',

    ), $atts);

    $classes = $shortcode_atts['class'].' icon ';
    //var_dump($classes);
    $output = '';
    
    $twitter_url = get_theme_mod('twitter_url') ? get_theme_mod('twitter_url') : '';
    $facebook_url = get_theme_mod('facebook_url') ? get_theme_mod('facebook_url') : '';
    $google_url = get_theme_mod('google_url') ? get_theme_mod('google_url') : '';
    $linkedin_url = get_theme_mod('linkedin_url') ? get_theme_mod('linkedin_url') : '';
    $instagram_url = get_theme_mod('instagram_url') ? get_theme_mod('instagram_url') : '';
    $youtube_url = get_theme_mod('youtube_url') ? get_theme_mod('youtube_url') : '';
    
    $output .= '<ul class="nav navbar-nav navbar-nav__socials navbar-nav__'.$shortcode_atts['alignment'].' ml0">';
        if($shortcode_atts['type'] == 'list') {
            if(!empty($twitter_url)): $output .= '<li class="nav-item"><a href='.$twitter_url.' target="_blank"><span class="'.$classes.' ion-social-twitter"></span> Twitter</a></li>'; endif;
            if(!empty($facebook_url)): $output .=  '<li class="nav-item"><a href='.$facebook_url.' target="_blank"><span class="'.$classes.' ion-social-facebook"></span> Facebook</a></li>'; endif; 
            if(!empty($google_url)): $output .=  '<li class="nav-item"><a href='.$google_url.' target="_blank"><span class="'.$classes.' ion-social-googleplus"></span></a> Google Plus</li>'; endif;
            if(!empty($linkedin_url)): $output .=  '<li class="nav-item"><a href='.$linkedin_url.' target="_blank"><span class="'.$classes.' ion-social-linkedin-outline"></span> LinkedIn</a></li>'; endif; 
            if(!empty($instagram_url)): $output .=  '<li class="nav-item"><a href='.$instagram_url.' target="_blank"><span class="'.$classes.' icon-instagram_white-circle"></span> Instagram</a></li>'; endif;
            if(!empty($youtube_url)): $output .=  '<li class="nav-item"><a href='.$youtube_url.' target="_blank"><span class="'.$classes.' ion-social-youtube"></span></a> Youtube</li>'; endif;
        } else {
            if(!empty($twitter_url)): $output .= '<li class="nav-item"><a href='.$twitter_url.' target="_blank"><span class="'.$classes.' ion-social-twitter"></span></a></li>'; endif;
            if(!empty($facebook_url)): $output .=  '<li class="nav-item"><a href='.$facebook_url.' target="_blank"><span class="'.$classes.' ion-social-facebook"></span></a></li>'; endif; 
            if(!empty($google_url)): $output .=  '<li class="nav-item"><a href='.$google_url.' target="_blank"><span class="'.$classes.' ion-social-googleplus"></span></a></li>'; endif;
            if(!empty($linkedin_url)): $output .=  '<li class="nav-item"><a href='.$linkedin_url.' target="_blank"><span class="'.$classes.' ion-social-linkedin-outline"></span></a></li>'; endif; 
            if(!empty($instagram_url)): $output .=  '<li class="nav-item"><a href='.$instagram_url.' target="_blank"><span class="'.$classes.' icon-instagram_white-circle"></span></a></li>'; endif;
            if(!empty($youtube_url)): $output .=  '<li class="nav-item"><a href='.$youtube_url.' target="_blank"><span class="'.$classes.' ion-social-youtube"></span></a></li>'; endif;
        }
    $output .= '</ul>';
    return $output;
}

function contact_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
        'alignment'      => 'left',
        'navbar_class'   => '',
    ), $atts);

    $classes = 'icon icon-left fw';
    $output = '';
    
    
    $contact_email_address = get_theme_mod('contact_email_address') ? get_theme_mod('contact_email_address') : '';
    $contact_phone = get_theme_mod('contact_phone') ? get_theme_mod('contact_phone') : '';
    $office_address = get_theme_mod('office_address_short') ? get_theme_mod('office_address_short') : '';

    
    $output .= '<ul class="navbar__contact list-unstyled navbar-nav__'.$shortcode_atts['alignment'].' '.$shortcode_atts['navbar_class'].'">';
        if(!empty($contact_email_address)): $output .= '<li class="nav-item nav-item__email"><a class="ga-trigger-email" href="mailto:'.$contact_email_address.'" target="_blank"><span class="'.$classes.' ion-ios-email-outline"></span> '.$contact_email_address.'</a></li>'; endif;
        if(!empty($contact_phone)): $output .=  '<li class="nav-item"><a class="ga-trigger-call" href="tel:'.$contact_phone.'" target="_blank"><span class="'.$classes.' ion-ios-telephone-outline"></span> '.$contact_phone.'</a></li>'; endif; 
        if(!empty($office_address)): $output .=  '<li class="nav-item"><a class="ga-trigger-call" href="tel:'.$office_address.'" target="_blank"><span class="'.$classes.' ion-ios-location-outline"></span> '.$office_address.'</a></li>'; endif; 
        $output .= '</ul>';
    return $output;
}

function contact_grid_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
        'navbar_class'   => '',
    ), $atts);

    $classes = 'icon icon-left fw icon-md';
    $output = '';
    
    
    $contact_email_address  = get_theme_mod('contact_email_address') ? get_theme_mod('contact_email_address') : '';
    $contact_phone          = get_theme_mod('contact_phone') ? get_theme_mod('contact_phone') : '';
    $office_address         = get_theme_mod('office_address_short') ? get_theme_mod('office_address_short') : '';
    
    $output .= '<div class="row contact__grid '.$shortcode_atts['navbar_class'].' middle-md">';
        $output .= '<div class="col-md col-xs-12"><div class="row middle-xs"><div class="col-lg-2 col-xs-12 start-lg center-xs"><i class="'.$classes.' ion-ios-telephone-outline"></i></div>';
        $output .= '<div class="contact-grid-text start-lg center-xs col-xs mb1-2-md"><a href="tel:'.$contact_phone.'">Phone: '.$contact_phone.'</a></div></div></div>';
        $output .= $office_address ? '<div class="col-md col-xs-12"><div class="row middle-xs"><div class="col-lg-2 col-xs-12 start-lg center-xs"><i class="'.$classes.' ion-ios-location-outline"></i></div><div class="contact-grid-text start-lg center-xs col-xs mb1-2-md">'.$office_address.'</div></div></div>' : '';
        $output .= '<div class="col-md col-xs-12"><div class="row middle-xs"><div class="col-lg-2 col-xs-12 start-lg center-xs"><i class="'.$classes.' ion-ios-email-outline"></i></div>';
        $output .= '<div class="contact-grid-text start-lg center-xs col-xs mb1-2-md"><a href="mailto:'.$contact_email_address.'">'.$contact_email_address.'</a></div></div></div>';

    $output .= '</div>';
    return $output;
}

function woocommerce_menu_shortcode_function($atts) {
    $shortcode_atts = shortcode_atts( array(
        'alignment'      => 'left',
        'navbar_class'   => '',
    ), $atts);

    $classes = 'icon icon-left fw';
    $output = '';
    
    $output .= '<ul class="navbar__contact list-unstyled navbar-nav__'.$shortcode_atts['alignment'].' no-margin-'.$shortcode_atts['alignment'].' '.$shortcode_atts['navbar_class'].'">';
        $output .= '<li class="nav-item nav-item__email"><a href="/cart" target="_blank"><span class="'.$classes.' ion-bag icon"></span> My Cart</a></li>';
        $output .=  '<li class="nav-item"><a href="/checkout" target="_blank"><span class="'.$classes.' ion-thumbsup icon"></span> Checkout</a></li>';
    $output .= '</ul>';
    return $output;
}

function button_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
        'link' => '/',
        'class' => 'primary',
        'text' => '',
        'icon' => '',
    ), $atts);


    $output = '';
    
    $output .= '<a href="'.$shortcode_atts['link'].'" class="button button--'.$shortcode_atts['class'].'"><span style="margin-right: 6px;" class="icon '.$shortcode_atts['icon'].'"></span>'.$shortcode_atts['text'].'</a>';
    return $output;
}

function icon_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
        'type' => '',
    ), $atts);


    $output = '';
    
    $output .= '<span class="icon-wrapper"><i class="icon '.$shortcode_atts['type'].'"></i></span>';
    return $output;
}

function show_categories($atts) {
    
    $output = '';
    
     $args = array(
       'orderby'    => 'title',
       'order'      => 'ASC',
       'hide_empty' => true,
       'parent'     => 0,
       'type'       => 'buttons'
 
    );

    $shortcode_atts = shortcode_atts( array(
       'taxonomy'       => '',
       'wrapper_class'  => '',
       'type'           => 'grid',
       'cols'           => '4'   
    ), $atts);

    $grid_cols = 12 / $shortcode_atts['cols'];

    $product_categories = get_terms( $shortcode_atts['taxonomy'], $args );
    $count = count($product_categories);
    
    if ( $count > 0 ){
        $output .= '<div id="tax-filter-'.$shortcode_atts['taxonomy'].'" class="'.$shortcode_atts['wrapper_class'].'">';
        $loop = 0;
        if($shortcode_atts['type'] !== 'profile') {
            $output .= '<a class="button button--primary single-filter btn-filter focus" data-filter="*">All</a>';    
        }
        foreach ($product_categories as $category) {
            if($shortcode_atts['type'] == 'profile') {
                $tax = 'department_'.$category->term_id;

                $imageArray = get_field('department_image', $tax); // Array returned by Advanced Custom Fields
                $imageAlt = esc_attr($imageArray['alt']); // Grab, from the array, the 'alt'
                $imageThumbURL = esc_url($imageArray['sizes']['square-thumb']); //grab from the array, the 'sizes', and from it, the 'thumbnail'
                
                $output .= '<a class="col-md-4 col-xs-12 single-filter profile-filter pointer" data-filter=".'.$category->slug.'">';
                    $output .= '<div class="post-thumb">';
                        $output .= '<div class="post-thumb-wrapper text-center hide-img-on-hover">';
                            
                            $output .= '<img class="image--circle border--image mt2" src="'.$imageThumbURL.'" alt="'.$imageAlt.'">';
                            $output .= '<div class="mt1 mb2 py1 border--top--bottom center-xs">';
                                $output .= '<h4 class="my0 h4-offset">'.$category->name.'</h4>';
                            $output .= '</div>';

                            $output .= '<div class="post-thumb-wrapper-overlay">';
                                $output .= '<span><button class="button button--border">Read More</button></span>';
                            $output .= '</div>';
                        
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</a>';
            } else {
                $output .= '<a class="button button--primary single-filter btn-filter" data-filter=".'.$category->slug.'">'.$category->name.'</a>';    
            }
        }

        $output .= '</div>';

    }
    
    
    return $output;
}   

function title_shortcode_function($atts) {
    $output = '';

    $output .= is_tax() ? get_the_archive_title() : get_the_title();
    return $output;
}

function register_shortcodes(){
    add_shortcode('post-loop', 'ngaire_post_type_loop');
    add_shortcode('socials', 'socials_shortcode_function');
    add_shortcode('contact-details', 'contact_shortcode_function');
    add_shortcode('woocommerce-menu', 'woocommerce_menu_shortcode_function');
    add_shortcode('contact-grid', 'contact_grid_function');
    add_shortcode('button', 'button_shortcode_function');
    add_shortcode('categories-loop', 'show_categories');
    add_shortcode('icon', 'icon_shortcode_function');
    add_shortcode('page-title', 'title_shortcode_function');
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