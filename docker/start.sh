#!/usr/bin/env sh
set -eu

if [ -z "${APP_URL:-}" ] && [ -n "${RENDER_EXTERNAL_HOSTNAME:-}" ]; then
    export APP_URL="https://${RENDER_EXTERNAL_HOSTNAME}"
fi

php artisan storage:link --force
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec apache2-foreground
