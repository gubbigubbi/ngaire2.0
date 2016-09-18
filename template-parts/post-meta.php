<?php
?>
<div class="col-md-12 post-meta">
    <div class="post-meta-inner">
        <ul class="list-unstyled list-inline no-margin-left">
            <li><i class="icon ion-calendar"></i> <?php the_date(); ?></li>
            <li><a href="<?php the_author_url(); ?>"><i class="icon ion-person"></i> <?php the_author(); ?></a></li>
            <li><i class="icon ion-android-textsms"></i>  <?php comments_number( 'No comments'); ?> </li>
        </ul>
    </div>
</div>