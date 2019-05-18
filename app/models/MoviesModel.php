<?php

class MoviesModel extends Model
{
	public function getData()
	{	
		try {
			$sql = "SELECT * FROM movie ORDER BY movie.title ASC";
			$stmt = Database::$pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
		} catch (PDOException $e){
			$result = handle_sql_errors($selectQuery, $e->getMessage());
		}
		return $result;
	}

	public function insertData($title, $year, $format, $actors) {
		$sql = "INSERT INTO movie(`uid`, `title`, `year`, `format`, `actors`) 
							VALUES (:uid, :title, :year, :format, :actors)";
		$stmt = Database::$pdo->prepare($sql);
		$uid = uniqid();
		$stmt->execute(['uid' => $uid, 
						'title' => htmlspecialchars($title), 
						'year' => htmlspecialchars($year), 
						'format' => htmlspecialchars($format), 
						'actors' => htmlspecialchars($actors)]);					
	}

	function searchBy($row, $value){
		$value = "%$value%";
		$sql = "SELECT * FROM movie WHERE $row LIKE ?";
		$stmt = Database::$pdo->prepare($sql);
		$stmt->execute(array(htmlspecialchars($value)));
        $result = $stmt->fetchAll();
        return $result;
	}

	function deleteMovie($title) {
		$sql = "DELETE FROM movie WHERE movie.title = :title";
		$stmt = Database::$pdo->prepare($sql);
        return $stmt->execute(['title' => htmlspecialchars($title)]);
	}

}