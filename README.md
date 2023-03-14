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
- **[Hanhan](https://hanhan.co.id)**
- **[Julianto](https://julianto.co.id)**

## Kontribusi / Contributing
Terima kasih untuk kontribusinya di proyek percobaan ini

## License
Aplikasi web LIR is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
