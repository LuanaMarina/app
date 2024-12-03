<?php get_header(); ?>

<?php if ( have_posts() ) { ?>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php while ( have_posts() ) {
            the_post(); ?>

            <div class="" id="director-<?php the_ID(); ?>">
                <?php get_template_part('template-parts/my_directors/content', 'excerpt'); ?>
            </div>

        <?php } ?>

    </div>

    <?php get_template_part('template-parts/pagination/pagination', 'links'); ?>

<?php } ?>

<?php get_footer(); ?>