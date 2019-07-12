<?php

use Slim\App;

return function (App $app) {
    // e.g: $app->add(new \Slim\Csrf\Guard);

    $app->add(function (\Psr\Http\Message\RequestInterface $request, \Psr\Http\Message\ResponseInterface $response, $next) use ($app) {

        if (!$request->hasHeader("Authorization")) {
            return $next($request, $response);
        }

        // Header'da Auth Token Var, Kontrol Edelim
        $authHeader = $request->getHeaderLine("Authorization");
        $authHeaderParts = explode(" ", $authHeader);

        if ($authHeaderParts[0] != "Bearer") {
            return $next($request, $response);
        }

        $token = \Zirve\Models\Token::query()->where("token", "=", $authHeaderParts[1])->get()->first();
        if (!$token) {
            return $next($request, $response);
        } else {
            $auth = $this->get("auth");
            $auth->login($token);
        }
        return $next($request, $response);
    });


};
