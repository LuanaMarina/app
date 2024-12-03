<?php get_header(); ?>

<div class="row">

    <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); ?>

                <h1><?php the_title(); ?></h1>

                <div class="col-md-4 col-lg-3 py-md-5">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('full', ['class' => 'img-thumbnail border border-success border-5 rounded-5', 'alt' => the_title_attribute(['echo' => false])]);
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri() . '/images/404.webp') . '" class="img-thumbnail border border-success border-5 rounded-5" alt="Placeholder Image">';
                        }
                    ?>
                </div>

                <div class="col-md-8 col-lg-9 py-md-5">
                    <p>
                        <?php the_content(); ?>
                    </p>
                    
                    <p>
                        <?php the_terms( $post->ID, 'my_genres', 'Genres: ', ', ', ' ' ); ?>
                    </p>

                    <p>
                        <?php the_terms( $post->ID, 'my_years', 'Year: ', ', ', ' ' ); ?>
                    </p>
                        
                    <?php
                        
                        if (get_field('my_runtime')) { ?>

                            <?php
                                $runtime_minutes = get_field('my_runtime');
                                $pretty_runtime = runtime_prettier($runtime_minutes);
                            ?>

                            <div id="TimeHourglass" data-runtime="<?php echo $runtime_minutes; ?>" data-runtime-pretty="<?php echo htmlspecialchars($pretty_runtime, ENT_QUOTES, 'UTF-8'); ?>">
                                <p>Runtime:
                                    <span id="toggleFormat" style="cursor: pointer;">
                                        <span id="unicodeIcon">&#8987;</span>
                                    </span>
                                    <span id="displayRuntime"><?php echo $pretty_runtime; ?></span>
                                </p>
                            </div>
                            
                        <?php }
                    ?>

                    <p>
                        <?php
                            $connected = new WP_Query( [
                                'relationship' => [
                                    'id'   => 'movies_to_actors',
                                    'from' => get_the_ID(),
                                ],
                                'nopaging'     => true,
                            ] );
                            if($connected->have_posts()){

                                echo "<div class='actors'>";

                                echo __('Actors', 'luanamarina').": ";
                            
                                $i = 0; 
                                while ( $connected->have_posts() ){ 
                                    $connected->the_post();
                                    
                                    if($i !== 0){echo ", ";}
                                    echo "<a href='". get_the_permalink() ."'>". get_the_title() ."</a>";
                                    
                                    $i++; 
                                } 
                                wp_reset_postdata(); 
                                unset($i); 
                            
                                echo "</div>";
                            }
                            unset($connected);
                        ?>
                    </p>

                    <p>
                        <?php
                            $connected = new WP_Query( [
                                'relationship' => [
                                    'id'   => 'movies_to_directors',
                                    'from' => get_the_ID(),
                                ],
                                'nopaging'     => true,
                            ] );
                            if($connected->have_posts()){

                                echo "<div class='directors'>";

                                echo __('Directors', 'luanamarina').": ";
                            
                                $i = 0; 
                                while ( $connected->have_posts() ){ 
                                    $connected->the_post();
                                    
                                    if($i !== 0){echo ", ";}
                                    echo "<a href='". get_the_permalink() ."'>". get_the_title() ."</a>";
                                    
                                    $i++; 
                                } 
                                wp_reset_postdata(); 
                                unset($i); 
                            
                                echo "</div>";
                            }
                            unset($connected);
                        ?>
                    </p>

                </div>
            <?php }
        }
    ?>

</div>

<?php get_footer(); ?>