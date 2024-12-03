<?php get_header(); ?>

<?php
    $term = get_queried_object();
?>

<h1 class="mb-5">
    <?php echo sprintf(__('Movies in %s'), $term->name); ?>
</h1>

<?php echo term_description(); ?>

<?php if (have_posts()) { ?>

    <div class="row mb-5">

        <?php while ( have_posts() ) {
            the_post(); ?>
            
            <div class="col-sm-6 col-md-4 g-3" id="movie-<?php the_ID(); ?>">
                <?php get_template_part('template-parts/my_movies/content', 'excerpt'); ?>
            </div>

        <?php } ?>

    </div>

    <?php get_template_part('template-parts/pagination/pagination', 'links'); ?>

<?php } else { ?>

    <p><?php _e('No movies found in this category.'); ?></p>

<?php } ?>

<?php get_footer(); ?>