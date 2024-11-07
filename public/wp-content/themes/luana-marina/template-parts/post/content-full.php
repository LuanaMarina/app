
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="card-body">

                <h1>
                    <?php the_title(); ?>
                </h1>

                <?php the_content(); ?>
                
            </div>
        </article>