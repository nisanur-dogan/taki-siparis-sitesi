# Takı Sipariş ve E-Ticaret Sistemi 

Kullanıcı deneyimini (UX) merkeze alan; dinamik sepet yönetimi, ürün listeleme, sipariş süreçleri ve kapsamlı bir yönetim (admin) altyapısına sahip modüler bir PHP e-ticaret platformudur.

## Proje Özellikleri
- **Müşteri Alışveriş Akışı:*Ürünlerin ana sayfada dinamik listelenmesi, detay inceleme (`product.php`), sepet dinamikleri (`add_to_cart.php`, `cart.php`) ve güvenli sipariş tamamlama adımları (`checkout.php`, `success.php`).
- **Gelişmiş Filtreleme ve Arama:** Ürünler arasında hızlı ve esnek sorgulama yapmayı sağlayan entegre arama modülü (`search.php`).
- **Yönetim (Admin) Paneli:** Yetkilendirilmiş kullanıcılar için ürün ekleme, silme, güncelleme ve gelen sipariş verilerini anlık izleme paneli.
- **Hafif ve Hızlı Veri Mimarisi:** JSON dosya yapısı tabanlı modüler veri saklama ve sorgulama mimarisi (`products.json`, `orders.json`, `users.json`).

## 📁 Proje Klasör Yapısı
- `/admin` - Ürün ve sipariş yönetiminin yapıldığı idari panel bileşenleri.
- `/musteri` - Müşteri sepet, arama ve ödeme adımlarının modüler kontrol alanları.
- `/includes` - `config.php`, `functions.php` gibi global fonksiyon ve konfigürasyon dosyaları.
- `/uploads` & `/php2_proje_resim` - Ürünlere ait dinamik görsellerin saklandığı medya dizinleri.

## 🛠️ Kullanılan Teknolojiler
- **Backend:** PHP (Dinamik Sunucu ve Veri Yönetimi)
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap (Responsive / Mobil Uyumlu Tasarım)
- **Veri Saklama:** JSON (JavaScript Object Notation)

