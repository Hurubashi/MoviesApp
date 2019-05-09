<?php

class Database {

    // Global variable that returns PDO connection or FALSE if connection unavailable
    public static $pdo;

    public function __construct()
    {
        $this->initPDO();
    }

    // Init global PDO value
    public function initPDO() {
        require ROOT.'/config/db_config.php';
        try {
            self::$pdo =  new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e){
            self::$pdo = false;
            echo ($DB_DSN . $DB_USER . $DB_PASSWORD);
            echo "Chto-to ne tak :(\n";
            echo $e->getMessage();
        }
    }

    public static function pdo_is_connected() {
        if (Database::$pdo == NULL) {
            return false;
        } else {
            return true;
        }
    }

}