unzip file 

open terminal in unziped project and run following command,
cp .env.example .env

create a new database in mysql.

edit .env file and change following,
DB_DATABASE=your_database_name_here
DB_USERNAME=your_database_uesrname
DB_PASSWORD=your_database_password

then in terminal run,
composer update

then,
php artisan migrate --seed
or
php artisan migrate:refresh --seed

it will create admin user using seed class,

then run,
php artisan serve

login using following credentials,
email - admin@example.com
password - password

after log in you will be able to add new users and also add blacklisted words.
new users can then log in and send messages to each other.
