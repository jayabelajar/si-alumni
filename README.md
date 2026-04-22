# Alumni Hub & Career Center

## Deskripsi Proyek
Alumni Hub & Career Center adalah platform manajemen alumni terpadu yang dirancang untuk menjembatani institusi pendidikan dengan para alumninya. Platform ini fokus pada pelacakan karir (Tracer Study), pengembangan jaringan profesional, dan penyediaan informasi lowongan kerja yang dikurasi khusus untuk lulusan.

Sistem ini menyediakan dua antarmuka utama: Dashboard Admin untuk manajemen data dan Dashboard Alumni untuk pengembangan profil profesional serta akses bursa kerja.

## Teknologi Utama
Platform ini dibangun menggunakan teknologi terkini untuk memastikan performa dan keamanan:
- **Framework Utama**: CodeIgniter 4 (v4.7.2)
- **Bahasa Pemrograman**: PHP 8.1+
- **Database**: MySQL / MariaDB
- **Frontend Framework**: Bootstrap 5.3 (dengan Custom CSS Modern)
- **Ikonografi**: Bootstrap Icons

## Fitur Utama

### Pengguna Alumni
- **Dashboard Personal**: Ringkasan profil dan status kelengkapan data karir.
- **Profil Profesional**: Manajemen bio, keahlian, link sosial media, dan portfolio.
- **Bursa Kerja**: Akses ke daftar lowongan kerja eksklusif dengan sistem filter industri.
- **Tracer Study**: Pengisian data pekerjaan terkini untuk pelaporan institusi.

### Administrator
- **Kelola Alumni**: Manajemen data alumni lengkap dengan fitur pencarian dan filter angkatan.
- **Manajemen User**: Pengaturan akun akses untuk seluruh pengguna sistem.
- **Manajemen Lowongan**: Publikasi dan pengelolaan informasi pekerjaan.
- **Pengaturan Profil**: Keamanan akun admin dan pembaruan identitas.

## Panduan Instalasi

### Prasyarat
- PHP 8.1 atau versi lebih tinggi.
- MySQL atau MariaDB.
- Composer terinstal di sistem Anda.
- Server Apache/Nginx (atau menggunakan Spark Serve).

### Langkah-Langkah Instalasi

1. **Clone Repositori**
   ```bash
   git clone https://github.com/username/si-alumni.git
   cd si-alumni
   ```

2. **Instalasi Dependensi**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp env .env
   ```
   Buka file `.env` dan sesuaikan pengaturan database Anda:
   ```env
   database.default.hostname = localhost
   database.default.database = si_alumni
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

4. **Migrasi dan Seeding**
   Jalankan perintah berikut untuk membuat struktur tabel dan mengisi data awal:
   ```bash
   php spark migrate
   php spark db:seed JobSeeder
   php spark db:seed AlumniSeeder
   ```

5. **Menjalankan Server Lokal**
   ```bash
   php spark serve
   ```
   Aplikasi dapat diakses melalui browser di alamat `http://localhost:8080`.

## Akun Akses Default
Untuk keperluan pengujian, gunakan akun berikut:

- **Admin**
  - Username: `admin`
  - Password: `password123`

- **Alumni (Contoh)**
  - Username: `budi.santoso`
  - Password: `password123`

## Struktur Direktori
- `app/Controllers`: Logika bisnis aplikasi.
- `app/Models`: Interaksi dengan database.
- `app/Views`: File tampilan/antarmuka (Blade-like PHP).
- `public/uploads`: Penyimpanan aset seperti avatar alumni.

## Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT. Seluruh hak cipta dilindungi.
