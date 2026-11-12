## DelishApp (Resto Real)
Aplikasi pemesanan makanan dan minuman berbasis web yang dibangun menggunakan Laravel untuk kebutuhan manajemen restoran dan pemesanan pelanggan.

## Fitur Aplikasi
### Pelanggan
Registrasi, login, dan autentikasi akun.

Melihat katalog menu berdasarkan kategori (Cake, Dessert, Drink).

Mengelola keranjang belanja dan melihat total harga.

Melakukan checkout dengan mengunggah bukti pembayaran.

Melihat riwayat transaksi dan status pembayaran.

### Administrator
Manajemen menu (Tambah, Ubah, Hapus menu beserta harga dan foto).

Memantau dan mengelola laporan transaksi pelanggan.

Mengubah status pembayaran transaksi menjadi lunas.

## Teknologi & Prasyarat
Backend: PHP 8.3+, Laravel 13, Composer.

Database: MySQL / MariaDB.

Frontend: Node.js, npm, Vite, dan Blade Template.

## Panduan Instalasi Cepat
Buat Database baru di MySQL/MariaDB dengan nama resto_real.

Atur Konfigurasi Database pada file .env (sesuaikan DB_DATABASE, DB_USERNAME, dan DB_PASSWORD).

Jalankan perintah berikut secara berurutan di terminal:

Bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
npm install && npm run build
Jalankan Aplikasi:

Bash
php artisan serve
Akses aplikasi melalui browser di: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Ringkasan Struktur Routing
Autentikasi:

GET / (Login), GET /register, GET /logout

### Fitur Pelanggan:

GET /menu (Katalog), GET /keranjang, POST /postkeranjang/{menu}, POST /prosesbayar, GET /riwayat

### Fitur Administrator:

GET /admin (Kelola Menu), GET /tambah & POST /posttambah, GET /edit/{menu} & POST /postedit/{menu}, GET /hapus/{menu}, GET /laporan, GET /lunas/{transaksi}

## Pengujian Fungsional
Registrasi akun baru, lalu login sebagai pelanggan.

Pilih menu di katalog, masukkan ke keranjang, lalu lakukan checkout dengan mengunggah bukti bayar.

Periksa menu Riwayat Transaksi untuk memastikan pesanan masuk.

Logout, lalu login sebagai admin.

Uji fitur tambah/edit/hapus menu pada halaman admin.

Buka menu laporan transaksi dan ubah status pembayaran menjadi lunas.