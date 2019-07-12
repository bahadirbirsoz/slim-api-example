<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function ($container) {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($container['settings']['db']);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    };

    $container['auth'] = function ($container) {
        return new \Zirve\Plugins\Auth();
    };

};
