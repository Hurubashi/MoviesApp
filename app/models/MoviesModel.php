<?php

class MoviesModel extends Model
{
	public function get_data()
	{	
		$this->insert_data('Forest Dumb', 1994, 'DVD', 'Alex Dolbuin, Jack Daniels');

		try {
			$sql = "SELECT * FROM movie ORDER BY movie.name DESC";
			$stmt = Database::$pdo->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
		} catch (PDOException $e){
			$result = handle_sql_errors($selectQuery, $e->getMessage());
		}
		return $result;
	}

	public function insert_data($name, $year, $format, $actors) {
		$sql = "INSERT INTO movie(`uid`, `name`, `year`, `format`, `actors`) 
							VALUES (:uid, :name, :year, :format, :actors)";
		$stmt = Database::$pdo->prepare($sql);
		$gg = uniqid($name);
		$stmt->execute(['uid' => $gg, 'name' => $name, 
						'year' => $year, 'format' => $format, 'actors' => $actors]);
	}

	function search_by($title, $name){
		$sql = "SELECT * FROM movie WHERE $title = :$title";
        $stmt = Database::$pdo->prepare($sql);
        $stmt->execute([$title => $value]);
        $result = $stmt->fetchAll();
        return $result;
	}


}