<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Luana-Marina</title>
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        >
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php define("LOGO", "&#13040"); ?>

        <?php include_once('includes/functions.php'); ?>

        <?php

            if (!in_array(basename($_SERVER ['PHP_SELF']), array('index.php', 'contact.php'))) {

                $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
                $genres = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['genres'];
            }
        ?>

        <!-- Start Navbar -->

            <nav class="navbar navbar-expand-lg bg-success-subtle">

                <div class="container-fluid">

                    <a class="navbar-brand" href="index.php"><?php echo LOGO; ?></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse header-navbar" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <?php 
                                $menu_lists = array (
                                    array (
                                        "title" => "Home",
                                        "link" => "index.php",
                                    ),
                                    array (
                                        "title" => "Movies",
                                        "link" => "movies.php"
                                    ),
                                    array(
                                        "title" => "Genres",
                                        "link" => "genres.php",
                                    ),
                                    array (
                                        "title" => "Contact",
                                        "link" => "contact.php",
                                    ),
                                );

                                if(isset($_COOKIE['fav_movies'])) {
                                    $fav_movies = json_decode($_COOKIE['fav_movies'], true);
                                    if(!empty($fav_movies)) {
                                        $menu_lists[] = array (
                                            "title" => "Favorites",
                                            "link" => "movies.php?page=favorites"
                                        );
                                    }
                                }
                            ?>

                            <?php 
                                foreach ($menu_lists as $menu_list) { ?>

                                <li class="nav-item">
                                    <a class="nav-link <?php if (basename($_SERVER ['PHP_SELF']) === $menu_list ['link']) echo 'active' ?> " aria-current="page" href="<?php echo $menu_list ['link']; ?>"><?php echo $menu_list ['title']; ?></a>
                                </li>

                            <?php } ?>

                        </ul>

                        <?php include_once('includes/search-form.php'); ?>

                    </div>

                </div>

            </nav>

        <!-- End Navbar -->
