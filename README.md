# Website Sederhana – Day 2 Project

## Deskripsi
Project sederhana menggunakan HTML, CSS, PHP, dan MySQL.

## Fitur
- Login
- Dashboard
- Logout
- Koneksi MySQL

## Cara Menjalankan
1. Aktifkan Laragon
2. Copy project ke folder **C:\laragon\www**
3. Buat database: `website_sederhana`
4. Buat tabel `users`:
   ```sql
   CREATE TABLE users (
     id INT AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR(50),
     password VARCHAR(50)
   );
