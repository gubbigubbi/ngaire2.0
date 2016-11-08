<div class="container">
    <div class="row">
        <div class="col-xs">
            <?php if ( is_active_sidebar( 'after-footer-widget' ) ) : 
                dynamic_sidebar( 'after-footer-widget' ); 
            else: ?>
            <a href="/" rel="me">&copy; <?php echo date("Y") ?> <?php echo bloginfo() ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>