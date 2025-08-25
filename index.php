<?php
require_once __DIR__ . '/controllers/ProductController.php';

$controller = new ProductController();
$controller->index();

?>