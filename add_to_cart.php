<?php
require 'config.php';

header('Content-Type: application/json; charset=utf-8');

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
  echo json_encode(['success' => false, 'msg' => 'Geçersiz ürün']);
  exit;
}

$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

echo json_encode([
  'success' => true,
  'count'   => array_sum($_SESSION['cart'])
]);
