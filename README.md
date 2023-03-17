<p align="center"><img src="public\favicons\wlogo_tr_128.png" width="128" alt="Laravel Logo"></p>

## Tentang / About LIR
Aplikasi Web Laporan Ibadah Raya (LIR) adalah proyek percobaan dan pembelajaran PHP dengan framework Laravel, referensi untuk <a href="https://laravel.com">LARAVEL</a> bisa dibaca di file <a  href="README_LARAVEL.md">README_LARAVEL.md</a>

## Kebutuhan perangkat lunak / Tools and Requirement
- **[Composer](https://getcomposer.org/)**
- **[MariaDB/MySql, Php, Apache (Xampp)](https://www.apachefriends.org/download.html)**
- **[AdminLTE Template for laravel by jeroennoten](https://github.com/jeroennoten/Laravel-AdminLTE)**
- **[VS Code](https://code.visualstudio.com/)**


## Unduh / Donwload / Clone
- download zip <a href="https://github.com/xrwnz/lir/archive/master.zip">disini</a> 
- atau clone : git clone https://github.com/xrwnz/lir

## Instalasi / Setup
- buka direktori project di terminal (cmd) anda.
- ketikan command : 
  **copy .env.example .env**
  
  (copy paste file ".env.example" jadi file ".env")
- Buka dan Edit file ".env" tersebut, lalu setting configurasi koneksi database pada bagian berikut :

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=lir  
DB_USERNAME=root  
DB_PASSWORD=  

**Lalu ketik command dibawah ini**
- _composer install_
- _php artisan optimize:clear_ 
- _php artisan key:generate_ (untuk generate app key)
- _php artisan migrate_ (untuk membuat struktur database)
- _php artisan db:seed_

## Start to use
Untuk mendapatkan akses login pertama kali dan memulai penggunaan Aplikasi web LIR, bisa dengan registrasi user terlebih dahulu

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
- User / Gembala juga bisa mencetak atau meng-ekspor data Laporan ke dalam format lain yang secara umum dipakai seperti : CSV (Comma Separated Values), Excel (XLSX), dan PDF (Portable Document Format).

 Sekalipun aplikasi web sudah dapat dioperasikan, namun masih banyak fitur yang belum tersedia (dapat di-imporve dikemudian hari), seperti  :
- Landing Page
- User Profile page
- Login Akses Administrator untuk mengelola input laporan Evaluasi IR dari semua Gembala IR
- Page untuk mengelola CRUD master Ibadah Raya
- Page untuk mengelola CRUD User login (termasuk reset password)

## License
Aplikasi web LIR is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
