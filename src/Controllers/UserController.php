<?php
namespace Src\Controllers;

use Src\Models\User;

class UserController
{
    public function index()
    {
        $user = new User();
        $users = $user->getAll();
        header('Content-Type: application/json');
        echo json_encode($users);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['name']) || !isset($data['email'])) {
            http_response_code(400);
            echo json_encode(['message' => 'Name and email are required']);
            return;
        }

        $user = new User();
        $result = $user->create($data['name'], $data['email']);

        if ($result) {
            echo json_encode(['message' => 'User added successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to add user']);
        }
    }
}