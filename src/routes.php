<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: content-type');
header('Allow: GET, PUT, POST, DELETE, OPTIONS');


return function (App $app) {
    $container = $app->getContainer();
    $container->db;
    /** @var \Zirve\Plugins\Auth $auth */
    $auth = $container->get("auth");

    $app->options('*', function (Request $request, Response $response, array $args) {

        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

    $app->get('/players', \Zirve\Controllers\PlayerController::class . ':getall');
    $app->get('/player/{id}', \Zirve\Controllers\PlayerController::class . ':get');
    $app->post('/player', \Zirve\Controllers\PlayerController::class . ':post');
    $app->put('/player/{id}', \Zirve\Controllers\PlayerController::class . ':put');
    $app->delete('/player/{id}', \Zirve\Controllers\PlayerController::class . ':delete');


    $app->get('/teams', function (Request $request, Response $response, array $args) use ($container) {
        //echo json_encode(\Zirve\Models\Section::all());
        return $response->withJson(\Zirve\Models\Team::all());
    });

    $app->get('/team/{id}', function (Request $request, Response $response, array $args) use ($container) {
        //echo json_encode(\Zirve\Models\Section::all());
        return $response->withJson(\Zirve\Models\Team::find($args)->first());
    });

    $app->post('/team', function (Request $request, Response $response, array $args) use ($container) {

        if(!$this->auth()->isUser()){
            return $response->withStatus(401);
        }

        $body = $request->getParsedBody();
        $team = new \Zirve\Models\Team();
        $team->team = $body['team'];
        $team->save();
        return $response->withJson($team);
    });

    $app->delete('/team/{id}', function (Request $request, Response $response, $args) {

        if(!$this->auth()->isUser()){
            return $response->withStatus(401);
        }

        $team = \Zirve\Models\Team::find($args)->first();
        if (!$team) {
            return $response->withJson([], 404);
        }
        $team->delete();
        return $response->withJson($team);
    });


    $app->put('/team/{id}', function (Request $request, Response $response, array $args) use ($container) {

        if(!$this->auth()->isUser()){
            return $response->withStatus(401);
        }

        $body = $request->getParsedBody();

        $team = \Zirve\Models\Team::find($args)->first();
        if (!$team) {
            return $response->withJson([], 404);
        }
        $team->team = $body['team'];
        $team->save();
        return $response->withJson($team);
    });

    $app->get('/me', Zirve\Controllers\MeController::class . ':get');

    $app->post('/token', \Zirve\Controllers\TokenController::class . ':post');


};
