<html>
<head>
    <title>Movies Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
</head>

<header>
    <div class="header-inside"></div>
    <div class="centered-block description"><h1>Movies Library</h1></div>     
</header>

<div class="action-bar">
    <input type="file" onchange="handleFile(event)"/>
    <button type='button' onclick="showHideForm()">Add Movie</button>
</div>

<form id="addMovieForm" onsubmit="event.preventDefault(); return addMovie();" hidden>
    <input id='title' type='text' maxlength='100' placeholder="Title" require>
    <input id='year' type='text' pattern="^[+]?\d*$" 
        maxlength='4' placeholder="Release Year" require>
    <input id='format' type='text' maxlength='100' placeholder="Format" require>
    <input id='actors' type='text' maxlength='1000' placeholder="Actors" require>
    <input type='button' value="Close" onclick="showHideForm()"></button>
    <input type='submit'></button>
</form>

<div class="action-bar">
    <div class="action"><p>Delete Movie</p></div>
    <input id="titleToDelete" type='text' maxlength='100'>
    <button onclick='deleteMovie()'>Ok</button>
</div>

<div class="action-bar">
    <div class="select">
        <select id="select">
            <option value="title"><p>Title</p></option>
            <option value="actors"><p>Actors</p></option>
        </select>
    </div>
    <input id='inputText' type='text' maxlength='100'>
    <button onclick='search()'>Search</button>
</div>

<div class='movies-wrapper'>
    <div class='movie'>
        <div class='movie-cell title'><p>Movie</p></div>
        <div class='movie-cell year'><p>Release</p></div>
        <div class='movie-cell format'><p>Format</p></div>
        <div class='movie-cell actors'><p>Actors</p></div>
    </div>
</div>

<div class='movies-wrapper' id="movieList">
<?php
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
?>
</div>

<script src='/js/main.js'></script>
</html>

