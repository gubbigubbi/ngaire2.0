<div class="row middle-xs navbar-aligner">
    <div class="site-branding">
        <?php get_template_part('template-parts/header/logo'); ?>
    </div><!-- .site-branding -->

    <div class="site-menu-container">
        <?php 
        if(get_theme_mod('social_in_navbar')):
            echo do_shortcode('[socials alignment="right mb0 hidden-md"]'); 
        endif;
        ?> 
        <?php get_template_part('template-parts/header/navigation'); ?>

    </div>
</div>