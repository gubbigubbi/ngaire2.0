<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ngaire2.0
 */

  global $post;
        $post_type = get_post_type($post->ID);

        $position = get_post_meta($post->ID, 'custom_meta_team_position', true);
        $linkedin = get_post_meta($post->ID, 'custom_meta_team_linkedin', true);
        $email = get_post_meta($post->ID, 'custom_meta_team_email', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="row middle-md">
            <div class="col-md-4 col-xs-12">
                <header class="entry-header">
                    <?php echo show_single_thumbnail(); ?>
                </header><!-- .entry-header -->  
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="entry-content">
                    <h4>Biography</h4>
                    <?php
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ngaire-2-0' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
            
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ngaire-2-0' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
            </div>
            <div class="col-md-2 col-xs-12">
                <?php
                $html_output .= '<p>'.$position.'</p>';
                $html_output .= '<hr></hr>';
                if($linkedin) {
                    $html_output .= '<p class="mb0"><a style="margin-right: 0.5em" href="'.$linkedin.'"><span class="icon-left icon ion-social-linkedin-outline"></span>LinkedIn</a></p>';
                }
                if($email) {
                    $html_output .= '<p class="mt0"><a href="'.$email.'"><span class="icon-left icon ion-email-unread"></span>Email</a></p>';
                }
                echo $html_output;
                ?>
            </div>
        </div>	
</article><!-- #post-## -->
