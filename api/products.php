<?php

/**
 * @author Robert Twelves
 * @created 03/03/2025
**/

namespace MyProject\API;

class Products {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM products");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, price, category_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $data['name'], $data['price'], $data['category_id']);
        return $stmt->execute() ? ["message" => "Product added"] : ["error" => "Insert failed"];
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE products SET name = ?, price = ?, category_id = ? WHERE id = ?");
        $stmt->bind_param("sdii", $data['name'], $data['price'], $data['category_id'], $id);
        return $stmt->execute() ? ["message" => "Product updated"] : ["error" => "Update failed"];
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute() ? ["message" => "Product deleted"] : ["error" => "Delete failed"];
    }
}
?>