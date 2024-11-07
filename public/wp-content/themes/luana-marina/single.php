<?php get_header(); ?>

<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>

            <?php get_template_part('template-parts/post/content', 'full'); ?>

        <?php } ?>

        <nav>
            <?php echo paginate_links(); ?>
        </nav>
    
    <?php }
?>

<?php get_footer(); ?>