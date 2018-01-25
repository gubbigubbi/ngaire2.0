<div class="container">
    <div class="row">
        <div class="col-xs">
            <div class="site-info-wrapper">
                <?php if ( is_active_sidebar( 'after-footer-widget' ) ) : 
                    dynamic_sidebar( 'after-footer-widget' ); 
                else: ?>
                <div class="row">
                    <div class="col-xs-12 center-xs">
                        <a href="/privacy-policy">Privacy Policy</a> 
                        <a href="/" rel="me">&copy; <?php echo date("Y") ?> <?php echo bloginfo() ?>.</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>