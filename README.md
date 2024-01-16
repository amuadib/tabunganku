# Tentang

Aplikasi tabungan siswa sederhana yang dibuat dengan [Laravel](https://laravel.com) dan [Filament](https://filamentphp.com/)

## Fitur-fitur

-   Daftar Siswa
-   Transaksi Setoran & Penarikan
-   Pengaturan Kelas
-   Pengaturan Pengguna
-   Pengaturan Role Pengguna

## Panduan Instalasi

Silahkan cek panduan instalasi dan kebutuhan sistem Laravel [disini](https://laravel.com/docs/10.x/installation#installation)

Clone repository

    git clone https://github.com/amuadib/tabunganku.git

Masuk ke folder

    cd tabunganku

Instal paket pendukung dengan composer

    composer install

Salin file .env.example ke .env

    cp .env.example .env

Siapkan database, masukkan username dan password database ke file .env

Lakukan migrasi database

    php artisan migrate --seed

Mulai aplikasi dengan perintah

    php artisan serve

Aplikasi tabunganku dapat diakses di http://localhost:8000

# Code overview

## Environment variables

-   `.env` - Environment variables can be set in this file

---

# Username default

Default Email :

    admin@local.net

Password :

    4dmin++

# Author

:rocket: [AMuadib](https://github.com/amuadib)
