<p align="center"></p>

<h1 align="center">
   <a href="https://github.com/RegaAnton/Laporan_Transaksi_Keuangan.git" target="_blank" align="center">
      Laporan Transaksi Keuangan
   </a>
</h1>

<p align="center">Menggunakan Bootstrap 5 sebagai Frontend Dan Laravel 11 sebagai Backend</p>

![App Screenshot](./public/images/apps/login_page.png)
![App Screenshot](./public/images/apps/dashboard_page.png)

## Introduction 🚀

Selamat datang di LaporanTransaksi Apps, platform laporan keuangan pribadi yang dirancang untuk memberikan kontrol penuh atas keuangan Anda. Dengan antarmuka yang intuitif dan didukung oleh teknologi Bootstrap 5 dan Laravel 11, FinanceFlow memudahkan pengguna untuk melacak Pemasukan dan Pengeluaran sehari-hari dengan efisien.

Di LaporanTransaksi Apps, kami memahami pentingnya mengelola keuangan dengan cara yang terstruktur dan mudah diakses.

## Installation ⚒️

Installing and running Sneat is super easy, please Follow below steps and you will be ready to rock 🤘

- Open the terminal in your root directory.

- Clone Project

```bash
git clone https://github.com/RegaAnton/Laporan_Transaksi_Keuangan.git
```

- Move to project

```bash
cd Laporan_Transaksi_Keuangan
```

- Use the following command to install the composer

```bash
composer install
```

- Copy .env.example ke .env

```bash
cp .env.example .env
```

- Run the following command to generate the key

```bash
php artisan key:generate
```

- Open the env file to change the database according to the one you are using

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
```

- Create Database

```bash
php artisan migrate:fresh
```

- Start Project

```bash
php artisan serve
```
