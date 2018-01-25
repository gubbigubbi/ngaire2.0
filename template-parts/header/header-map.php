<div class="section__header-map">   
    <div class="map-wrap">
        <?php
            $map_shortcode = get_field('header_shortcode');
            $map = do_shortcode($map_shortcode);
            echo $map;
        ?>
    </div>
</div>