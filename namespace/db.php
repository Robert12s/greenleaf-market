<?php

/**
 * @author Robert Twelves
 * @created 23/02/2025
**/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greenleaf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
