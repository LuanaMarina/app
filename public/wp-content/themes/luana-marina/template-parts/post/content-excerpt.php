<div class="row my-5">

    <article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
        
        <div class="card-body">

            <h1>
                <?php the_title(); ?>
            </h1>

            <?php the_excerpt(); ?>

            <div class="post-meta">
                <span class="text-muted">Publicat pe: <?php echo get_post_time('d.m.Y'); ?> Ora: <?php echo get_post_time('H:i'); ?></span>
                <br>
                <span class="text-muted">Autor: <?php echo get_the_author(); ?></span>
            </div>

            <a href="<?php the_permalink(); ?>" class="btn btn-success mt-2">Citește mai mult</a>

        </div>

    </article>
    
</div>