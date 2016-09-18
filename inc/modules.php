<?php 
class single_portfolio {   
    function __construct($thumb_url, $thumbnail_classes) {
        $this->thumb_url = $thumb_url;
        $this->thumbnail_classes = $thumbnail_classes;
    }
    function return_html() {
        $html_output .= '<a class="portfolio-colorbox" href="'.get_the_permalink().'">';
            $html_output .= '<div class="post-thumb">';
                $html_output .= '<div class="post-thumb-wrapper text-center show-on-hover">';
                    $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
                    $html_output .= '<div class="post-thumb-wrapper-overlay overlay__shaded">';
                    $html_output .= '<span><h4>'.get_the_title().'</h4>';
                    $html_output .= '<p><span class="ion-android-expand"></span> Enlarge Image</p></span>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
            $html_output .= '</div>';
        $html_output .= '</a>';
        return $html_output;
    }   
}

class single_service extends single_portfolio {
    function return_html() {
        $html_output .= '<a class="portfolio-colorbox" href="'.get_the_permalink().'">';
            $html_output .= '<div class="post-thumb animated-on-hover">';
                $html_output .= '<div class="post-thumb-wrapper text-center">';
                    $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
                    $html_output .= '<div class="post-thumb-wrapper-overlay overlay__shaded">';
                    $html_output .= '<span><span class="button button__border">'.get_the_title().'</span>';
                    $html_output .= '</div>';
                $html_output .= '</div>';
            $html_output .= '</div>';
        $html_output .= '</a>';
        return $html_output;
    } 
}

class single_team extends single_portfolio {
    function return_html() {
 
        $html_output .= get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => $this->thumbnail_classes));
        $html_output .= '<div class="block__content">';
            $html_output .= '<h4>'.get_the_title().'</h4>';
            $html_output .= '<h5><strong>'.get_post_meta( get_the_ID(), 'custom_meta_team_position', true ).'</strong></h5>';
            $html_output .= get_the_excerpt();
        $html_output .= '</div>';
        return $html_output;        
    }
}

class single_testimonial extends single_portfolio {
    function return_html() {
        
        $html_output .= '<div class="row middle-md">';
 
            $html_output .= '<div class="col-md-5">';
                $html_output .= '<h4>'.get_the_title().'</h4>';
                $html_output .= '<p><i>'.get_the_excerpt().'</i></p>';
                $html_output .= '<a class="button button__primary" href="'.get_the_permalink().'">Read more</a>';
            $html_output .= '</div>';
            
            $html_output .= '<div class="col-md-7">';
                $html_output .= get_the_post_thumbnail($post->ID, 'testimonial-thumb', array('class' => $this->thumbnail_classes));
            $html_output .= '</div>';
            
        $html_output .= '</div>';
        return $html_output;        
    }
}


function ngaire_post_type_loop($atts) {
    $output = '';
    $i = 1;
    $shortcode_atts = shortcode_atts( array(
            'type'      => 'portfolio',
            'number'    => '6',
            'cols'      => '3',
            'class'     => '',
            'animation' => '',

    ), $atts);
    
    $post_type = $shortcode_atts['type'];

    // WP_Query arguments
    $args = array (
        'post_type'              => array( $post_type ),
        'posts_per_page'         => $shortcode_atts['number'],
    );
    
    // The Query
    $query = new WP_Query( $args );
    
    if($query->have_posts()):
        $cols = 12 / $shortcode_atts['cols'];
        $output .= '<div class="row '.$shortcode_atts['class'].'">';
    
        while ($query->have_posts()) : $query->the_post();
            $output .= '<div class="col-lg-'.$cols.' col-md-12 col-sm-12 col-xs-12 wow '.$shortcode_atts['animation'].' stagger-'.$i.'">';
                $output .= '<div class="'.$post_type.'-block hentry">';
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                    $thumb_url = $thumb_url_array[0];
                    
                    switch($post_type) {
                        case 'portfolio':
                            $newObj = new single_portfolio($thumb_url, $thumbnail_classes);
                        break;
                        case 'post':
                        case 'service':
                        case 'product':
                            $newObj = new single_service($thumb_url, $thumbnail_classes);
                        break;                    
                        case 'team':
                            $newObj = new single_team($thumb_url, $thumbnail_classes);
                        break;
                        case 'testimonial':
                            $newObj = new single_testimonial($thumb_url, $thumbnail_classes);
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

function socials_shortcode_function($atts) {
    
    $shortcode_atts = shortcode_atts( array(
            'alignment'      => 'left',

    ), $atts);

    $classes = 'icon fw';
    $output = '';
    
    $twitter_url = get_field('twitter_URL','options') ? get_field('twitter_URL','options') : '';
    $facebook_url = get_field('facebook_URL','options') ? get_field('facebook_URL','options') : '';
    $google_url = get_field('google_URL','options') ? get_field('google_URL','options') : '';
    $linkedin_url = get_field('linkedin_URL','options') ? get_field('linkedin_URL','options') : '';
    $instagram_url = get_field('instagram_URL','options') ? get_field('instagram_URL','options') : '';
    
    $output .= '<ul class="nav navbar-nav navbar-nav__socials navbar-nav__'.$shortcode_atts['alignment'].' no-margin-left">';
    if(!empty($twitter_url)): $output .= '<li class="nav-item"><a href='.$twitter_url.' target="_blank"><span class="'.$classes.' ion-social-twitter"></span></a></li>'; endif;
    if(!empty($facebook_url)): $output .=  '<li class="nav-item"><a href='.$facebook_url.' target="_blank"><span class="'.$classes.' ion-social-facebook"></span></a></li>'; endif; 
    if(!empty($google_url)): $output .=  '<li class="nav-item"><a href='.$google_url.' target="_blank"><span class="'.$classes.' ion-social-googleplus"></span></a></li>'; endif;
    if(!empty($linkedin_url)): $output .=  '<li class="nav-item"><a href='.$linkedin_url.' target="_blank"><span class="'.$classes.' ion-social-linkedin"></span></a></li>'; endif; 
    if(!empty($instagram_url)): $output .=  '<li class="nav-item"><a href='.$instagram_url.' target="_blank"><span class="'.$classes.' ion-social-instagram"></span></a></li>'; endif;	
    $output .= '</ul>';
    return $output;
}

function register_shortcodes(){
    add_shortcode('post-loop', 'ngaire_post_type_loop');
    add_shortcode('socials', 'socials_shortcode_function');
}

add_action( 'init', 'register_shortcodes');