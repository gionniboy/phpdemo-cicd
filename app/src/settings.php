<?php declare(strict_types=1);
/**
 * PHP version 7
 * Settings file - customize where needed
 */
return [
    'app' => [
        'url' => '__APP_URL__',
    ],
    'settings' => [
        'debug' => 'false',
        'logger' => [
            'name' => 'demo',
            'path' => __DIR__ . '/../log/demo.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'displayErrorDetails' => 'false',
        'database' => [
            'driver' => 'mysql',
            'host' => '__DB_HOST__',
            'database' => '__DB_NAME__',
            'username' => '__DB_USER__',
            'password' => '__DB_PASS__',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
        'security' => [
            'cors_domain' => '__CORS_DOMAIN__'
        ]
    ],
];
