<div class="card border-5 border-success rounded-5 overflow-hidden">

    <?php
        if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium', ['class' => 'card-img-top h-auto', 'alt' => get_the_title()]);
        } else {
            echo '<img src="' . esc_url(get_template_directory_uri() . '/images/404.webp') . '" class="card-img-top" alt="Placeholder Image">';
        }
    ?>

    <div class="card-body">

        <h5 class="card-title"><?php the_title(); ?></h5>

        <p class="card-text"><?php the_excerpt(); ?></p>

        <a href="<?php the_permalink(); ?>" class="btn btn-outline-success">Citeşte mai mult</a>

    </div>

</div>