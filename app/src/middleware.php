<?php declare(strict_types=1);

use Slim\Http\Request;
use Slim\Http\Response;

global $app;

// inject CORS on routes
$app->add(function (Request $request, Response $response, $next) {
    global $app;

    /** @var Response $response */
    $response = $next($request, $response);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader(
                'Access-Control-Allow-Headers',
                'X-Requested-With, Content-Type, Accept, Origin, Authorization'
            )
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
