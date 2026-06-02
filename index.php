<?php
require 'config.php';
require 'includes/functions.php';
$products = read_json(PRODUCTS_FILE);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Takı Sipariş</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="/php_proje/assets/css/style.css">
</head>
<body>


<?php include 'includes/header.php'; ?>

<div class="container py-4">

  <h2 class="mb-4">Takılar</h2>

  <div class="row">
    <?php foreach($products as $p): ?>
      <div class="col-12 col-md-4 mb-3">
        <div class="card shadow-sm">
          <img src="uploads/<?php echo h($p['image']); ?>"
     class="card-img-top product-img"
     alt="Ürün">

          <div class="card-body">
            <h5><?php echo $p['name']; ?></h5>
            <p><?php echo $p['description']; ?></p>
            <p><strong><?php echo $p['price']; ?> TL</strong></p>
            <button class="btn btn-danger w-100" data-add="<?php echo $p['id']; ?>">Sepete Ekle</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>


<?php include 'includes/footer.php'; ?>


</body>
</html>
