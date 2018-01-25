<div class="col-xs-12">
    <div class="row middle-md">
        <?php
        $i = 1;
        do {
            if(is_active_sidebar( "footer-widget-'.$i.'" )) {
                echo '<div class="footer-widget-col col-lg col-md-6 col-xs-12 offset-top-xs">';
                $dyna_sidebar_name = 'Footer Widget '.$i;
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($dyna_sidebar_name) ) : endif;
                echo '</div>';
            }
            
            $i++;
        } while ($i < 5);
        
        ?>

    </div>
</div>

