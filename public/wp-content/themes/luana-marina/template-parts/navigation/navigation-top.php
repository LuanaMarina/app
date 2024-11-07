<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-brand-wrapper">
            <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a class="navbar-brand" href="' . get_bloginfo('url') . '">Navbar</a>';
                }
            ?>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav me-auto my_navbar',
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'fallback_cb'    => false,
                    'depth'          => 2,
                    'walker'         => new WP_Bootstrap_Navwalker(),
                ));
            ?>
            <?php echo get_search_form(); ?>
        </div>
    </div>
</nav>