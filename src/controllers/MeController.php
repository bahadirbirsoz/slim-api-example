<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 12:05
 */

namespace Zirve\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class MeController extends Base
{


    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function get(Request $request, Response $response)
    {

        if(!$this->auth()->isUser()){
            return $response->withStatus(401);
        }

        $auth = $this->_app->get("auth");
        $token = $auth->getToken();
        $token->user;
        return $response->withJson($token);
    }


}