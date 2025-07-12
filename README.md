# WebGIS Alutsista TNI

Sistem Informasi Geografis (WebGIS) untuk manajemen dan visualisasi data Alat Utama Sistem Persenjataan (Alutsista) Tentara Nasional Indonesia (TNI). Aplikasi ini menyediakan platform berbasis web untuk mengelola dan menampilkan informasi geografis tentang kesatuan TNI, alutsista, dan distribusinya di seluruh wilayah Indonesia.

> ⚠️ **PENTING - STATUS PROTOTIPE**
>
> Proyek ini merupakan **PROTOTIPE** untuk tujuan demonstrasi dan pembelajaran.
> **Data yang digunakan dalam database BUKAN data asli** dari TNI, melainkan data dummy/simulasi yang dibuat untuk keperluan pengembangan dan testing aplikasi.
>
> Aplikasi ini tidak dimaksudkan untuk penggunaan operasional yang sesungguhnya dan tidak mengandung informasi sensitif atau rahasia militer.

## Fitur Utama

- **Peta Interaktif**: Visualisasi geografis kesatuan TNI di seluruh Indonesia
- **Manajemen Kesatuan**: Kelola data TNI AD (Kodam), TNI AL (Lantamal), dan TNI AU (Koopsud)
- **Database Alutsista**: Informasi lengkap tentang tank, artileri, helikopter, pesawat, kapal, dan amunisi
- **Sistem Autentikasi**: Login terpisah untuk admin dan user dengan role-based access
- **Dashboard Admin**: Interface untuk mengelola data kesatuan, wilayah, dan alutsista
- **Responsive Design**: Menggunakan AdminLTE untuk tampilan yang responsif

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 4
- **Database**: MySQL 8.0+
- **Frontend**: AdminLTE 3, Bootstrap 4.6, jQuery
- **Maps**: Leaflet.js untuk peta interaktif
- **PHP**: Version 8.1+
- **Web Server**: Apache (Laragon/XAMPP)

## Persyaratan Sistem

### Server Requirements

- **PHP**: Version 8.1 atau lebih tinggi
- **Database**: MySQL 8.0+ atau MariaDB 10.3+
- **Web Server**: Apache 2.4+ (Direkomendasikan menggunakan Laragon atau XAMPP untuk development)
- **Memory**: Minimum 8GB RAM
- **Storage**: Minimum 3GB disk space

### Development Environment (Recommended)

Untuk kemudahan development, disarankan menggunakan salah satu dari:

- **[Laragon](https://laragon.org/)** - Portable development environment untuk Windows
- **[XAMPP](https://www.apachefriends.org/)** - Cross-platform web server solution stack
- **[WAMP](https://www.wampserver.com/)** - Windows web development environment

### PHP Extensions

Pastikan ekstensi PHP berikut telah diaktifkan:

- `intl` - untuk internationalization
- `mbstring` - untuk multibyte string handling
- `json` - untuk JSON processing (default enabled)
- `mysqlnd` - untuk MySQL database connectivity
- `libcurl` - untuk HTTP requests
- `gd` atau `imagick` - untuk image processing
- `zip` - untuk file compression

## Instalasi dan Setup

### 1. Clone Repository

```bash
git clone https://github.com/username/webgis_alutsista_tni.git
cd webgis_alutsista_tni
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file environment dan sesuaikan konfigurasi:

```bash
cp env .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
CI_ENVIRONMENT = development

# Database Configuration
database.default.hostname = localhost
database.default.database = webgis-alutsista-tni
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Setup Database

1. Buat database MySQL:
```sql
CREATE DATABASE `webgis-alutsista-tni`;
```

2. Import database schema:
```bash
mysql -u root -p webgis-alutsista-tni < webgis-alutsista-tni.sql
```

### 5. Konfigurasi Web Server

#### Konfigurasi untuk Laragon

1. **Ekstrak proyek** ke folder `C:\laragon\www\webgis_alutsista_tni`
2. **Akses aplikasi** melalui `http://webgis_alutsista_tni.test` (Laragon auto virtual host)
3. **Database** dapat diakses melalui phpMyAdmin di `http://localhost/phpmyadmin`

#### Konfigurasi untuk XAMPP

1. **Ekstrak proyek** ke folder `C:\xampp\htdocs\webgis_alutsista_tni`
2. **Akses aplikasi** melalui `http://localhost/webgis_alutsista_tni/public`
3. **Database** dapat diakses melalui phpMyAdmin di `http://localhost/phpmyadmin`

#### Apache Configuration (Manual Setup)

## Menjalankan Aplikasi

### Development Server

#### Menggunakan Laragon/XAMPP (Recommended)

1. **Laragon**: Akses `http://webgis_alutsista_tni.test`
2. **XAMPP**: Akses `http://localhost/webgis_alutsista_tni/public`

#### Menggunakan Built-in PHP Server

Untuk development cepat, Anda dapat menggunakan built-in PHP server:

```bash
php spark serve
```

Aplikasi akan berjalan di `http://localhost:8080`

### Production Server

Untuk production, pastikan web server Apache sudah dikonfigurasi dengan benar dan mengarah ke folder `public/`.

### Akses Aplikasi

1. **User Interface**: `http://your-domain.com/`
2. **Admin Login**: `http://your-domain.com/Auth/LoginAdmin`
3. **User Login**: `http://your-domain.com/Auth/LoginUser`

### Default Login Credentials

**Admin Account:**
- Email: `admin@gmail.com`
- Password: `admin123`

**User Account:**
- Email: `nabil@gmail.com`
- Password: `nabil`

## Penggunaan Aplikasi

### Untuk User

1. **Login**: Akses halaman login user dan masukkan kredensial
2. **Peta Interaktif**: Jelajahi peta Indonesia dengan marker kesatuan TNI
3. **Detail Kesatuan**: Klik marker untuk melihat informasi detail kesatuan
4. **Filter Data**: Gunakan filter untuk menampilkan kesatuan tertentu (TNI AD/AL/AU)
5. **Informasi Alutsista**: Lihat detail alutsista setiap kesatuan

### Untuk Admin

1. **Dashboard**: Akses dashboard admin untuk overview sistem
2. **Manajemen Kesatuan**: Tambah, edit, hapus data kesatuan TNI
3. **Manajemen Wilayah**: Kelola data wilayah Indonesia
4. **Manajemen Alutsista**: Update informasi tank, artileri, helikopter, dll
5. **Manajemen User**: Kelola akun user dan admin
6. **Pengaturan**: Konfigurasi aplikasi dan peta

## Development dan Testing

### Struktur Direktori

```
webgis_alutsista_tni/
├── app/
│   ├── Controllers/     # Controller files
│   ├── Models/         # Model files
│   ├── Views/          # View templates
│   ├── Config/         # Configuration files
│   └── ...
├── public/             # Web accessible files
│   ├── AdminLTE/       # AdminLTE assets
│   ├── css/           # Custom CSS
│   ├── js/            # Custom JavaScript
│   ├── Gambar/        # Images and assets
│   └── index.php      # Entry point
├── system/            # CodeIgniter 4 system files
├── writable/          # Writable directories
├── .env               # Environment configuration
├── composer.json      # Composer dependencies
└── webgis-alutsista-tni.sql  # Database schema
```

### Setup Development Environment

1. **Clone dan Install**:
```bash
git clone https://github.com/username/webgis_alutsista_tni.git
cd webgis_alutsista_tni
composer install
```

2. **Environment Setup**:
```bash
cp env .env
# Edit .env file dengan konfigurasi development
```

3. **Database Setup**:
```bash
# Import database
mysql -u root -p webgis-alutsista-tni < webgis-alutsista-tni.sql
```

4. **Development Server**:
```bash
php spark serve
```

## Disclaimer

Proyek ini dibuat untuk tujuan:
- **Pembelajaran** dan pengembangan skill programming
- **Demonstrasi** kemampuan WebGIS dengan CodeIgniter 4
- **Portfolio** pengembangan aplikasi web

**Data yang ditampilkan**:
- Merupakan data dummy/simulasi
- Tidak mengandung informasi sensitif atau rahasia
- Tidak dimaksudkan untuk penggunaan operasional militer
- Hanya untuk keperluan akademis dan demonstrasi

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- CodeIgniter 4 Framework
- AdminLTE untuk template admin
- Leaflet.js untuk peta interaktif
- Bootstrap untuk responsive design
- Laragon/XAMPP untuk development environment