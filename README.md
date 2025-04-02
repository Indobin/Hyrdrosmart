# Hydrosmart Web IoT Monitoring System
Sistem ini adalah aplikasi berbasis web untuk memonitor data dari perangkat IoT secara real-time. Aplikasi ini dibangun menggunakan **Laravel 11** dan **Tailwind CSS**, serta memiliki fitur autentikasi pengguna.
[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Features Website Hydrosmart

- **User Authentication**: Login dan Logout menggunakan Laravel Authentication.
- **Real-time Monitoring**: Menampilkan data dari perangkat IoT.
- **Responsive UI**: Menggunakan Tailwind CSS agar tampilan optimal di semua perangkat.
- **Dashboard**: Tampilan utama setelah login untuk melihat data perangkat IoT.


## Tech
Website Iot Monitoring ini dibangun menggunakan :

- **Backend**: Laravel 11, Php, Javascript
- **Frontend**: Tailwind CSS
- **Database**: PostgreSQL / MySQL

## Structure
```
project-folder/
│── app/
│── bootstrap/
│── config/
│── database/
│── public/
│── resources/
│   ├── views/
│   │   └── auth/
│   │       └── login.blade.php
│── routes/
│   ├── web.php
│── storage/
│── tests/
│── .env.example
│── artisan
│── composer.json
│── package.json
│── tailwind.config.js
│── README.md
```

## Installation

Ikuti langkah-langkah berikut untuk menginstall dan menjalankan proyek:

1. **Clone Repository**
   ```bash
   git clone https://github.com/Indobin/Hyrdrosmart.git
   cd Hydrosmart
   ```
2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Konfigurasi Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Sesuaikan file `.env` dengan konfigurasi database yang digunakan contoh:
   DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=Hydrosmart
DB_USERNAME=postgres
DB_PASSWORD=321
ubah juga
SESSION_DRIVER=file

4. **Menjalankan XAMPP atau Laragon**
    ```bash
   Klik start pada aplikasi
   ```
   
5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Server**
   ```bash
   php artisan serve
   ```

7. **Akses Aplikasi**
   Buka browser dan kunjungi:
   ```
   http://127.0.0.1:8000
   ```

🚀 **Proyek siap digunakan!**
