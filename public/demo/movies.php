<?php require_once ('includes/header.php'); ?>

        <!-- Start Content Area -->

            <?php
                $fav_movies = isset($_COOKIE['fav_movies']) ? json_decode($_COOKIE['fav_movies'], true) : array();

                if(isset($_GET['page']) && $_GET['page'] === 'favorites') {
                    if(!empty($fav_movies)) {
                        $movie_list = array_filter($movies, function($movie) use($fav_movies) {
                            return isset($movie['id']) && in_array($movie['id'], $fav_movies);
                        });
                        $title_before = 'Favorites';
                    } else { 
                        $movie_list = array();
                        $title_before = 'Favorites';
                    }
                } elseif (isset($_GET['genre']) && in_array($_GET['genre'], $genres)) {
                    $movie_list = array_filter($movies, 'find_movies_by_genre');
                    $title_before = $_GET['genre'] . ' ';
                } else {
                    $movie_list = $movies;
                    $title_before = '';
                }
            ?>
            
            <div class="bg-success bg-opacity-10">
                <div class="container py-3">
                    <h1><?php echo $title_before; ?> Movies</h1>
                    <div class="row">
                        <?php if(!empty($movie_list)) { ?>
                            <?php foreach ($movie_list as $movie_key => $movie) { ?>
                                <?php require ('includes/archive-movie.php'); ?>
                            <?php } ?>
                        <?php } else { ?>
                            <p>Nu există filme preferate în acest moment!</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

        <!-- End Content Area -->

<?php require_once ('includes/footer.php'); ?>