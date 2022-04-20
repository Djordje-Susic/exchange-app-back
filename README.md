## Settings

In `.env` file set required variables

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=exchange_app
DB_USERNAME=sail
DB_PASSWORD=password

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@exchange.com"
MAIL_FROM_NAME="${APP_NAME}"
```

And add required custom variables

```
CURRENCYLAYER_ACCESS_KEY=
MAIL_ORDER_REPORT_ADDRESS=
```
First one is API key for https://currencylayer.com/  
Second one is email used to receive order reports for specified currencies

Example is in `.env.example`

## Installation

### Option 1: Docker

1. Install Docker
2. Open first console window in root project folder and run `docker-compose up` (will report errors beacuse vendor folder is missing)
3. Open second console window and
    1. run `docker ps` to get CONTAINER ID of `sail-8.1/app`
    2. run `docker exec -it #CONTAINER_ID bash` to ssh to server
    3. run `composer install` to instal dependencies
    4. run `php artisan migrate:refresh --seed` to create/seed database
    5. run `exit`
4. Go back to first console window and type `ctrl-z` to stop server
5. Run `docker-compose up` to start server

### Option 2: Local server (e.g. XAMPP, WAMP)
Prerequisites: PHP8.1, Composer, XAMPP

1. Place project in `htdocs` folder
2. Open console window in root project folder and run `composer install`
3. Run `php artisan migrate:refresh --seed` to create/seed database

## Endpoints

> POST localhost/api/v1/fetch

Fetches latest quotes from https://currencylayer.com/ and updates local database

> GET localhost/api/v1/quotes

Returns list of quotes

> POST localhost/api/v1/orders

| Param       | Type     | Required | Description |
| ----------- | -------- | ---------| ----------- |
| key         | string   | yes      | Currency pair key e.g. 'USDEUR' |
| amount      | number   | yes      | Amount to purchase |
| quote       | number   | yes      | Requested quote |

Creates new order

> GET localhost/api/v1/orders

Returns list of saved orders
