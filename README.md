## Step by step

<pre>
$ docker-compose up -d
$ docker-compose exec app composer install --no-cache --no-dev
$ docker-compose exec app php artisan migrate --seed --force
</pre>

## .env for quick start

<code>touch .env</code>
<pre>
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:+vSKXcklufWTLrN9R5xGaLcmSdt25FrOlARK5wpRPvE=
APP_DEBUG=false
APP_URL=http://localhost:8080
TELESCOPE_ENABLED=false

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=mysql
DB_HOST=mysql

DB_PORT=3306
DB_DATABASE=jobs
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

DOCKER_WEB_PORT=8080

FILESYSTEM_DISK=public
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
</pre>

## Default users

### Admin
<pre>
Email: admin@localhost.dev
Password: admin
</pre>

### User
<pre>
Email: user@localhost.dev
Password: user
</pre>
