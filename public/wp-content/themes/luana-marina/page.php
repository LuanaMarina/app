<?php get_header(); ?>

<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>
        
            <div class="row my-5 justify-content-center">
                <div class="col-md-6">
                    <article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
                        <div class="card-body">
                            <h1 class="post-title text-center">
                                <?php the_title(); ?>
                            </h1>

                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            
        <?php }
    }
?>

<?php get_footer(); ?>