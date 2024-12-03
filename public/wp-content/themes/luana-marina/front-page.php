<?php get_header(); ?>

<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); ?>

            <div class="row">
                <h2 class="text-center">Inspiră-te pentru următoarea seară de film!</h2>

                <div class="banner mt-5 text-center overflow-hidden position-relative">
                    <div class="slider position-absolute" style="--quantity: 10">
                        <div class="slider-item position-absolute" style="--position: 1">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://m.media-amazon.com/images/M/MV5BMjEwNmEwYjgtNTk3ZC00NjljLTg5ZDctZTY3ZGQwZjRkZmQxXkEyXkFqcGc@._V1_.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 2">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="http://i.imgur.com/fXn63rt.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 3">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BMTU2Mjk2NDkyMl5BMl5BanBnXkFtZTgwNTk0NzcyMDE@._V1_SX300.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 4">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://flxt.tmsimg.com/assets/p177954_p_v8_ad.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 5">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BMzk0NzQxMTM0OV5BMl5BanBnXkFtZTcwMzU4MDYyNQ@@._V1_SX300.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 6">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://m.media-amazon.com/images/M/MV5BMTQxNzY1MjI5NF5BMl5BanBnXkFtZTcwNTI0MDY1OQ@@._V1_.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 7">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BNTM1NjYyNTY5OV5BMl5BanBnXkFtZTcwMjgwNTMzMQ@@._V1_SX300.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 8">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BMjExMDA4NDcwMl5BMl5BanBnXkFtZTcwODAxNTQ3MQ@@._V1_SX300.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 9">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BMTUxNzc0OTIxMV5BMl5BanBnXkFtZTgwNDI3NzU2NDE@._V1_SX300.jpg" alt="">
                        </div>
                        <div class="slider-item position-absolute" style="--position: 10">
                            <img class="w-100 h-100 object-fit-cover rounded border border-3 border-success-subtle" src="https://images-na.ssl-images-amazon.com/images/M/MV5BMTMzODU0NTkxMF5BMl5BanBnXkFtZTcwMjQ4MzMzMw@@._V1_SX300.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php get_template_part('template-parts/pagination/pagination', 'links'); ?>
    
    <?php }
?>

<?php get_footer(); ?>