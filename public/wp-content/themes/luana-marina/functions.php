<?php
    if ( ! function_exists( 'theme_setup' ) ) {
        /**
        * Sets up theme defaults and registers support for various WordPress features.
        *
        * Note that this function is hooked into the after_setup_theme hook, which runs
        * before the init hook. The init hook is too late for some features, such as indicating
        * support post thumbnails.
        */
        function theme_setup() {
         
            /**
             * Make theme available for translation.
             * Translations can be placed in the /languages/ directory.
             */
            load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
         
            /**
             * Add default posts and comments RSS feed links to <head>.
             */
            add_theme_support( 'automatic-feed-links' );
         
            /**
             * Enable support for post thumbnails and featured images.
             */
            add_theme_support( 'post-thumbnails' );

            add_theme_support( 'custom-logo' );
         
            /**
             * Add support for two custom navigation menus.
             */
            register_nav_menus( array(
                'primary'   => __( 'Primary Menu', 'luana-marina' ),
                'secondary' => __('Secondary Menu', 'text_domain' )
            ) );
         
            /**
             * Enable support for the following post formats:
             * aside, gallery, quote, image, and video
             */
            add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
        }
    }
    add_action( 'after_setup_theme', 'theme_setup' );

    /**
    * Add a sidebar.
    */
    function wpdocs_theme_slug_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar', 'luanamarina' ),
            'id'            => 'footer-widgets',
            'description'   => __( 'Widgets in this area will be shown in footer.', 'luanamarina' ),
            'before_widget' => '<div id="%1$s" class="widget col %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="footer-widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

    function add_theme_scripts_and_styles() {
    
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/modules/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );

        wp_enqueue_style( 'style', get_stylesheet_uri(), array( 'bootstrap' ) );
    
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/modules/bootstrap/js/bootstrap.min.js', array( 'jquery' ), 1.1, true );
    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts_and_styles' );

    require_once get_template_directory() . '/modules/class-wp-bootstrap-navwalker.php';