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
            load_theme_textdomain( 'luanamarina', get_template_directory() . '/languages' );
         
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
                'secondary' => __('Secondary Menu', 'luanamarina' )
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

    // Our custom post type function
    function create_my_custom_post_types_and_taxonomies() {
    
        register_post_type( 'my_movies',
        // CPT Options
            array(
                'labels'            => array(
                    'name'          => __( 'Movies' ),
                    'singular_name' => __( 'Movie' )
                ),
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array('slug' => 'movie'),
                'show_in_rest'      => true,
                'supports'          => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
            )
        );

        register_post_type( 'my_actors',
        // CPT Options
            array(
                'labels'            => array(
                    'name'          => __( 'Actors' ),
                    'singular_name' => __( 'Actor' )
                ),
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array('slug' => 'actor'),
                'show_in_rest'      => true,
                'supports'          => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
            )
        );

        register_post_type( 'my_directors',
        // CPT Options
            array(
                'labels'            => array(
                    'name'          => __( 'Directors' ),
                    'singular_name' => __( 'Director' )
                ),
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array('slug' => 'director'),
                'show_in_rest'      => true,
                'supports'          => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
            )
        );  
        
        // Now register the taxonomy
        register_taxonomy('my_genres', array('my_movies'), array(
            'labels'            => array (
                'name'          =>__( 'Genre' ),
                'singula_namre' =>__( 'Genre' )
            ),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'genre' ),
        ));   
        
        // Now register the taxonomy
        register_taxonomy('my_years', array('my_movies'), array(
            'labels'            => array (
                'name'          => __( 'Years' ),
                'singular_name' => __( 'Year' )
            ),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_in_rest'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'year' ),
        ));
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_my_custom_post_types_and_taxonomies' );

    add_action( 'mb_relationships_init', function() {
        MB_Relationships_API::register( [
            'id'            => 'movies_to_actors',
            'from'          => [
                'post_type' => 'my_movies',
                'meta_box'  => [
                    'title' => 'Actors',
                ],
            ],
            'to'            => [
                'post_type' => 'my_actors',
                'meta_box'  => [
                    'title' => 'Movies',
                ],
            ],
        ] );
    
        MB_Relationships_API::register( [
            'id'            => 'movies_to_directors',
            'from'          => [
                'post_type' => 'my_movies',
                'meta_box'  => [
                    'title' => 'Directors',
                ],
            ],
            'to'            => [
                'post_type' => 'my_directors',
                'meta_box'  => [
                    'title' => 'Movies',
                ],
            ],
        ] );
    } );

    function runtime_prettier($minutes) {
        $hours = floor ($minutes / 60);
        $remainingMinutes = $minutes % 60;

        if ($hours > 0 && $remainingMinutes > 0) {
            return "$hours hour" . ($hours > 1 ? "s" : "") . " $remainingMinutes minute" . ($remainingMinutes > 1 ? "s" : "");
        } elseif ($hours > 0) {
            return "$hours hour" . ($hours > 1 ? "s" : "");
        } else {
            return "$remainingMinutes minute" . ($remainingMinutes > 1 ? "s" : "");
        }
    }

    function lm_custom_excerpt_length( $length ) {
        return 15;
    }
    add_filter('excerpt_length', 'lm_custom_excerpt_length', 999);
    
    function lm_custom_excerpt_more( $more ) {
        return '…';
    }
    add_filter('excerpt_more', 'lm_custom_excerpt_more');

    function LM_orderby_filter( $query ) {
        if ( ( $query->is_post_type_archive('my_directors') || $query->is_post_type_archive('my_actors') ) && $query->is_main_query() ) {
            $query->set( 'orderby', 'title' );
            $query->set( 'order', 'ASC' );
        }
    }
    add_action( 'pre_get_posts', 'LM_orderby_filter' );

    function LM_custom_mail_sent( $contact_form ) {
        setcookie('form_submited', 1, time() +3600*24*365);
    }
    add_action('wpcf7_mail_sent', 'LM_custom_mail_sent');

    function lm_custom_scripts() { 
  
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js' ,array('jquery'), NULL, true );
    }
    add_action( 'wp_enqueue_scripts', 'lm_custom_scripts' );