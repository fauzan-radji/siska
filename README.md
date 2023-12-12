# SISKA (Sistem Informasi Kepramukaan)

## Deskripsi

SISKA adalah sebuah sistem informasi kepramukaan yang dibuat untuk memenuhi tugas akhir mata kuliah **Sistem Informasi Manajemen**.

## Requirement

- PHP >= 8.0
- [Composer](https://getcomposer.org/)
- MySQL

## Instalasi

1. Clone repository ini
2. Masuk ke direktori repository
3. Jalankan perintah `composer install`
4. Buat file `.env` dengan menyalin isi dari file `.env.example`
5. Buat database baru
6. Isi konfigurasi database di file `.env`
7. Jalankan perintah `php artisan key:generate`
8. Jalankan perintah `php artisan migrate --seed`
9. Jalankan perintah `php artisan serve`
10. Buka `localhost:8000` di browser

## Login

| Nama                   | Username     | Email                  | Password | Role         |
| ---------------------- | ------------ | ---------------------- | -------- | ------------ |
| admin                  | admin        | admin@gmail.com        | 12345678 | admin        |
| Shafira Thalib Pembina | pembina      | pembina@gmail.com      | 12345678 | pembina      |
| Shafira Thalib Peserta | pesertadidik | pesertadidik@gmail.com | 12345678 | pesertadidik |
