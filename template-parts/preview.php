<?php $contact_email = get_field('contact_email_address','options'); ?>

<div class="container-fluid">
    
    <section class="section-row">
        <div class="row middle-md">
            <div class="col-md-4 center-xs">
                <?php get_template_part('template-parts/header/logo'); ?>
            </div>
            <div class="col-md-4 coming-soon-description">
                <h1 class="h4">Website Coming Soon</h1>
                <p>We are working hard to get our website underway, in the meantime you can contact us using the details below:</p>
                <p><a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a></p>
                <p>© All Rights Reserved <?php echo bloginfo(); ?></p>
            </div>
        </div>
    </section>
    <section class="section-row">
        <?php the_field('coming_soon_content','options'); ?>
    </section>
    
</div>
