<?php declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\UidProcessor;
use Slim\Container;
use Slim\Http\Response;
use Slim\Http\Request;
use Demo\Handler\DbConnExceptionHandler;

global $app;

// Container Dependencies Injection
$container = $app->getContainer();

// Monolog
$container['logger'] = function (Container $container) {
    $settings = $container->get('settings');
    $logger = new Logger($settings['logger']['name']);
    $logger->pushProcessor(new UidProcessor());
    $logger->pushHandler(
        new StreamHandler(
            $settings['logger']['path'],
            $settings['logger']['level']
        )
    );
    return $logger;
};


// Eloquent ORM
$capsule = new Capsule;
$capsule->addConnection($container->get('settings')['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$capsule->getContainer()->singleton(
    ExceptionHandler::class,
    DbConnExceptionHandler::class
);
