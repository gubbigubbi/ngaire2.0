<section class="section-header <?php echo $parallax_option; ?> b-lazy" data-src="<?php the_field('header_image'); ?>">
    <div class="post-thumb-wrapper">
        <div class="post-thumb-wrapper-overlay overlay__shaded">
            <span class="text-left">
                <div class="container animated fadeInUp stagger-2">
                    <div class="last-of-type-no-margin-bottom">
                        <?php do_action('header_content'); ?>
                    </div>
                </div>
            </span>
        </div>
    </div>
</section>