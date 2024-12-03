<?php

    function runtime_prettier($minutes) {
        $hours = floor ($minutes / 60);
        $remainingMinutes = $minutes % 60;

        if ($hours > 0 && $remainingMinutes > 0) {
            return "$hours hour" . ($hours > 1 ? "s" : "") . " $remainingMinutes minute" . ($remainingMinutes > 1 ? "s" : "");
        } elseif ($hours > 0) {
            return "$hours hour" . ($hours > 1 ? "s" : "");
        } else {
            return "$remainingMinutes minute" . ($remainingMinutes > 1 ? "s" : "");
        }
    };

    function check_old_movie($movieAge) {
        if (date ("Y") - $movieAge > 40) {
            return date ("Y") - $movieAge;
        } else {
            return FALSE;
        }
    };

    function find_movies_by_genre($movieItem) {
        if (in_array($_GET['genre'], $movieItem['genres'])) {
            return true;
        } else {
            return false;
        }
    };

    function find_movie_by_id($item) {
        if (!isset($_GET['movie_id'])) {
            return false;
        }
        if (intval($_GET['movie_id']) === $item['id']) {
            return true;
        } else {
            return false;
        }
    }

    function find_movie_by_title($item) {
        if(stripos($item['title'], $_GET['s']) === false) {
            return false;
        } else {
            return true;
        }
    }

    function dbConnect($host = 'localhost', $username = 'php-user', $password = 'php-password', $dbname = 'php-proiect') {
        return mysqli_connect($host, $username, $password, $dbname);
    }
