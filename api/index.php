<?php

/**
 * @author Robert Twelves
 * @created 03/03/2025
**/

namespace MyProject\API;

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/Users.php';
require_once __DIR__ . '/Products.php';
require_once __DIR__ . '/Categories.php';

use MyProject\API\Database;
use MyProject\API\Users;
use MyProject\API\Products;
use MyProject\API\Categories;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Get database connection
$conn = Database::getConnection();

// Get request details
$request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = isset($request_uri[1]) ? $request_uri[1] : null; // e.g., "users", "products"
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$method = $_SERVER['REQUEST_METHOD'];

$validResources = [
    'users' => Users::class,
    'products' => Products::class,
    'categories' => Categories::class
];

if (!isset($validResources[$resource])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid API endpoint"]);
    exit;
}

// Instantiate correct API handler
$apiHandler = new $validResources[$resource]($conn);
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        echo json_encode($id ? $apiHandler->getById($id) : $apiHandler->getAll());
        break;
    case 'POST':
        echo json_encode($apiHandler->create($data));
        break;
    case 'PUT':
        echo json_encode($apiHandler->update($id, $data));
        break;
    case 'DELETE':
        echo json_encode($apiHandler->delete($id));
        break;
    default:
        http_response_code(405);
        echo json_encode(["error" => "Method Not Allowed"]);
}
?>