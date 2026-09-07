# Work Order API

REST API untuk manage Work Order menggunakan Laravel 13 dan MySQL.

## Requirement

- PHP 8.2+
- Composer
- MySQL aktif

## Setup

composer install

cp .env.example .env

php artisan key:generate

Edit file .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=work_order
DB_USERNAME=root
DB_PASSWORD=

Buat database:

CREATE DATABASE work_order;

Jalankan migration:

php artisan migrate

Jalankan server:

php artisan serve

Server aktif di:

http://127.0.0.1:8000

## Testing dengan Postman

Base URL:

http://127.0.0.1:8000/api/work-orders

### 1. Buat Work Order

Method: POST
URL: http://127.0.0.1:8000/api/work-orders
Body -> raw -> JSON:

{
  "title": "Perbaiki mesin",
  "description": "Cek motor utama"
}

Status otomatis OPEN.

### 2. Lihat semua Work Order (pagination)

Method: GET
URL: http://127.0.0.1:8000/api/work-orders

Halaman tertentu:

http://127.0.0.1:8000/api/work-orders?page=2

### 3. Lihat detail Work Order

Method: GET
URL: http://127.0.0.1:8000/api/work-orders/1

### 4. Update Work Order

Method: PATCH
URL: http://127.0.0.1:8000/api/work-orders/1
Body -> raw -> JSON:

{
  "status": "IN_PROGRESS"
}

Status valid:

OPEN
IN_PROGRESS
COMPLETED
CANCELLED

### 5. Hapus Work Order

Method: DELETE
URL: http://127.0.0.1:8000/api/work-orders/1

Tidak perlu Body.

## HTTP Status

200 -> Berhasil (list/detail/update)
201 -> Berhasil dibuat
204 -> Berhasil dihapus
404 -> ID tidak ditemukan
422 -> Validasi gagal

## Aturan Data

- title wajib, teks, maksimal 255 karakter.
- description opsional.
- Work Order baru selalu OPEN.
- status hanya boleh diisi saat update.