<?php include 'includes/footer.php'; ?>
<?php
require 'config.php';
require 'includes/functions.php';
$products = read_json(PRODUCTS_FILE);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$p = find_product($id, $products);
if (!$p) {
    header('Location: index.php'); exit;
}
echo h($p['category']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo h($p['name']); ?> - Takı Sipariş</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="container py-4">
  <div class="row">
    <div class="col-md-6">
      <img src="uploads/<?php echo h($p['image']); ?>" class="img-fluid" alt="">
    </div>
    <div class="col-md-6">
      <h2><?php echo h($p['name']); ?></h2>
      <p><?php echo h($p['description']); ?></p>
      <p><strong>Fiyat: <?php echo h($p['price']); ?> TL</strong></p>
      <button class="btn btn-danger w-100" data-add="<?php echo $p['id']; ?>">Sepete Ekle</button>
      <a href="index.php" class="btn btn-link">Geri</a>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
