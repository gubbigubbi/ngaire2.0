
<div class="row middle-xs navbar-aligner">
    <div class="site-branding center-xs">
        <?php get_template_part('template-parts/header/logo'); ?>
    </div><!-- .site-branding -->

    <div class="site-menu-container center-xs">
        <?php get_template_part('template-parts/header/navigation'); ?>
        <?php 
        if(get_theme_mod('social_in_navbar')):
            echo do_shortcode('[socials alignment="right mb0 hidden-md"]'); 
        endif;
        ?> 

    </div>
</div>