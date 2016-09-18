<section class="section-header <?php echo $parallax_option; ?> b-lazy" data-src="<?php the_field('header_image'); ?>">
    <div class="post-thumb-wrapper">
        <div class="post-thumb-wrapper-overlay overlay__shaded">
            <span class="text-center">
                <div class="container animated fadeInUp">
                    <div class="col-md-10 col-md-offset-1 last-of-type-no-margin-bottom">
                        <?php do_action('header_content'); ?>
                    </div>
                </div>
            </span>
        </div>
    </div>
</section>