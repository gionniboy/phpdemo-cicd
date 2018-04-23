<?php declare(strict_types=1);

use Demo\Model\User;
use Slim\Http\Request;
use Slim\Http\Response;

/** @var \Slim\App $app */
global $app;

$app->get('/users', function (Request $request, Response $response, array $args) {
    $users = User::all();
    if (!$users) {
        $data = "users not found";
        return $response->withJson($data, 404);
    }
    return $response->withJson($users, 200);
});

// return single record
$app->get('/users/{id:[0-9]+}', function (Request $request, Response $response, array $args) {
    $user = User::find($args["id"]);
    if (!$user instanceof User) {
        $data = "user not found";
        return $response->withJson($data, 404);
    }
    return $response->withJson($user, 200);
});

$app->post('/users', function (Request $request, Response $response, array $args) use ($app) {
    $parsedBody = $request->getParsedBody();

    if (!isset($parsedBody['name'])) {
        $data = "name cannot be null";
        $app->getContainer()->get('logger')->debug('/users name null ' . var_export($args, true));
        return $response->withJson($data, 400);
    } else {
        if (mb_strlen($parsedBody['name'], 'UTF-8') > 30) {
            $data = "name too long: max 30 chars";
            $app->getContainer()->get('logger')->debug('/users name too long ' . var_export($args, true));
            return $response->withJson($data, 400);
        }
    }

    /**
     * Check existence for element to create: name is UNIQUE
     */
    $user = User::where('name', $parsedBody['name'])->first();
    // check instanceof Model
    if ($user instanceof User && $user->name == $parsedBody['name']) {
        $data = "name already exists";
        return $response->withJson($data, 400);
    }

    $name = $parsedBody['name'];
    $app->getContainer()
        ->get('logger')
        ->debug('Route /users has been called with args ' . var_export($args, true));

    // create if not exists
    $user = new User();
    $user->name = $name;
    $user->save();
    $app->getContainer()
        ->get('logger')
        ->info("NEW USER CREATED " . var_export($user['name'], true));

    return $response->withJson($user, 200);
});

// delete existing record
$app->delete('/users/{id:[0-9]+}', function (Request $request, Response $response, array $args) {
    $user = User::find($args["id"]);
    if (!$user instanceof User) {
        $data = "user not found";
        return $response->withJson($data, 404);
    }

    $user->delete();
    return $response->withJson($user, 200);
});
