<?php require_once ('includes/header.php'); ?>       
       
    <!-- Start Content Area -->

        <div class="bg-success bg-opacity-10">
            <div class="container">
                <div class="row">
                    <div class="welcome-message rounded-5 rounded-top-0 text-center bg-success-subtle">
                        <?php
                            date_default_timezone_set('Europe/Bucharest');
                            $current_hour = date("H");

                            if ($current_hour >= 5 && $current_hour < 12) {
                                $greeting = "Good Morning";
                            } elseif ($current_hour >= 12 && $current_hour < 18) {
                                $greeting = "Good Afternoon";
                            } elseif ($current_hour >= 18 && $current_hour < 22) {
                                $greeting = "Good Evening";
                            } else {
                                $greeting = "Good Night";
                            }
                        ?>
                        <h2><?php echo $greeting; ?></h2>
                        <p class="fw-medium">Bine ai venit în lumea filmelor magice!</p>
                        <a class="btn btn-outline-success mb-2" href="movies.php" role="button">Vezi toate filmele!</a>
                    </div>

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
            </div>
        </div>

    <!-- End Content Area -->

<?php require_once ('includes/footer.php'); ?>