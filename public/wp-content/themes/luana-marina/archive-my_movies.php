<?php get_header(); ?>

<?php
    if ( have_posts() ) { ?>
        <div class="row mb-5">

            <?php while ( have_posts() ) {
                the_post(); ?>
                
                <div class="col-sm-6 col-md-4 g-3" id="movie-<?php the_ID(); ?>">
                    <?php get_template_part('template-parts/my_movies/content', 'excerpt'); ?>
                </div>

            <?php } ?>

        </div>

        <?php get_template_part('template-parts/pagination/pagination', 'links'); ?>
    
    <?php }
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>