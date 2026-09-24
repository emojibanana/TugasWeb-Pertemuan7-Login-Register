# Login / Register Tugas 7
[![BETA](https://img.shields.io/badge/status-BETA-yellow)](https://github.com/emojibanana/TugasWeb-Pertemuan7-Login-Register)

Sistem login dan registrasi prosedural murni menggunakan PHP native. Proyek ini dibangun murni untuk membedah logika fundamental autentikasi dan manajemen sesi (session) tanpa intervensi framework atau database relasional.

## 📝 Syarat & Kriteria Tugas yang Diselesaikan

Proyek ini telah memenuhi seluruh kriteria penugasan berikut:

- [x] **Form registrasi dengan validasi (nama, email, password)**.
- [x] **Validasi email dengan filter_var()**.
- [x] **Password di-hash dengan password_hash()**.
- [x] **Data disimpan di file JSON**.
- [x] **Cek duplikasi email saat registrasi**.
- [x] **Sistem login dengan session**.
- [x] **Dashboard yang diproteksi (redirect jika belum login)**.
- [x] **Logout functionality (session_destroy)**.
- [x] **Sanitasi input dengan htmlspecialchars()**.
- [x] **Pesan error & sukses yang jelas**.

---

## 🚀 Fitur Fungsional
1. Registrasi pengguna dengan validasi kelengkapan form dan verifikasi format email (`filter_var`).
2. Kriptografi password standar industri menggunakan `password_hash()`.
3. Penyimpanan data persisten menggunakan format flat-file (`users.json`).
4. Algoritma pengecekan untuk mencegah duplikasi pendaftaran email.
5. Manajemen login menggunakan state `$_SESSION`.
6. Rute dashboard terproteksi dengan pengalihan otomatis (redirect) jika sesi tidak valid.
7. Sanitasi input dasar menggunakan `htmlspecialchars()` untuk memitigasi serangan XSS.

## ⚙️ Teknologi yang Digunakan
- **PHP (Native/Procedural):** Pemrosesan logika autentikasi, enkripsi password, dan manajemen state (session).
- **JSON:** Format penyimpanan data persisten sebagai pengganti database relasional (*flat-file database*).
- **HTML5:** Struktur antarmuka pengguna murni tanpa dependensi *styling* atau skrip eksternal.

## 🛠️ Panduan Eksekusi
1. Tempatkan seluruh file proyek ini ke dalam direktori *document root* web server lokal Anda (misalnya di dalam folder `www` jika menggunakan Laragon, atau konfigurasi root pada FlyEnv).
2. Pastikan file `users.json` sudah ada, berisi tepat array kosong `[]`, dan direktori memiliki hak akses tulis (write permissions) untuk web server.
3. Buka browser dan navigasikan ke: `http://localhost/nama-folder-proyek/register.php`

## 🧠 Rencananya

- Tambah Header
- Tambah Footer
- Desain visual yang modern dan bersih
- Tambah animasi bagus


## 📂 Struktur Direktori
```text
.
├── dashboard.php  # Halaman antarmuka terproteksi (wajib sesi aktif)
├── login.php      # Rute autentikasi dan pencocokan kredensial
├── logout.php     # Rute terminasi sesi dan pembersihan state
├── register.php   # Logika validasi, sanitasi, hashing, dan penulisan JSON
├── users.json     # Target penyimpanan data (wajib memiliki hak akses tulis/write)
└── README.md      # Dokumentasi teknis proyek
