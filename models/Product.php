<?php
require_once __DIR__ . '/../config/database.php';

class Product{
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function createProduct($name, $description, $price, $stock) {
        $sql = "INSERT INTO products (product_name, product_desc, product_price, product_stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdi", $name, $description, $price, $stock);
        return $stmt->execute();
    }

    public function updateProduct($id, $name, $description, $price, $stock) {
        $sql = "UPDATE products SET product_name = ?, product_desc = ?, product_price = ?, product_stock = ? WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}