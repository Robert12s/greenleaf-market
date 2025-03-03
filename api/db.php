<?php

/**
 * @author Robert Twelves
 * @created 23/02/2025
**/

namespace MyProject\API;

use mysqli;

class Database {
    private static $connection = null;

    private function __construct() {} // Prevent instantiation

    public static function getConnection() {
        if (self::$connection === null) {
            self::$connection = new mysqli("localhost", "root", "", "greenleaf");

            if (self::$connection->connect_error) {
                die("Database connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>
