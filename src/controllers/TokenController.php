<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 11:36
 */

namespace Zirve\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Zirve\Models\Token;
use Zirve\Models\User;

class TokenController extends Base
{

    public function post(Request $request, Response $response, $args)
    {
        $input = $parsedBody = $request->getParsedBody();

        if (!array_key_exists("username", $input)) {
            return $response->withStatus(400)->withJson([
                "messages" => [
                    "Username is required"
                ]
            ]);
        }

        if (!array_key_exists("password", $input)) {
            return $response->withStatus(400)->withJson([
                "messages" => [
                    "Password is required"
                ]
            ]);
        }

        $user = User::query()->where("username", "=", $input["username"])->get()->first();
        if (!$user) {
            return $response->withStatus(400)->withJson([
                "messages" => [
                    "Password is required"
                ]
            ]);
        }

        if ($user->checkPassword($input["password"])) {
            $token = new Token();
            $token->token = sha1(uniqid());
            $token->user_id = $user->id;
            $token->save();

            return $response->withJson($token);
        } else {

            die("FALSE");
        }


    }

}