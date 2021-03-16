<?php

return [
    'wordpress' => [
        'connection' => env('WORDPRESS_CONNECTION', 'mysql1'),
        'prefix' => env('WORDPRESS_PREFIX', 'wp_'),
    ],
];
