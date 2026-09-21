# Sistem Autentikasi Dasar PHP (Berbasis JSON)
[![BETA](https://img.shields.io/badge/status-BETA-yellow)](https://github.com/emojibanana/TugasWeb-Pertemuan7-Login-Register)

Sistem login dan registrasi prosedural murni menggunakan PHP native. Proyek ini dibangun murni untuk membedah logika fundamental autentikasi dan manajemen sesi (session) tanpa intervensi framework atau database relasional.

## Fitur Fungsional
1. Registrasi pengguna dengan validasi kelengkapan form dan verifikasi format email (`filter_var`).
2. Kriptografi password standar industri menggunakan `password_hash()`.
3. Penyimpanan data persisten menggunakan format flat-file (`users.json`).
4. Algoritma pengecekan untuk mencegah duplikasi pendaftaran email.
5. Manajemen login menggunakan state `$_SESSION`.
6. Rute dashboard terproteksi dengan pengalihan otomatis (redirect) jika sesi tidak valid.
7. Sanitasi input dasar menggunakan `htmlspecialchars()` untuk memitigasi serangan XSS.

## Persyaratan Sistem
- PHP 8.0 atau lebih baru.
- Web Server lokal.

## Panduan Eksekusi
1. Tempatkan seluruh file proyek ini ke dalam direktori *document root* web server lokal Anda (misalnya di dalam folder `www` jika menggunakan Laragon, atau konfigurasi root pada FlyEnv).
2. Pastikan file `users.json` sudah ada, berisi tepat array kosong `[]`, dan direktori memiliki hak akses tulis (write permissions) untuk web server.
3. Buka browser dan navigasikan ke: `http://localhost/nama-folder-proyek/register.php`
