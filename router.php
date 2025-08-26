<?php
require_once __DIR__ . '/controllers/ProductController.php';

$controller = new ProductController;
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $id = $_GET['product_id'] ?? null;
        $controller->show($id);
        break;
    case 'create':
        $controller->create($name, $description, $price, $stock);
        break;
    default:
    http_response_code(404);
    echo "Page not found";
    break;
}