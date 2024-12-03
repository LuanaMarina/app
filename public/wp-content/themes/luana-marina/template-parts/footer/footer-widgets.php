<?php if ( is_active_sidebar( 'footer-widgets' ) ) { ?>
    <div class="container-fluid bg-success-subtle p-3" id="footer-sidebar">
        <div class="footer-siderbar row row-cols-1 row-cols-md-3">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </div>
    </div>
<?php } ?>