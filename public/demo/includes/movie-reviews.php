<?php 
    $conn = dbConnect();
    $review_data = array(
        'show_reviews_form' => false
    );

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE IF NOT EXISTS reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        movie_id bigint(6) UNSIGNED NOT NULL,
        full_name tinytext NOT NULL,
        email VARCHAR(100) NOT NULL,
        review TEXT NOT NULL
    )";

    if(mysqli_query($conn, $sql)) {

        $review_data['show_reviews_form'] = true;

        $sql_all_reviews = "SELECT full_name, email, review FROM reviews WHERE movie_id =" . $_GET['movie_id'];
        $review_list = mysqli_query($conn, $sql_all_reviews);

        $review_data['count'] = mysqli_num_rows($review_list);

        if($review_data['count'] > 0) {
            $review_data['list'] = mysqli_fetch_all($review_list, MYSQLI_ASSOC);
            $reviews_emails = array_column($review_data['list'], 'email');
        }

        if(isset($_POST['reviews_form'])) {
            if(isset($reviews_emails) && in_array($_POST['email'], $reviews_emails)) {
                $review_data['alert'] = 'danger';
                $review_data['message'] = 'It seems that you have already left a review for this movie. You cannot leave multiple reviews for the same movie!';
            } else {
                $movie_id = mysqli_real_escape_string($conn, $_GET['movie_id']);
                $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $review = mysqli_real_escape_string($conn, $_POST['review']);
                $sql = "INSERT INTO reviews (movie_id, full_name, email, review)
                VALUES ('". $movie_id ."', '". $full_name ."', '". $email ."', '". $review ."')";

                if(mysqli_query($conn, $sql)) {
                    // Dacă review-ul a fost adăugat în baza de date cu succes!
                    $review_data['show_reviews_form'] = false;
                    $review_data['alert'] = 'success';
                    $review_data['message'] = 'The form has been submitted successfully!';

                    //$review_list = mysqli_query($conn, $sql_all_reviews);
                    //$review_data['list'] = mysqli_fetch_all($review_list, MYSQLI_ASSOC);
                    $review_data['list'][] = array(
                        'full_name' => $_POST['full_name'],
                        'email' => $_POST['email'],
                        'review' => $_POST['review']
                    );
                    $review_data['count']++;
                } else {
                    // Dacă review-ul nu s-a adăugat, setez o eroare!
                    $review_data['alert'] = 'danger';
                    $review_data['message'] = 'Error. The review could not be added! Try again!';
                }
            }
        }
    }
?>

<?php if(isset($review_data['message']) && isset($review_data['alert'])) { ?>
    <div class="alert my-3 alert-<?php echo $review_data['alert']; ?>" role="alert">
        <?php echo $review_data['message']; ?>
    </div>
<?php } ?>

<?php if($review_data['show_reviews_form'] == true) { ?>
    <div class="my-3 p-3 bg-success bg-opacity-10 border border-5 border-success rounded-5">
        <?php
            if($review_data['count'] > 0) { ?>
                <p class="fw-bold text-center">Lasă o recenzie pentru acest film!</p>
            <?php } else { ?>
                <p class="fw-bold text-center">Fii primul care lasă o recenzie pentru acest film!</p>
            <?php }
        ?>
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Your name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name']; ?>" required>
                <label for="name">Nume:</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
                <label for="email">Adresa de email:</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="review" name="review" type="message" required><?php if(isset($_POST['review'])) echo $_POST['review']; ?></textarea>
                <label for="txt">Mesajul tău:</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="agree" value="1" id="checkDefault" required>
                <label class="form-check-label" for="checkDefault">Sunt de acord cu prelucrarea datelor cu caracter personal.</label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-success" type="submit" name="reviews_form">Trimite!</button>
            </div>
        </form>
    </div>
<?php } ?>

<?php 
    if(isset($review_data['count']) && $review_data['count'] > 0) { ?>

        <div class="h4 mt-4">
            Reviews:
        </div>
        <?php foreach(array_reverse($review_data['list']) as $review) { ?>
            <div class="my-3 p-3 border border-success rounded-5">
                <div class="fw-bold pb-3 mb-3 border-bottom">
                    <?php echo $review['full_name']; ?>
                </div>

                <?php echo $review['review']; ?>
            </div>
        <?php } ?>
    <?php }
?>