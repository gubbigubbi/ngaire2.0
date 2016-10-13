<?php
$header_poster = get_field('header_image');
$header_video_mp4 = get_field('header_video_mp4');
$header_video_mov = get_field('header_video_mov');
?>
<section class="section__video section-header no-padding-top no-padding-bottom">
    <video class="b-lazy" loop muted autoplay poster="<?php echo $header_poster; ?>" class="fullscreen-bg__video">
        <source data-src="<?php echo $header_video_mov; ?>" type="video/webm">
        <source dara-src="<?php echo $header_video_mp4; ?>" type="video/mp4">
        Ooops.. Your browsers doesnt support the video tag...
    </video>
</section>