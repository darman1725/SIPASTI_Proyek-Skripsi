## Skripsi
Sistem Pendukung Keputusan Rekrutmen Petugas Statistik Badan Pusat Statistik (BPS) Kota Malang Menggunakan Metode SMART

## Instalasi
1. Clone proyek ini
    ```bash
    git clone https://github.com/zuramai/laravel-mazer
    cd laravel-mazer
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    dan javascript dependencies
    ```bash
    yarn install && yarn dev

    #ATAU

    npm install && npm run dev
    ```

3. Atur konfigurasi Laravel
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Atur database pada file .env

5. Migrasi database
    ```bash
    php artisan migrate --seed
    ```

6. Jalankan proyek aplikasi
    ```bash
    php artisan serve
    ```

7. Login credentials

**Email:** user@gmail.com

**Password:** password
