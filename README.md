# Readify

## Deskripsi Aplikasi

**Readify** adalah aplikasi web berbasis **Laravel 12** untuk mengelola artikel secara efisien. Aplikasi ini memungkinkan pengguna dengan peran berbeda untuk berinteraksi dengan konten:

- **Writer**: Membuat, mengedit, dan menghapus artikel.
- **Reader**: Membaca artikel dan memberikan komentar.
- **Admin**: Mengelola artikel, kategori, pengguna, dan komentar.
- **Guest**: Mengakses artikel tanpa autentikasi.

Readify menawarkan antarmuka responsif dengan **Tailwind CSS**, autentikasi ganda (web dan API dengan JWT), serta fitur seperti pencarian artikel, upload gambar, dan hak akses berbasis peran. Aplikasi ini ideal untuk platform publikasi konten seperti blog atau situs berita, dengan dukungan API untuk integrasi eksternal.

## Fitur Utama

- ✅ Autentikasi pengguna via web (Laravel Breeze) dan API (JWT dengan `tymon/jwt-auth`)
- ✅ Manajemen artikel (CRUD) dengan upload gambar untuk Writer dan pengelolaan oleh Admin
- ✅ Pencarian artikel berdasarkan judul/konten di halaman utama
- ✅ Manajemen kategori untuk pengelompokan artikel
- ✅ Manajemen komentar oleh pengguna terautentikasi, dengan penghapusan oleh Admin
- ✅ Hak akses berbasis peran menggunakan middleware
- ✅ API RESTful untuk autentikasi, artikel, kategori, dan komentar, diuji dengan Postman
- ✅ UI responsif mendukung desktop dan mobile

## Teknologi

- **Backend**: Laravel 12, PHP 8.2, Eloquent ORM  
- **Frontend**: Blade, Tailwind CSS, Vite  
- **Database**: SQLite / MySQL  
- **API Auth**: [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)  
- **Tools**: Composer, Vite, Postman  

## Prasyarat

Sebelum mengkloning dan menjalankan aplikasi, pastikan Anda memiliki:
- PHP >= 8.2  
- Composer  
- Node.js >= 18.x dan npm  
- MySQL atau SQLite  
- Git  
- Akses terminal/command line  

## Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk meng-clone dan menjalankan aplikasi Readify di lokal Anda:

### 1. Clone Repository

```bash
git clone https://github.com/dapaalpinnn/readify.git
cd readify
```
### 2. Install Dependency PHP dan Node.js
Install dependency Laravel:

```bash
composer install
```

Install dependency frontend:

```bash
npm install
```
### 3. Salin dan Atur File Environment

```bash
cp .env.example .env
```

Lalu buka .env dan sesuaikan konfigurasi seperti nama database, email, dan lain-lain sesuai kebutuhan.

### 4. Generate App Key dan JWT Secret

```bash
php artisan key:generate
php artisan jwt:secret
```

### 5. Migrasi dan Seed Database
```bash
php artisan migrate --seed
```
Membuat tabel dan menambahkan data awal termasuk role dan user demo.

### 6. Jalankan Server Laravel
```bash
php artisan serve
```
### 7. Jalankan Frontend Dev Server (Vite)
```bash
npm run dev
```
Pastikan terminal ini tetap berjalan agar Vite mengompilasi Tailwind CSS dan JS secara real-time.
