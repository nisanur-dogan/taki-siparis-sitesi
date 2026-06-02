<?php
require 'config.php'; require 'includes/functions.php';
$q = trim($_GET['q'] ?? ''); $category = trim($_GET['category'] ?? '');
$products = read_json(PRODUCTS_FILE);
$results = array_filter($products, function($p) use($q,$category){
$passQ = $q === '' ? true : (stripos($p['name'],$q)!==false || stripos($p['description'],$q)!==false);
$passC = $category === '' ? true : ($p['category'] === $category);
return $passQ && $passC;
});
?>
<!doctype html><html><head><meta charset="utf-8"><title>Ara - Takı</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet"></head><body>
<?php include 'includes/header.php'; ?>
<div class="container py-4">
<h3>Arama Sonuçları</h3>
<div class="row g-4">
<?php foreach($results as $p): ?>
<div class="col-md-4">
<div class="card product-card">
<img src="uploads/<?php echo h($p['image']); ?>" class="card-img-top" style="height:220px;object-fit:cover;">
<div class="card-body">
<h5><?php echo h($p['name']); ?></h5>
<p class="text-muted"><?php echo h($p['description']); ?></p>
<a href="product.php?id=<?php echo $p['id']; ?>" class="btn btn-primary">Detay</a>
</div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
<?php include 'includes/footer.php'; ?></body></html>