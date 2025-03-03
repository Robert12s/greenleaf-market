<?php

/**
 * @author Robert Twelves
 * @created 03/03/2025
**/

namespace MyProject\API;

class Users {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['name'], $data['email']);
        return $stmt->execute() ? ["message" => "User added"] : ["error" => "Insert failed"];
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $data['name'], $data['email'], $id);
        return $stmt->execute() ? ["message" => "User updated"] : ["error" => "Update failed"];
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute() ? ["message" => "User deleted"] : ["error" => "Delete failed"];
    }
}