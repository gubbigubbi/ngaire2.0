<?php
$navbar_alignment = get_field('navbar_menu_alignment','options') ? get_field('navbar_menu_alignment','options') : 'left';
if ($navbar_alignment == 'left') {
    $class = 'start-xs';
} else {
    $class = 'end-xs';
}
?>
<div class="row middle-xs start-xs">
    <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4 col-xl-3 site-branding">
        <?php get_template_part('template-parts/header/logo'); ?>
    </div><!-- .site-branding -->

    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-8 col-xl-9">
        <?php get_template_part('template-parts/header/navigation'); ?>
    </div>
</div>