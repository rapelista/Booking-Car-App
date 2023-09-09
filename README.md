# Skwn-Booking-Car-App

> Physical Data Model dapat dilihat pada [link](https://drive.google.com/drive/folders/1c-FiyLutH1w5641S2B-poJAu7LD4ya_E?usp=sharing) berikut.

## Panduan Instalasi

Clone repository terlebih dahulu

```terminal
git clone https://github.com/rapelista/Skwn-Booking-Car-App.git
```

1. Buka folder project
2. Run pada terminal

```terminal
composer install
```

3. Run pada terminal

```terminal
cp .env.example .env
```

4. Sesuaikan konfigurasi database, timezone, dan lainnya pada file .env
5. Run pada terminal

```terminal
php artisan key:generate
```

6. Buat database sesuai dengan konfigurasi pada file .env
7. Jalankan pada terminal

```terminal
php artisan migrate:fresh --seed
```

8. Terakhir untuk menjalankan aplikasi, jalankan pada terminal

```terminal
php artisan serve
```

## Informasi lainnya

-   PHP 8.2.9
-   MySQL 8.1.0
-   Laravel 10
-   SB Admin 2, Bootstrap 5, Chartjs, Datatables JQuery, Fontawesome☺️
