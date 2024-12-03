<?php
    $movie_id = intval($_GET['movie_id']);
    $rating_file = './assets/movie-rating.json';

    if (!file_exists($rating_file)) {
        file_put_contents($rating_file, json_encode([]));
    }

    $exist_rating = json_decode(file_get_contents($rating_file), true);
    if(!isset($exist_rating[$movie_id])) {
        $exist_rating[$movie_id] = array();
    }

    $total_votes = 0;
    $sum_ratings = 0;
    foreach ($exist_rating[$movie_id] as $rating => $count) {
        $total_votes += $count;
        $sum_ratings += $rating * $count;
    }

    if ($total_votes > 0) {
        $average_rating = $sum_ratings / $total_votes;
        echo "<div class='alert alert-success text-center'>Nota medie a filmului este: " . round($average_rating, 1) . " (".$total_votes." vizitatori au votat acest film!)</div>";
    }

    $user_rating = null;
    if (isset($_COOKIE['voted_' . $movie_id])) {
        $cookie_data = json_decode($_COOKIE['voted_' . $movie_id], true);
        $user_rating = $cookie_data['rating'] ?? null;
    }

    if ($user_rating !== null) {
        echo "<div class='alert alert-success text-center'>Ai votat deja acest film cu nota: $user_rating</div>";
    } else { ?>
        <form action="" method="POST">
            <h4 class="text-center">Evaluează acest film!</h4>
            <div class="my-3 align-items-center justify-content-center">
                <div class="star-group justify-content-center">
                    <input type="radio" class="star" id="one" name="rating" value="1" required>
                    <label class="d-none" for="one"></label>
                    <input type="radio" class="star" id="two" name="rating" value="2" required>
                    <label class="d-none" for="two"></label>
                    <input type="radio" class="star" id="three" name="rating" value="3" required>
                    <label class="d-none" for="three"></label>
                    <input type="radio" class="star" id="four" name="rating" value="4" required>
                    <label class="d-none" for="four"></label>
                    <input type="radio" class="star" id="five" name="rating" value="5" required>
                    <label class="d-none" for="five"></label>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-outline-success">Votează!</button>
                </div>
            </div>
        </form>
    <?php }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['rating'])) {
            $rating = intval($_POST['rating']);
            if ($user_rating !== null) {
                echo "<div class='alert alert-success text-center'>Ai votat deja acest film cu nota: $user_rating</div>";
            } else {
                if (isset($exist_rating[$movie_id][$rating])) {
                    $exist_rating[$movie_id][$rating]++;
                } else {
                    $exist_rating[$movie_id][$rating] = 1;
                }
                file_put_contents($rating_file, json_encode($exist_rating, JSON_PRETTY_PRINT));
                setcookie('voted_' . $movie_id, json_encode(['rating' => $rating]), time() + (365 * 24 * 60 * 60));
                echo "<div class='alert alert-success text-center'>Mulțumim pentru votul tău!</div>";
            }
        }
    }
?>