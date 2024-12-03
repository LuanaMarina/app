<?php require_once ('includes/header.php'); ?>

    <div class="bg-success bg-opacity-10 py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0 border-success border-5 text-center bg-success bg-opacity-10">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body-title text-center text-white py-2">
                                        <h1>Genres</h1>
                                    </div>
                                    <div class="pt-5">
                                        <h4>Descoperă lumea fascinantă a genurilor de filme!</h4>
                                        <p>
                                            Ești gata să pornești într-o aventură cinematografică?
                                            Aici te așteaptă cele mai tari genuri de filme, de la acțiune explozivă și comedii care te vor face să râzi în hohote,
                                            până la drame emoționante și thrillere pline de suspans.
                                            Fiecare gen îți oferă o experiență unică, iar noi suntem aici să-ți oferim recomandări,
                                            recenzii și tot ce ai nevoie pentru a găsi următorul tău film preferat!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row py-5">
                                <div class="col-lg-12">
                                    <?php foreach($genres as $genre) { ?>
                                        <a href="movies.php?genre=<?php echo $genre; ?>" class="btn btn-outline-success m-4 p-4">
                                            <?php echo $genre; ?>
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once ('includes/footer.php'); ?>