<?php
session_start();

	 // Catch all errors, display them one at the time
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
 
    // Include site constants
    include_once "constants.php";
 
    // Create a database object
    try {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $db = new PDO($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }