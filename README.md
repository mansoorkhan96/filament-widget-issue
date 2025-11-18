# Installation

```bash
composer install

cp .env.example .env

php artisan key:generate

touch database/database.sqlite

php artisan migrate

php artisan db:seed
```

# Testing

Login to admin panel at `/admin` with credentials:

-   Email: `test@example.com`
-   Password: `password`

You should see a stats overview widget with a select filter for groups.
