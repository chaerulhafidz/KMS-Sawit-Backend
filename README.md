<p align="center"><img src="https://grandorder.wiki/images/thumb/8/80/RiyoDivider1.png/700px-RiyoDivider1.png"></p>


## Back-End KMS Kelapa Sawit

Berikut adalah back-end dari KMS Kelapa Sawit sebagai projek dari penelitian skripsi

---
<p><img src="https://vignette.wikia.nocookie.net/typemoon/images/2/26/Gudakomanga.png/revision/latest/top-crop/width/360/height/450?cb=20190105001649" height=250px></p>

## Instalasi 

### Program Esensial
Untuk menjalankan projek ini, dibutuhkan program berikut:

- **[Composer](https://getcomposer.org/download/)**
- **[XAMPP](https://www.apachefriends.org/download.html)**
- **[Git for Windows](https://gitforwindows.org/)**
- **[Atom](https://atom.io/)** atau **Text Editor yang lain**

### Menjalankan Web

- Clone repository ini dan simpan pada sebuah folder (disarankan dalam folder xampp/htdocs/[nama folder]).
- Buka folder tersebut dan dalam folder tersebut klik kanan dan pilih **Git Bash Here**.
- Dalam terminal GitBash, update composer untuk mengikuti bawaan projek ini:
```
composer update
```
- Aktifkan **XAMPP Control Panel** dan aktifkan **Apache** dan **MySQL**.
- Pada database (defaultnya [localhost/phpmyadmin](http://localhost/phpmyadmin)), buat database baru bernama `kms_sawit`.
- Edit isi dari `.env.example` dengan *text editor*. Ganti bagian `DB_` sesuai dengan database Anda dan simpan sebagai file baru bernama `.env`
```
// Berikut adalah contoh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kms_sawit // bagian ini yang biasa diganti
DB_USERNAME=root
DB_PASSWORD=
```
- Kembali pada terminal GitBash, generasi key untuk laravel:
```
php artisan key:generate
```
- Kemudian, migrasi database:
```
php artisan migrate
```
- Karena projek ini menggunakan otentikasi JWT Token, maka harus *publish* terlebih dahulu
```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
- Kemudian, dapatkan secret-key-nya
```
php artisan jwt:secret
```
- Penginstalan server sudah selesai~ Jalankan server local (default [localhost:8000](http://localhost:8000/)):
```
php artisan serve
```
---
<p><img src="https://fate-go.cirnopedia.org/img/comics/commnet_chara07_rv.png" height=250px></p>

## API List (Untuk sementara ini)

### Otentikasi
#### Petani
- Login
```
http://localhost:8000/api/petani/login
```
- Register
```
http://localhost:8000/api/petani/register
```
- Logout
```
http://localhost:8000/api/petani/logout
```
- Profil
```
http://localhost:8000/api/petani/profil
```

#### Pakar Sawit
- Login
```
http://localhost:8000/api/pakar/login
```
- Register
```
http://localhost:8000/api/pakar/register
```
- Logout
```
http://localhost:8000/api/pakar/logout
```
- Profil
```
http://localhost:8000/api/pakar/profil
```

## Sekian

Terima Kasih