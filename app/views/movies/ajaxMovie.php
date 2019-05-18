<?php

switch ($_POST["action"]) {
    case 'importData':
        importData();
        break;
    case 'search':
        search();
        break;
    case 'addMovie':
        addMovie();
        break;
    case 'deleteMovie':
        deleteMovie();
        break;
}

// Handle uploaded file and add its contents to db
function importData() {
    $movies_manager = new MoviesModel();
    // db table pattern
    $pattern = array(
        'Title',
        'Release Year',
        'Format',
        'Stars'
    );

    $array = explode(PHP_EOL, $_POST["text"]);
    $array = array_filter($array);
    $array = array_chunk($array, 4, true);

    foreach($array as $elem) {
        $movie = array();
        $i = 0;
        foreach ($elem as $row) {
            $chanks = explode(':', $row);
            if ($pattern[$i] == $chanks[0]) {
                $movie[$i] = trim($chanks[1]);
            }
            $i++;
        }
        $movies_manager->insertData($movie[0], $movie[1], $movie[2], $movie[3]);
    }
}

// Search in db for some row with value and return result
function search() {
    $movies_manager = new MoviesModel();
    $data = $movies_manager->searchBy($_POST['row'], $_POST['value']);
    if (empty($data)) {
        echo "<div class='movie'>";
        echo "</div>";
    }
    foreach($data as $elem)
	{
        echo "<div class='movie'>";
        foreach($elem as $key=>$value)
        {
            if ($key != 'uid') {
                echo "<div class='movie-cell $key'>";
                    echo "<p>$value</p>";
                echo "</div>";
            }
        }
        echo "</div>";
	}
}

function addMovie() {
    $movies_manager = new MoviesModel();
    // TRIM THEM ALLL!!!!!!!
    $title = trim($_POST['title']);
    $year = trim($_POST['year']);
    $format = trim($_POST['format']);
    $actors = trim($_POST['actors']);
    if (!empty($title) && !empty($year) && !empty($format) && !empty($actors))
        $movies_manager->insertData($title, $year, $format, $actors);
    $movies_manager->insertData($_POST['title'], $_POST['year'], 
                            $_POST['format'], $_POST['actors']);
}

function deleteMovie() {
    $movies_manager = new MoviesModel();
    $movies_manager->deleteMovie($_POST['title']);
}

?>