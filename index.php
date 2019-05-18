<?php

// 1. Basic settings

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

// 3. Connect DB
require_once(ROOT. '/config/connect_db.php');
new Database();

// 2. Connect system files
require_once( ROOT . '/app/bootstrap.php');



