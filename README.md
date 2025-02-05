# JobTerkini 📃

🚀 **JobTerkini** adalah platform pencarian kerja yang menghubungkan pencari kerja dengan perusahaan yang membutuhkan tenaga profesional.

## 🌟 Fitur Utama
- 🔍 **Pencarian Lowongan**: Temukan pekerjaan berdasarkan kategori, lokasi, dan perusahaan.
- 🏢 **Profil Perusahaan**: Perusahaan dapat menampilkan informasi lengkap dan membuka lowongan pekerjaan.
- 📄 **Lamar Pekerjaan**: Pengguna dapat mengunggah CV, surat lamaran, dan dokumen pendukung.
- 📊 **Dashboard Perusahaan**: Kelola lowongan pekerjaan, melihat pelamar, dan memperbarui informasi perusahaan.
- 🔐 **Sistem Autentikasi**: Login terpisah untuk admin, perusahaan, dan pengguna.

## 🛠️ Teknologi yang Digunakan
- **Backend**: Laravel 10
- **Frontend**: Bootstrap
- **Database**: MySQL
- **Authentication**: Middleware khusus untuk setiap role

## 📥 Instalasi
1. Clone repository:
   ```sh
   git clone https://github.com/nabilasdeveloper/jobterkini.git
   cd jobterkini
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
3. Konfigurasi **.env**:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Migrasi database:
   ```sh
   php artisan migrate --seed
   ```
5. Jalankan aplikasi:
   ```sh
   php artisan serve
   ```
   

🚀 **Temukan pekerjaan impianmu dengan JobTerkini!**
