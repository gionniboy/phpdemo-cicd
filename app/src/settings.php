<?php declare(strict_types=1);
/**
 * PHP version 7
 * Settings file - customize where needed
 */
return [
    'settings' => [
        'debug' => '__DEBUG__',
        'logger' => [
            'name' => 'demo',
            'path' => __DIR__ . '/../log/demo.log',
            'level' => \Monolog\Logger::INFO,
        ],
        'database' => [
            'driver' => '__DB_DRIVER__',
            'host' => '__DB_HOST__',
            'database' => '__DB_NAME__',
            'username' => '__DB_USER__',
            'password' => '__DB_PASS__',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ],
];
