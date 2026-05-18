## Cara Memulai (Getting Started)

Ikuti langkah-langkah di bawah ini untuk menjalankan projek ini di komputer lokal Anda.

### Prasyarat (Prerequisites)

Sebelum melakukan kloning, pastikan Anda sudah menginstal beberapa tools berikut di perangkat Anda:
* **Git** (Pastikan sudah terkonfigurasi dengan akun GitHub Anda)
* [Sebutkan software pendukung jika ada, contoh: PHP >= 8.x / Node.js >= 18 / Composer]

### Kloning Repositori (Cloning the Repository)

Buka terminal (Linux/macOS) atau Command Prompt/Git Bash (Windows), lalu pilih salah satu metode di bawah ini:

**1. Menggunakan HTTPS (Direkomendasikan untuk pemula):**
```bash
git clone [https://github.com/RizkiRahman20/POS-api.git]
```

**2. Install Dependensi Projek**
```bash
 composer install
```

**3. Generate Application Key**
```bash
 php artisan key:generate
```

**4. Konfigurasi Database**
1. Buka file `.env` di root project.
2. Cari baris berikut dan ubah nilainya sesuai dengan kredensial database Anda:

```ini
DB_CONNECTION=mysql
DB_HOST=[IP_ADDRESS]
DB_PORT=3306
DB_DATABASE=nama_database_baru
DB_USERNAME=nama_user_db
DB_PASSWORD=kata_sandi_db
```

**5. Migration Database**
```bash
 php artisan migrate
```

**6. Jalankan Server**
```bash
 php artisan serve
```
