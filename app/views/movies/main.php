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

<div class="search-bar">
    <div class="select">
        <select name="slct" id="slct">
            <option value="1"><p>Movie</p></option>
            <option value="2"><p>Actors</p></option>
        </select>
    </div>
    <input type='text' maxlength='100'>
    <button>Search</button>
</div>

<div class='movies-wrapper'>

    <div class='movie'>
        <div class='movie-cell name'><p>Movie</p></div>
        <div class='movie-cell year'><p>Release</p></div>
        <div class='movie-cell format'><p>Format</p></div>
        <div class='movie-cell actors'><p>Actors</p></div>
    </div>
    
<?php
	foreach($data as $elem)
	{
        echo "<div class='movie'>";
        foreach($elem as $key=>$value)
        {
            echo "<div class='movie-cell $key'>";
                echo "<p>$value</p>";
            echo "</div>";
        }
        echo "</div>";
	}
?>

</div>


</html>

