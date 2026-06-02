<?php
require 'config.php';
require 'includes/functions.php';
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Sipariş Başarılı</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/php_proje/assets/css/style.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<div class="page-content">
  <div class="container py-5">
    <div class="card shadow-lg mx-auto text-center" style="max-width: 500px;">
      <div class="card-body p-4">
        <h3 class="text-success mb-3">🎉 Siparişiniz Alındı!</h3>
        <p class="mb-4">
          Siparişiniz başarıyla oluşturulmuştur.  
          En kısa sürede hazırlanmaya başlanacaktır.
        </p>

        <a href="/php_proje/index.php" class="btn btn-danger">
          Alışverişe Devam Et
        </a>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
