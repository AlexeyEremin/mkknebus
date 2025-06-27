#!/bin/sh

if [ ! -f ".env" ]; then
  cp .env.example .env
fi

if [ ! -d "vendor" ]; then
  composer install --no-interaction --prefer-dist
  php artisan key:generate
fi

php artisan migrate --seed --force

exec "$@"
