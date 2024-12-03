<?php require_once ('includes/header.php'); ?>

    <?php

        ob_start();

        $movies_filtered = array_filter($movies, 'find_movie_by_id');

        if(isset($movies_filtered) && $movies_filtered) {
            $movie = reset($movies_filtered); ?>

            <!-- Start Content Area -->

                <div class="bg-success bg-opacity-10">
                    <div class="container pb-5">
                        <div class="row justify-content-between align-items-center pt-md-5 pb-md-5">
                            <div class="col-auto">
                                <h1><?php echo $movie['title']; ?></h1>
                            </div>

                            <div class="col-auto">

                                <?php
                                    $fav_movies = array();

                                    $movie_favorites_filename = './assets/movie-favorites.json';
                                    $fav_stats = json_decode(file_get_contents($movie_favorites_filename), true);

                                    if(!$fav_stats) $fav_stats = array();

                                    if(isset($_COOKIE['fav_movies'])) {
                                        $fav_movies = json_decode($_COOKIE['fav_movies'], true);
                                    }
                                
                                    if(isset($_POST['fav'])) {
                                        if($_POST['fav'] === '1' && !in_array($_GET['movie_id'], $fav_movies)) {
                                            $fav_movies[] = $_GET['movie_id'];
                                            if(array_key_exists($_GET['movie_id'], $fav_stats)) {
                                                $fav_stats[$_GET['movie_id']]++;
                                            } else {
                                                $fav_stats[$_GET['movie_id']] = 1;
                                            }
                                        } elseif($_POST['fav'] === '0' && in_array($_GET['movie_id'], $fav_movies)) {
                                            if(($key = array_search($_GET['movie_id'], $fav_movies)) !== false)  {
                                                unset($fav_movies[$key]);
                                                $fav_movies = array_values($fav_movies);
                                                
                                                if($fav_stats[$_GET['movie_id']] > 0) $fav_stats[$_GET['movie_id']]--;
                                            }
                                        }
                                        setcookie('fav_movies', json_encode($fav_movies), time() + (365 * 24 * 60 * 60));
                                        file_put_contents($movie_favorites_filename, json_encode($fav_stats, JSON_PRETTY_PRINT));
                                        header('Location: ' . $_SERVER['REQUEST_URI']);
                                    }
                                ?>

                                <form method="POST" action="">
                                    <input type="hidden" name="fav" value="<?php echo (in_array($_GET['movie_id'], $fav_movies)) ? "0" : "1"; ?>">
                                    <button class="btn btn-outline-success position-relative" type="submit">
                                        <?php echo (in_array($_GET['movie_id'], $fav_movies)) ? "Elimină din favorite!" : "Adaugă la favorite!"; ?>

                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                            <?php echo $current_movie_fav_stats = (isset($fav_stats[$_GET['movie_id']])) ? $fav_stats[$_GET['movie_id']] : 0; ?>
                                            <span class="visually-hidden"><?php echo $current_movie_fav_stats; ?></span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                <img src="<?php echo $movie['posterUrl']; ?>" class="card-img-top border border-success border-5 rounded-5" alt="<?php echo $movie['title']; ?>">
                            </div>

                            <div class="col-md-8 col-lg-9">
                                <h2>
                                    <?php
                                        $release_year = $movie['year'];
                                        $movieAge = check_old_movie ($release_year);
                                        echo $release_year;
                                        if ($movieAge) { ?>

                                        <span class="badge text-success">Old movie - <?php echo $movieAge; ?> years</span>
                                    
                                    <?php } ?>
                                </h2>
                                <p>
                                    <?php echo $movie['plot']; ?>
                                </p>
                                <p>
                                    Genres:
                                    <span class="fw-bold"><?php echo implode(', ', $movie['genres']); ?></span>
                                </p>
                                <p>
                                    Directed By:
                                    <span class="fw-bold"><?php echo $movie['director']; ?></span>
                                </p>

                                <p>
                                    Runtime:
                                    <span class="fw-bold">
                                        <?php 
                                            $movie_runtime_in_minutes = $movie['runtime'];
                                            echo runtime_prettier($movie_runtime_in_minutes);
                                        ?>
                                    </span>
                                </p>

                                <p>
                                    <span class="fw-bold">Actors:</span>
                                    <ul class="green-bullets">
                                        <?php 
                                            $actors = explode(', ', $movie['actors']);
                                            foreach($actors as $actor) {
                                                echo '<li>' . $actor . '</li>';
                                            }
                                        ?>
                                    </ul>
                                </p>
                            </div>
                        </div>

                        <!-- Start Rating Area -->

                            <div class="row justify-content-center mt-md-5">
                                <div class="col-12 col-md-10">

                                    <?php include_once('includes/movie-ratings.php'); ?>

                                </div>
                            </div>

                        <!-- End Rating Area -->

                        <!-- Start Reviews Area -->
                            
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-10">
                                    
                                    <?php include_once('includes/movie-reviews.php'); ?>
                                    
                                </div>
                            </div>

                        <!-- End Reviews Area -->

                    </div>
                </div>

            <!-- End Content Area -->

        <?php } else { ?>

        <div class="container mb-5">
            <div class="row">
                <div class="p-5 text-center">
                    <h5 class="pb-5">We're sorry, in this page is not movies!</h5>
                    <a href="movies.php" class="btn btn-success">Lista de filme!</a>
                </div>
            </div>
        </div>

    <?php } ?>

<?php require_once ('includes/footer.php'); ?>