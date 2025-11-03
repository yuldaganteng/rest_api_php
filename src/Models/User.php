<?php
namespace Src\Models;

require_once __DIR__ . '/../../Config/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        global $pdo;
        $this->conn = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        return $stmt->execute([':name' => $name, ':email' => $email]);
    }
}