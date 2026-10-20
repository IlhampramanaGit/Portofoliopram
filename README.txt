PORTOFOLIO PRIBADI - PHP, HTML, CSS, MYSQL

ISI FOLDER
- index.php       Halaman utama portofolio
- config.php      Konfigurasi koneksi MySQL
- database.sql    Database, tabel, dan data contoh
- assets/style.css Tampilan website

CARA MENJALANKAN DENGAN XAMPP
1. Ekstrak folder portfolio_ilham ke C:\xampp\htdocs\
2. Buka XAMPP Control Panel, lalu jalankan Apache dan MySQL.
3. Buka http://localhost/phpmyadmin
4. Pilih tab Import, pilih file database.sql, lalu klik Import/Go.
   Alternatif: buka file database.sql di tab SQL dan jalankan isinya.
5. Buka config.php. Jika username/password MySQL Anda berbeda, sesuaikan nilainya.
6. Buka http://localhost/portfolio_ilham/

PENTING: GANTI TAUTAN INSTAGRAM
1. Buka phpMyAdmin, pilih database portfolio_ilham, lalu tabel profile.
2. Klik Edit pada data profil.
3. Ubah instagram_url menjadi tautan profil Instagram Anda, misalnya:
   https://www.instagram.com/nama_pengguna_anda/
4. Ganti emailanda@example.com dengan email Anda yang aktif.
5. Simpan perubahan. Tombol Instagram di halaman website akan menuju profil tersebut.

MENGUBAH DATA DIRI DAN KEMAMPUAN
- Data diri: tabel profile
- Kemampuan: tabel skills
- Proyek: tabel projects
Ubah data melalui phpMyAdmin. Jangan memasukkan klaim pengalaman atau kemampuan yang belum sesuai dengan kondisi sebenarnya.

CATATAN
- Ini adalah template awal portofolio, bukan panel admin.
- Untuk penggunaan online, gunakan hosting yang mendukung PHP dan MySQL, dan jangan memakai konfigurasi database default tanpa pengamanan.
