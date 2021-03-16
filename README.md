## Install
```bash
composer install
```

----
## Setup
Config DB_CASE1, WORDPRESS_PREFIX & WORDPRESS_CONNECTION for WordPress Installation
```dotenv
APP_URL=http://test.test

LOG_CHANNEL=daily
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_app
DB_USERNAME=root
DB_PASSWORD=

DB_CASE1_CONNECTION=mysql
DB_CASE1_HOST=127.0.0.1
DB_CASE1_PORT=3306
DB_CASE1_DATABASE=test_case1
DB_CASE1_USERNAME=root
DB_CASE1_PASSWORD=

WORDPRESS_PREFIX=wp_
WORDPRESS_CONNECTION=mysql1
```
----
## Note
1 site (mysql) & 3 test (mysql1, mysql2 & mysql3) database connections are prepared
```php
// config/database.php
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'test_app'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql1' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_CASE1_HOST', '127.0.0.1'),
            'port' => env('DB_CASE1_PORT', '3306'),
            'database' => env('DB_CASE1_DATABASE', 'test_case1'),
            'username' => env('DB_CASE1_USERNAME', 'root'),
            'password' => env('DB_CASE1_PASSWORD', ''),
            'unix_socket' => env('DB_CASE1_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql2' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_CASE2_HOST', '127.0.0.1'),
            'port' => env('DB_CASE2_PORT', '3306'),
            'database' => env('DB_CASE2_DATABASE', 'test_case2'),
            'username' => env('DB_CASE2_USERNAME', 'root'),
            'password' => env('DB_CASE2_PASSWORD', ''),
            'unix_socket' => env('DB_CASE2_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql3' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_CASE3_HOST', '127.0.0.1'),
            'port' => env('DB_CASE3_PORT', '3306'),
            'database' => env('DB_CASE3_DATABASE', 'test_case3'),
            'username' => env('DB_CASE3_USERNAME', 'root'),
            'password' => env('DB_CASE3_PASSWORD', ''),
            'unix_socket' => env('DB_CASE3_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

```

----
## Example  
Migration for `mysql1 (DB_CASE1_DATABASE=test_case1)` can found here:
`database/migrations/2021_03_16_090701_create_case1_examples_table.php`
----
## Don't forget
```bash
php artisan config:cache
```
