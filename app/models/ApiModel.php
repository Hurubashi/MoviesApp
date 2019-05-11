<?php

class ApiModel extends Model
{
	private $db_tables = array('movie' => ['name', 'year', 'format', 'actors']);

	public function get_data()
	{	

	}
	
	function check_request_params() {
		
	}

	function fetchData($table, $title, $value) {
		$sql = "SELECT * FROM $table WHERE $title = :$title";
        $stmt = Database::$pdo->prepare($sql);
        $stmt->execute([$title => $value]);
        $result = $stmt->fetch();
        return $result;
	}
	
}