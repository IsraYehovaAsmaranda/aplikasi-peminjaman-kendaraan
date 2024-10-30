Account
Username : admin@gmail.com
Password : 123
Role     : Admin

Username : atasan@gmail.com
Password : 123
Role     : atasan

Username : atasan2@gmail.com
Password : 123
Role     : atasan

Database-Version: MySQL Ver 15.1
PHP-Version: 8.2.12
Framework: Laravel 11.29.0

Panduan Penggunaan Aplikasi:
0. Generate key dengan command php artisan key:generate, migrate database dengan menggunakan command php artisan migrate:fresh --seed
1. Login menggunakan username dan password yang telah dibuat.
2. Terdapat dua role, yaitu admin dan atasan.
3. Setelah login, pengguna akan dialihkan ke halaman dashboard yang berisi grafik pemesanan kendaraan

Pemesanan Kendaraan
4. Tekan menu pemesanan kendaraan di sidebar menu
5. Halaman akan menampilkan tabel berisikan data pemesanan kendaraan
6. Untuk menambahkan pemesanan, tekan tombol "Tambah Pemesanan"
7. Isi form yang terdapat di halaman penambahan pemesanan
8. Tekan tombol "Submit" untuk menyimpan data pemesanan
9. Jika login sebagai admin, maka tombol yang tersedia di setiap data adalah Update. Namun tombol tersebut hanya aktif saat belum diverifikasi atasan
10. Tekan update untuk melakukan perubahan data pemesanan
11. Isi form yang terdapat di halaman perubahan pemesanan sesuai dengan data yang diubah
12. Tekan tombol "Submit" untuk menyimpan perubahan data pemesanan
13. Jika login sebagai admin, maka tombol yang tersedia adalah verifikasi dan tolak, namun tombol tersebut hanya aktif saat belum diverifikasi atasan dan pihak penyetuju sesuai dengan akun yang digunakan
14. Tekan verifikasi untuk mengubah status pemesanan menjadi "Diverifikasi oleh atasan"
15. Tekan tolak untuk mengubah status pemesanan menjadi "Ditolak oleh atasan"

Laporan Periodik Pemesanan Kendaraan
16. Tekan menu laporan periodik pemesanan di sidebar menu
17. Masukkan tanggal awal dan tanggal akhir
18. Sistem akan menampilkan tabel berisikan data laporan periodik pemesanan kendaraan sesuai berdasarkan tanggal yang diinput
19. Tekan tombol "Excel" untuk mendownload laporan periodik pemesanan kendaraan dalam bentuk file Excel
20. Tekan tombol "PDF" untuk mendownload laporan periodik pemesanan kendaraan dalam bentuk file PDF
21. Tekan tombol "CSV" untuk mendownload laporan periodik pemesanan kendaraan dalam bentuk file CSV
22. Tekan tombol "copy" untuk menyalin data laporan periodik pemesanan kendaraan ke clipboard

Sign Out
23. Tekan nama akun di sidebar bawah
24. Tekan menu "Sign Out"