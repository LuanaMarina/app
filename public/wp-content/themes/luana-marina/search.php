<?php get_header(); ?>

<h1>
    Search results for: <?php echo $_GET['s']; ?>
</h1>

<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>

            <?php get_template_part('template-parts/post/content', 'excerpt'); ?>

        <?php } ?>

        <?php get_template_part('template-parts/pagination/pagination', 'links'); ?>
    
    <?php }
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>