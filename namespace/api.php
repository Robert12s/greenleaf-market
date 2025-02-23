<?php

/**
 * @author Robert Twelves
 * @created 23/02/2025
**/

include 'db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM users WHERE id=$id");
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            $result = $conn->query("SELECT * FROM users");
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        break;

    case 'POST':
        $firstName = $input['firstName'];
        $lastName = $input['lastName'];
        $username = $input['username'];
        $password = md5($input['password']);
        $conn->query("INSERT INTO users (f_name, l_name, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')");
        echo json_encode(["message" => "User added successfully"]);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $firstName = $input['firstName'];
        $lastName = $input['lastName'];
        $username = $input['username'];
        $password = md5($input['password']);
        $conn->query("UPDATE users SET f_name='$firstName', l_name='$lastName', username='$username', password='$password' WHERE id=$id");
        echo json_encode(["message" => "User updated successfully"]);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM users WHERE id=$id");
        echo json_encode(["message" => "User deleted successfully"]);
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>
