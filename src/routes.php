<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();
    $container->db;

    $app->get('/teams', function (Request $request, Response $response, array $args) use ($container) {
        //echo json_encode(\Zirve\Models\Section::all());
        return $response->withJson(\Zirve\Models\Team::all());
    });

    $app->get('/team/{id}', function (Request $request, Response $response, array $args) use ($container) {
        //echo json_encode(\Zirve\Models\Section::all());
        return $response->withJson(\Zirve\Models\Team::find($args)->first());
    });

    $app->post('/team', function (Request $request, Response $response, array $args) use ($container) {
        $body = $request->getParsedBody();
        $team = new \Zirve\Models\Team();
        $team->team = $body['team'];
        $team->save();
        return $response->withJson($team);
    });

    $app->delete('/team/{id}',function (Request $request, Response $response, $args){
        $team = \Zirve\Models\Team::find($args)->first();
        if(!$team){
            return $response->withJson([],404);
        }
        $team->delete();
        return $response->withJson($team);
    });


    $app->put('/team/{id}', function (Request $request, Response $response, array $args) use ($container) {
        $body = $request->getParsedBody();

        $team = \Zirve\Models\Team::find($args)->first();
        if(!$team){
            return $response->withJson([],404);
        }
        $team->team = $body['team'];
        $team->save();
        return $response->withJson($team);
    });


    $app->get('/players', \Zirve\Controllers\PlayerController::class.':getall' );
    $app->get('/player/{id}', \Zirve\Controllers\PlayerController::class.':get' );
    $app->post('/player', \Zirve\Controllers\PlayerController::class.':post' );
    $app->put('/player/{id}', \Zirve\Controllers\PlayerController::class.':put' );
    $app->delete('/player/{id}', \Zirve\Controllers\PlayerController::class.':delete' );

};
