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
            // Include the port 3307 in the connection parameters
            self::$connection = new mysqli("localhost", "root", "", "greenleaf", 3307);

            if (self::$connection->connect_error) {
                die("Database connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>

