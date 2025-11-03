<?php
use Src\Controllers\UserController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if ($uri === '/users' && $method === 'GET') {
    (new UserController())->index();
} elseif ($uri === '/users' && $method === 'POST') {
    (new UserController())->store();
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
}