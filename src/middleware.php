<?php

use Slim\App;

return function (App $app) {
    // e.g: $app->add(new \Slim\Csrf\Guard);

    $app->add(function (\Slim\Http\Request $request, \Slim\Http\Response $response, $next) use ($app) {
        /** @var \Zirve\Plugins\Auth $auth */
        $auth = $this->get("auth");

        $response = (function () use ($auth,$request,$response){
            if (!$request->hasHeader("Authorization")) {
                return $response;
            }

            // Header'da Auth Token Var, Kontrol Edelim
            $authHeader = $request->getHeaderLine("Authorization");
            $authHeaderParts = explode(" ", $authHeader);

            if ($authHeaderParts[0] != "Bearer") {
                return $response;
            }

            $token = \Zirve\Models\Token::query()->where("token", "=", $authHeaderParts[1])->get()->first();
            if (!$token) {
                return $response;
            } else {
                $auth->login($token);
            }
            return $response;

        })();

        return $next($request, $response);


    });


};
