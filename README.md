# Website-Sederhana (CRUD Customer Management)

Website ini merupakan project latihan magang untuk membangun aplikasi sederhana yang memiliki fitur autentikasi dan manajemen data customer. Project dikembangkan menggunakan PHP Native dan MySQL, serta berjalan di server lokal menggunakan Laragon.

---

## ✨ Fitur Utama

- 🔐 Login & Logout dengan validasi
- ➕ Tambah data customer
- 📋 Menampilkan data customer dalam tabel
- ✏ Edit data customer
- ❌ Hapus data customer
- 🛡️ Keamanan dasar (session & validation)
- 🎨 Tampilan UI yang sudah diperbaiki (Login & Dashboard)

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|----------|------------|
| PHP Native | Logic dan fitur CRUD |
| MySQL | Database utama |
| HTML/CSS | UI & Layout |
| JavaScript (optional) | Validasi Client-side |
| Laragon | Server lokal (Apache + MySQL) |
| GitHub | Version Control & Deployment |

---

## Cara Install dan Menjalankan Project

### 1. Clone atau Download Project

Download project sebagai ZIP atau clone repository:

bash
contoh --> 
```sh
git clone https://github.com/rasyasultanpasha-ship-it/website-Sederhana.git


### 2. Install Dependencies

Jika menggunakan PHP + MySQL dan Laragon:

* Pastikan *Laragon* sudah terinstall
* Pindahkan folder project ke dalam:


contoh --> D:/Laragon/www/website-sederhana/


### 3. Import Database

* Buka *phpMyAdmin6* melalui menu Laragon → Database
* Buat database baru
* Import file SQL dari folder backup (.sql)

### 4. Konfigurasi Koneksi Database

Edit file:


contoh --> config/koneksi.php


Sesuaikan dengan:

php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_website_sederhana';


### 5. Jalankan Project

Akses melalui browser:


http://localhost/website-sederhana/


--- Project siap dijalankan ---
### ini tampilan ui
![Screenshot Tampilan UI](assets/img/Tampilan_ui.png)
