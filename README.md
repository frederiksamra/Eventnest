# Eventnest

Sistem Manajemen Event berbasis web yang dibangun menggunakan Laravel Framework.

## Tentang Projek

Eventnest adalah aplikasi manajemen event yang dikembangkan sebagai projek **Ujian Akhir Semester** mata kuliah **Pemrograman Web Lanjutan**. Aplikasi ini memungkinkan pengguna untuk membuat, mengelola, dan mendaftar ke berbagai event/acara.

## Fitur Utama

-   **Manajemen Event**: Membuat, mengedit, dan menghapus event
-   **Registrasi Pengguna**: Sistem autentikasi dan manajemen user
-   **Dashboard Admin**: Panel kontrol untuk mengelola event dan pengguna
-   **Database Management**: Menggunakan Eloquent ORM untuk pengelolaan data
-   **Responsive Design**: Tampilan yang responsif untuk berbagai perangkat

## Teknologi yang Digunakan

-   **Framework**: Laravel 6.x
-   **PHP**: ^7.2.5 atau ^8.0
-   **Database**: MySQL/MariaDB
-   **Frontend**: Blade Template Engine
-   **Build Tools**: Laravel Mix / Webpack

## Persyaratan Sistem

-   PHP >= 7.2.5
-   Composer
-   MySQL atau database lain yang didukung Laravel
-   Node.js & NPM (untuk asset compilation)
-   Web Server (Apache/Nginx)

## Instalasi

1. **Clone Repository**

    ```bash
    git clone <repository-url>
    cd Eventnest
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Konfigurasi Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Konfigurasi Database**

    Edit file `.env` dan sesuaikan konfigurasi database:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=eventnest
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Migrasi Database**

    ```bash
    php artisan migrate
    ```

6. **Seed Database (Opsional)**

    ```bash
    php artisan db:seed
    ```

7. **Compile Assets**

    ```bash
    npm run dev
    ```

8. **Jalankan Server**

    ```bash
    php artisan serve
    ```

    Aplikasi dapat diakses melalui `http://localhost:8000`

## Struktur Projek

```
├── app/
│   ├── Event.php          # Model Event
│   ├── User.php           # Model User
│   ├── Http/
│   │   └── Controllers/   # Controllers
│   └── ...
├── database/
│   ├── migrations/        # Database migrations
│   └── seeds/             # Database seeders
├── public/                # Public assets
├── resources/
│   ├── views/             # Blade templates
│   └── ...
├── routes/
│   └── web.php            # Web routes
└── ...
```

## Penggunaan

### Menjalankan Development Server

```bash
php artisan serve
```

### Menjalankan Tests

```bash
php artisan test
```

### Build Production Assets

```bash
npm run production
```

## Dokumentasi Laravel

Untuk informasi lebih lanjut tentang Laravel, silakan kunjungi:

-   [Dokumentasi Laravel](https://laravel.com/docs)
-   [Laracasts](https://laracasts.com)

## Kontributor

Projek ini dikembangkan sebagai bagian dari Ujian Akhir Semester mata kuliah Pemrograman Web Lanjutan.

