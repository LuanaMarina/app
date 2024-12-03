<?php get_header(); ?>

<div class="row">

    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <div>
                <?php the_content(); ?>
            </div>

        <?php }
    } ?>

    <?php $connected = new WP_Query( [
        'relationship' => [
            'id'       => 'movies_to_directors',
            'to'       => get_the_ID(),
        ],
        'nopaging'     => true,
    ] );

    if( $connected->have_posts() ) { ?>

        <div class="movies">

            <div class="h5 my-3">
                <?php _e('Filme regizate de ', 'luanamarina'); ?> <?php the_title(); ?>
            </div>
            
            <div class="row">
                <?php while ( $connected->have_posts() ) { $connected->the_post();

                    echo "<div class='col-12 mb-3 col-sm-6 col-md-4'>";
                    get_template_part('template-parts/my_movies/content', 'excerpt');
                    echo "</div>";
            
                } wp_reset_postdata();  ?>
            </div>

        </div>

    <?php } ?>

</div>

<?php get_footer(); ?>