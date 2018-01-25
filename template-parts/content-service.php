<?php
/**
 * Template part for displaying single services.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ngaire2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php
            the_content( sprintf(
                /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ngaire-2-0' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
        
            // the top level repeater
            if( have_rows('service_overview_&_related_fields') ): ?>
                <ul class="list-inline list-unstyled ml0 mb0 py1 block--border-bottom p-sticky">
                    <?php while ( have_rows('service_overview_&_related_fields')) : the_row();
                        echo '<li><a class="local-link pl1 pr1" href="#'.str_replace(' ', '-', strtolower(get_sub_field('section_title'))).'">'.get_sub_field('section_title').'</a></li>';
                    endwhile; ?>
                </ul>

                <?php while ( have_rows('service_overview_&_related_fields')) : the_row();
                    echo '<section class="pt2">';
                        echo '<h4 class="mb1 mt0" id="'.str_replace(' ', '-', strtolower(get_sub_field('section_title'))).'">'.get_sub_field('section_title').'</h4>';
                        echo get_sub_field('section_content');
                    echo '</section>';
                endwhile; ?>
            <?php endif;
            

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ngaire-2-0' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->