<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();
    $container->db;
//
//    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
//        // Sample log message
//        $container->get('logger')->info("Slim-Skeleton '/' route");
//
//        // Render index view
//        return $container->get('renderer')->render($response, 'index.phtml', $args);
//    });

    $app->get('/urunler', function (Request $request, Response $response, array $args) use ($container) {
        //echo json_encode(\Zirve\Models\Section::all());
        $sec = new \Zirve\Models\Team();
        $sec->team = "asd";
        $sec->save();
        $response->write( $sec );

    });

    $app->get('/players', \Zirve\Controllers\PlayerController::class.':getall' );
    $app->get('/player/{id}', \Zirve\Controllers\PlayerController::class.':get' );
    $app->post('/player', \Zirve\Controllers\PlayerController::class.':post' );
    $app->put('/player/{id}', \Zirve\Controllers\PlayerController::class.':put' );
    $app->delete('/player/{id}', \Zirve\Controllers\PlayerController::class.':delete' );



    $app->get('/menu', function (Request $request, Response $response, array $args) use ($container) {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        sleep(2);
        echo json_encode(
            [
                ["icon" => 'trending_up', "text" => 'Most Popular'],
                ["icon" => 'subscriptions', "text" => 'Subscriptions'],
                ["icon" => 'history', "text" => 'History'],
                ["icon" => 'featured_play_list', "text" => 'Playlists'],
                ["icon" => 'watch_later', "text" => 'Watch Later']
            ]
        );
    });


};
