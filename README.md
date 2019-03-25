<h1>Interface Monitoring sistem</h1>

ini adalah aplikasi monitoring sensor ketinggian air pada landasan pesawat terbang berbasis web.
aplikasi ini dibuat menggunakan framwork laravel.

Cara menggunakan :
-buat folder pada komputer anda
-git bash pada folder tersebut
-git clone
-masuk ke directory folder hasil clone
-composer install
-npm install
-rename file .env.example menjadi .env
-setting database
-php artisan key:generate
-php artisan storage:link
-buat database pada phpmysql dengan nama yang sama pada file .env
-php artisan migrate:fresh --seed
-php artisan serve
