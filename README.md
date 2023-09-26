# SISKA (Sistem Informasi Kepramukaan)

## Deskripsi

SISKA adalah sebuah sistem informasi kepramukaan yang dibuat untuk memenuhi tugas akhir mata kuliah **Sistem Informasi Manajemen**.

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
