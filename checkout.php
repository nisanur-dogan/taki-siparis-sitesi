<?php
// checkout.php
require 'config.php';
require 'includes/functions.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: index.php'); exit;
}

$products = read_json(PRODUCTS_FILE);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if ($name === '') $errors[] = 'İsim gerekli.';
    if ($phone === '') $errors[] = 'Telefon gerekli.';
    if ($address === '') $errors[] = 'Adres gerekli.';

    if (empty($errors)) {
        $orders = read_json(ORDERS_FILE);
        $items = [];
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qty) {
            $p = find_product($id, $products);
            if (!$p) continue;
            $items[] = ['product_id' => $id, 'name' => $p['name'], 'quantity' => $qty, 'price' => $p['price']];
            $total += $p['price'] * $qty;
        }

        $order = [
            'id' => next_id($orders),
            'username' => $_SESSION['user'] ?? null,
            'customer_name' => $name,
            'phone' => $phone,
            'address' => $address,
            'items' => $items,
            'total' => $total,
            'status' => 'Alındı',
            'date' => date('Y-m-d H:i:s')
        ];

        $orders[] = $order;
        write_json(ORDERS_FILE, $orders);
        // temizle sepet
        unset($_SESSION['cart']);
        header('Location: success.php?order=' . $order['id']); exit;
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Sipariş Tamamlama</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/php_proje/assets/css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container py-4">
  <h2 class="mb-4 fw-bold">📦 Sipariş Bilgileri</h2>
  <?php if ($errors) echo '<div class="alert alert-danger">'.implode('<br>', array_map('h',$errors)).'</div>'; ?>
  <form method="post" class="card p-4 shadow-sm">
    <label class="form-label">Ad Soyad</label>
    <input type="text" name="name" class="form-control mb-2" value="<?php echo h($_POST['name'] ?? ($_SESSION['user'] ?? '')); ?>">
    <label class="form-label">Telefon</label>
    <input type="text" name="phone" class="form-control mb-2" value="<?php echo h($_POST['phone'] ?? ''); ?>">
    <label class="form-label">Adres</label>
    <textarea name="address" class="form-control mb-3"><?php echo h($_POST['address'] ?? ''); ?></textarea>
    <button class="btn btn-success w-100">Siparişi Tamamla</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
