# Test Backend INOSOFT

## Tentang

Ini merupakan hasil test backend Inosoft mengggunakan framework laravel 8 dengan service repository pattern

## Tools

Aplikasi ini dibangun menggunakan

1. Bahasa Pemrograman PHP versi 8.0
2. Framework Laravel 8
3. Database MYSQL

## Cara Instalasi

1. Install package yang ada di `composer.json` dengan eksekusi perintah

```bash
composer install
```

1. Untuk `base_url` defaultnya adalah `http://test-inosoft.dev`
2. Untuk `database` defaultnya adalah `test_inosoft`
3. Ubah untuk settingan lainnya dapat dirubah melalui file `.env` lalu eksekusi perintah

```bash
php artisan config:cache
```

5. Generate JWT secret dengan eksekusi perintah

```bash
php artisan jwt:secret
```

6. Dokumentasi API

```bash
https://documenter.getpostman.com/view/16904284/2s93sZ8EoR
```

7. Selamat mencoba... :