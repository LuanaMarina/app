<?php require_once ('includes/header.php'); ?>

    <div class="bg-success bg-opacity-10">
        <div class="container py-5">
            <div class="row">
                <?php if(isset($_GET['s']) && strlen($_GET['s']) >= 3) { ?>
        
                <h1 class="my-5">
                    Search results for: <strong><?php echo $_GET['s']; ?></strong>
                </h1>
                <?php include('includes/search-form.php'); ?>
                
                <?php $filtered_movies = array_filter($movies, 'find_movie_by_title'); ?>

                <?php if(count($filtered_movies) === 0) { ?>
                    <p class="mt-5">No results!</p>
                <?php } else { ?>
                    <div class="row">
                        <?php foreach ($filtered_movies as $movie) {
                            require ('includes/archive-movie.php');
                        } ?>
                    </div>
                <?php } ?>

                <?php } elseif (isset($_GET['s']) && strlen($_GET['s']) < 3) { ?>
                    <h1>Invalid search</h1>
                    <p>Too short search query.</p>
                    <?php include('includes/search-form.php'); ?>
                <?php } else { ?>
                    <h1>Invalid search</h1>
                    <p>Try something else!</p>
                    <?php include('includes/search-form.php'); ?>
                <?php } ?>
            </div>
        </div>
    </div>

<?php require_once ('includes/footer.php'); ?>