release: php artisan migrate --force
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan ingest:process