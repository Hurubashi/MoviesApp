<html>
<head>
    <title>Main</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<div>

<h1>Films</h1>
<?php

	foreach($data as $row)
	{
        echo $row["Film"];
        echo "<br>";
        echo $row["Year"];
        echo "<br>";
	}
	
?>
</div>

</html>