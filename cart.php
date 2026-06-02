
<?php
require 'config.php';
require 'includes/functions.php';

$products = read_json(PRODUCTS_FILE);

// Sepetten ürün silme
if (isset($_GET['remove'])) {
    $rid = (int)$_GET['remove'];
    unset($_SESSION['cart'][$rid]);
    header("Location: cart.php");
    exit;
}

// Adet artırma
if (isset($_GET['inc'])) {
    $iid = (int)$_GET['inc'];
    $_SESSION['cart'][$iid] = ($_SESSION['cart'][$iid] ?? 0) + 1;
    header("Location: cart.php");
    exit;
}

// Adet azaltma
if (isset($_GET['dec'])) {
    $did = (int)$_GET['dec'];
    if (isset($_SESSION['cart'][$did])) {
        $_SESSION['cart'][$did]--;
        if ($_SESSION['cart'][$did] <= 0) {
            unset($_SESSION['cart'][$did]);
        }
    }
    header("Location: cart.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Sepetim</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/php_proje/assets/css/style.css">
</head>

<body>
<?php include 'includes/header.php'; ?>

<div class="container py-4">
  <h2 class="fw-bold mb-4 text-success">🎄 Sepetim</h2>

  <?php if (empty($_SESSION['cart'])): ?>
      <div class="alert alert-warning">Sepetiniz boş.</div>
  <?php else: ?>

    <table class="table table-bordered align-middle">
      <thead class="table-success">
        <tr>
          <th>Ürün</th>
          <th>Adet</th>
          <th>Fiyat</th>
          <th>Toplam</th>
          <th>İşlem</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $grandTotal = 0;

      foreach ($_SESSION['cart'] as $id => $qty):
          // ürün bilgisi JSON’dan
          $p = null;
          foreach ($products as $item) {
             if ($item['id'] == $id) $p = $item;
          }
          if (!$p) continue;

          $total = $p['price'] * $qty;
          $grandTotal += $total;
      ?>

      <tr>
        <td>
          <strong><?php echo $p['name']; ?></strong><br>
          <small class="text-muted"><?php echo $p['description']; ?></small>
        </td>

        <td width="140">
          <a href="cart.php?dec=<?php echo $id; ?>" class="btn btn-sm btn-outline-danger">-</a>
          <span class="mx-2 fw-bold"><?php echo $qty; ?></span>
          <a href="cart.php?inc=<?php echo $id; ?>" class="btn btn-sm btn-outline-success">+</a>
        </td>

        <td><?php echo $p['price']; ?> TL</td>
        <td class="fw-semibold"><?php echo $total; ?> TL</td>

        <td>
          <a href="cart.php?remove=<?php echo $id; ?>" 
             onclick="return confirm('Bu ürün sepetten silinsin mi?');"
             class="btn btn-sm btn-danger">
             Sil
          </a>
        </td>
      </tr>

      <?php endforeach; ?>

      </tbody>
    </table>

    <div class="text-end">
      <h4 class="fw-bold text-danger">Genel Toplam: <?php echo $grandTotal; ?> TL</h4>
      <a href="checkout.php" class="btn btn-danger btn-lg mt-3">Siparişi Tamamla</a>
    </div>

  <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
