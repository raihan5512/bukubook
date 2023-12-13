# Project Bukubook Laravel Fundamentals Brainmatics

## How to deploy:
- Clone the repository, `git clone {url-repository}`
- Copy `.env.example` to `.env`
- Change `APP_NAME` variable in .env
- Config your database if needed
- Run `composer install`
- Run `php artisan key:generate`
- Run `npm install`
- Run `npm run build`
- Run `php artisan migrate` if needed (fresh & --seed with default user)
- Run `php artisan storage:link` if needed

## Default Account in seeder
- admin@bukubook.com:4dm1n
- user@bukubook.com:us3r
