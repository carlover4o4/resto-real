# Resto Real

Resto Real adalah aplikasi pemesanan makanan dan minuman berbasis web yang dibangun menggunakan Laravel. Aplikasi ini memungkinkan pelanggan melihat katalog menu, menambahkan menu ke keranjang, melakukan checkout dengan mengunggah bukti pembayaran, serta melihat riwayat transaksi. Aplikasi juga menyediakan halaman administrator untuk mengelola menu dan memantau transaksi pelanggan.

Proyek ini dikembangkan sebagai aplikasi praktik untuk skema **Junior Web Programmer (JWP) – Laravel**.

## Fitur Aplikasi

### Pelanggan
- Registrasi dan login akun.
- Melihat daftar makanan dan minuman beserta kategorinya.
- Menambahkan menu ke keranjang dengan jumlah pesanan.
- Melihat isi keranjang dan total harga.
- Melakukan checkout dengan mengunggah bukti pembayaran.
- Melihat riwayat transaksi dan status pembayaran.

### Administrator
- Login menggunakan akun dengan role admin.
- Melihat daftar menu.
- Menambahkan menu beserta harga, foto, dan kategori.
- Mengubah informasi menu.
- Menghapus menu.
- Melihat laporan transaksi.
- Mengubah status pembayaran transaksi menjadi lunas.

## Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman backend (minimal PHP 8.3 sesuai konfigurasi proyek) |
| Laravel 13 | Framework aplikasi web |
| MySQL / MariaDB | Database relasional untuk konfigurasi lingkungan sesuai kebutuhan proyek |
| Composer | Pengelola dependensi PHP |
| Node.js dan npm | Pengelola dependensi frontend dan Vite |
| Vite | Build tool untuk aset frontend |
| Blade | Template view Laravel |

## Prasyarat Sistem

Pastikan perangkat telah memasang:
- PHP **8.3 atau lebih baru**, beserta ekstensi PHP yang dibutuhkan Laravel.
- Composer.
- MySQL 8.0 atau MariaDB yang kompatibel.
- Node.js dan npm.
- Git.
- Web browser.

## Instalasi dan Konfigurasi

### 1. Clone repository

Buka terminal atau PowerShell, lalu jalankan:

```bash
git clone https://github.com/carlover4o4/resto-real.git
cd resto-real
```

### 2. Install dependensi PHP

```bash
composer install
```

### 3. Buat file environment

Salin file `.env.example` menjadi `.env`.

PowerShell:

```powershell
Copy-Item .env.example .env
```

Linux / macOS:

```bash
cp .env.example .env
```

### 4. Buat database

Buat database baru melalui MySQL atau MariaDB, misalnya dengan nama `resto_real`.

### 5. Atur koneksi database

Buka file `.env`, kemudian sesuaikan konfigurasi database dengan komputer masing-masing. Contoh konfigurasi MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resto_real
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan akun database lokal. Catatan: file `.env.example` pada repository saat ini menggunakan SQLite sebagai nilai awal; ubah konfigurasi tersebut ke MySQL/MariaDB jika menggunakan database sesuai instruksi praktik.

### 6. Generate application key

```bash
php artisan key:generate
```

### 7. Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

Perintah tersebut membuat tabel database dan mengisi data awal yang didefinisikan pada `DatabaseSeeder`, termasuk akun contoh, kategori makanan/minuman, dan beberapa data menu.

Jika ingin mengulang database dari awal pada lingkungan pengembangan, gunakan:

```bash
php artisan migrate:fresh --seed
```

**Perhatian:** `migrate:fresh` menghapus seluruh tabel beserta data yang ada sebelum menjalankan migration kembali. Jangan gunakan pada database yang berisi data penting.

### 8. Siapkan penyimpanan file publik

Aplikasi menyimpan foto menu dan bukti pembayaran pada disk public. Buat symbolic link dengan perintah:

```bash
php artisan storage:link
```

### 9. Install dan build aset frontend

```bash
npm install
npm run build
```

### 10. Jalankan aplikasi

```bash
php artisan serve
```

Buka alamat berikut pada browser:

```
http://127.0.0.1:8000
```

## Akun Contoh

Seeder pada repository menyediakan akun berikut untuk pengujian lokal:

| Role | Email | Password |
|---|---|---|
| Administrator | admin@gmail | 123 |
| Pelanggan | user@gmail | 123 |

Gunakan akun tersebut setelah menjalankan seeder. Akun dan password contoh hanya untuk kebutuhan pengembangan/pengujian lokal. Ganti atau hapus kredensial contoh sebelum aplikasi digunakan di lingkungan produksi.

## Struktur Routing

Seluruh route web aplikasi didefinisikan pada file `routes/web.php`.

| Method | URL | Nama Route | Fungsi |
|---|---|---|---|
| GET | `/` | `login` | Menampilkan halaman login |
| POST | `/postlogin` | `postlogin` | Memproses autentikasi pengguna |
| GET | `/register` | `register` | Menampilkan halaman registrasi |
| POST | `/postregister` | `postregister` | Memproses pendaftaran pengguna |
| GET | `/menu` | `menu` | Menampilkan katalog menu |
| GET | `/keranjang` | `keranjang` | Menampilkan keranjang pelanggan |
| POST | `/postkeranjang/{menu}` | `postkeranjang` | Menambahkan menu ke keranjang |
| POST | `/prosesbayar` | `postbayar` | Memproses checkout dan unggah bukti pembayaran |
| GET | `/riwayat` | `riwayat` | Menampilkan riwayat transaksi pelanggan |
| GET | `/admin` | `admin` | Menampilkan halaman pengelolaan menu admin |
| GET | `/tambah` | `tambah` | Menampilkan form tambah menu |
| POST | `/posttambah` | `posttambah` | Menyimpan menu baru |
| GET | `/edit/{menu}` | `edit` | Menampilkan form edit menu |
| POST | `/postedit/{menu}` | `postedit` | Memperbarui data menu |
| GET | `/hapus/{menu}` | `hapus` | Menghapus menu |
| GET | `/laporan` | `laporan` | Menampilkan laporan transaksi admin |
| GET | `/lunas/{transaksi}` | `lunas` | Mengubah status pembayaran menjadi lunas |
| GET | `/logout` | `logout` | Mengakhiri sesi login |

Route katalog, keranjang, checkout, riwayat, halaman admin, dan logout diletakkan di dalam middleware `auth`, sehingga hanya pengguna yang sudah login yang dapat mengaksesnya. Route admin pada implementasi saat ini juga berada dalam grup `auth`.

## Fungsi Utama Controller

### 1. AuthController

File: `app/Http/Controllers/AuthController.php`

Menangani proses autentikasi pengguna, meliputi:
- Menampilkan halaman login dan registrasi.
- Memvalidasi serta memproses login.
- Mengarahkan pengguna berdasarkan role: admin ke halaman admin dan pelanggan ke katalog menu.
- Memvalidasi dan menyimpan akun baru.
- Melakukan logout.

### 2. MainController

File: `app/Http/Controllers/MainController.php`

Menangani aktivitas pemesanan pelanggan, meliputi:
- Mengambil dan menampilkan katalog menu beserta kategori.
- Menambahkan menu ke keranjang dengan validasi jumlah minimal satu.
- Menghitung total harga keranjang.
- Memvalidasi dan menyimpan bukti pembayaran saat checkout.
- Membuat transaksi dan mengubah item keranjang menjadi item checkout.
- Menampilkan riwayat transaksi pelanggan.

### 3. AdminController

File: `app/Http/Controllers/AdminController.php`

Menangani pengelolaan menu dan transaksi oleh administrator, meliputi:
- Menampilkan daftar menu.
- Menambahkan, mengubah, dan menghapus menu.
- Memvalidasi data menu dan unggahan foto.
- Menampilkan laporan transaksi.
- Memperbarui status pembayaran menjadi lunas.

## Model dan Data Utama

Model Eloquent yang digunakan dalam proses aplikasi antara lain:

| Model | Fungsi |
|---|---|
| `User` | Menyimpan data akun pengguna dan role |
| `Kategori` | Menyimpan kategori menu, seperti makanan dan minuman |
| `Menu` | Menyimpan data nama menu, harga, foto, dan kategori |
| `Transaksi` | Menyimpan data transaksi pelanggan dan status pembayaran |
| `DetailTransaksi` | Menyimpan rincian menu, jumlah, total harga, dan status item transaksi |

## Validasi dan Penanganan Kesalahan

Aplikasi menerapkan validasi pada beberapa proses, antara lain:
- Login dan registrasi pengguna.
- Jumlah menu yang ditambahkan ke keranjang.
- Data menu, harga, kategori, dan foto.
- Bukti pembayaran saat checkout.
- Pemeriksaan keranjang kosong sebelum transaksi dibuat.

Untuk membantu pemeriksaan saat pengembangan, Laravel menyediakan log aplikasi yang dapat diperiksa pada:

```
storage/logs/laravel.log
```

## Pengujian Fungsional

Setelah aplikasi berhasil dijalankan, lakukan pengujian berikut:

1. Registrasi akun pelanggan.
2. Login sebagai pelanggan.
3. Buka katalog dan tambahkan menu ke keranjang.
4. Periksa daftar keranjang dan total harga.
5. Lakukan checkout dengan mengunggah bukti pembayaran.
6. Periksa riwayat transaksi.
7. Logout, kemudian login menggunakan akun administrator.
8. Tambahkan, ubah, dan hapus data menu.
9. Buka laporan transaksi dan ubah status pembayaran menjadi lunas.

## Catatan Pengembangan

- Jangan membagikan file `.env` karena berisi konfigurasi dan kredensial lokal.
- Pastikan database sudah aktif sebelum menjalankan migration.
- Pastikan direktori penyimpanan publik sudah terhubung menggunakan `php artisan storage:link`.
- Akun contoh dari seeder hanya ditujukan untuk pengujian lokal.
- Dokumentasi ini menjelaskan fitur berdasarkan implementasi pada repository branch `master`.

## Lisensi

Lisensi proyek mengikuti ketentuan yang ditetapkan oleh pemilik repository.
