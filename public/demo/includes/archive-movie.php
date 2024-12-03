<div class="col-sm-6 col-md-4 g-3" id="movie-<?php echo $movie['id']; ?>">

    <div class="card border border-success rounded-3 border-3 overflow-hidden">

        <img src="<?php echo $movie['posterUrl']; ?>" class="card-img-top" alt="<?php echo $movie['title']; ?>">

        <div class="card-body bg-success bg-opacity-10">

            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
            <p class="card-text"><?php echo substr($movie['plot'], 0, 100) . "..."; ?></p>
            <a href="movie.php?movie_id=<?php echo $movie['id']; ?>" class="btn btn-outline-success">Read More</a>

        </div>

    </div>

</div>