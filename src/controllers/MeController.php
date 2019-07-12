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
    public function get(Request $request, Response $response)
    {

        $response->withJson();

    }

}