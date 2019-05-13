<?php

class MoviesModel extends Model
{
	public function getData()
	{	
		try {
			$sql = "SELECT * FROM movie ORDER BY movie.title DESC";
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
		$stmt->execute(['uid' => $uid, 'title' => $title, 
						'year' => $year, 'format' => $format, 'actors' => $actors]);
	}

	function searchBy($row, $value){
		$value = "%$value%";
		$sql = "SELECT * FROM movie WHERE $row LIKE ?";
		$stmt = Database::$pdo->prepare($sql);
		$stmt->execute(array($value));
        $result = $stmt->fetchAll();
        return $result;
	}

	function deleteMovie($title) {
		$sql = "DELETE FROM movie WHERE movie.title = :title";
        $stmt = Database::$pdo->prepare($sql);
        return $stmt->execute(['title' => $title]);
	}


}