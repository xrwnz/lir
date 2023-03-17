<p align="center"><img src="public\favicons\wlogo_tr_128.png" width="128" alt="Laravel Logo"></p>

## Tentang LIR
Aplikasi Web Laporan Ibadah Raya (LIR) adalah proyek percobaan dan pembelajaran PHP dengan framework Laravel, referensi untuk <a href="https://laravel.com">LARAVEL</a> bisa dibaca di file <a  href="README_LARAVEL.md">README_LARAVEL.md</a>

## Kebutuhan alat / perangkat lunak (Tools and Requirement)
- Composer
- MariaDB/MySql, Php, Apache (Xampp)
- VS Code


## Unduh / Donwload / Clone
- download zip <a href="https://github.com/xrwnz/lir/archive/master.zip">disini</a> 
- atau clone : git clone https://github.com/xrwnz/lir

## Instalasi / Setup
- buka direktori project di terminal anda.
- ketikan command : 
  copy .env.example .env (copy paste file ".env.example" jadi file ".env")
- setting configurasi database dalam file ".env" tersebut

Lalu ketik command dibawah ini
- composer install
- php artisan optimize:clear 
- php artisan key:generate (generate app key)
- php artisan migrate (migrasi database)
- php artisan db:seed 

## Login
Email : admin@example.com
Password : admin

## Fitur
### Front / Depan
- Home (Halaman home, User profiling belum diimplentasikan) 
- Register user baru
- Login
- Logout

### admin
- Autentikasi (menggunakan laravel ui/sanctum)
- Halaman Dashboard (menggunakan template adminlte)
- Daftar LIR (CRUD)
- Dialog modal untuk membuat LIR baru
- Dialog modal untuk mengubah LIR yang pernah diinput
- Dialog modal untuk menghapus LIR

## Author
- xrwnz

## Premium Partners
- **[Egi](https://egi.co.id/)**
- **[Dani](https://dani.co.id/)**
- **[Hanhan](https://hanhan.co.id)**
- **[Ivan](https://ivan.co.id/)**
- **[Julianto](https://julianto.co.id)**

## Kontribusi / Contributing
Terima kasih untuk kontribusinya di proyek percobaan ini

## Catatan / Note
Aplikasi web [LIR] ini sudah bisa berfungsi secara mendasar untuk input pelaporan ibadah raya sebagaimana mestinya, meliputi fitur sebagai berikut :
- Registrasi User baru untuk dapat membuat laporan ibadah raya. User dalam hal ini adalah Gembala IR
- Home page berisi Daftar / List Laporan yang pernah dibuat berfungsi juga sebagai halaman untuk operasi dasar CRUD (Create, Retrieve, Update, dan Delete)
- User / Gembala hanya dapat mengakses data laporan yang dibuatnya
- User / Gembala juga bisa meng-ekspor data Laporan ke dalam format lain yang secara umum dipakai seperti

 tapi masih banyak fitur yang belum tersedia, seperti [belum tersedianya] beberapa hal sebagai berikut :
- Landing Page
- User Profile page
- Login Akses Administrator untuk mengelola input laporan Evaluasi IR dari semua Gembala IR
- Page untuk mengelola CRUD master Ibadah Raya
- Page untuk mengelola CRUD User login (termasuk reset password)

## License
Aplikasi web LIR is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
