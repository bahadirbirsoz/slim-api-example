<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.06.2019
 * Time: 12:34
 */

namespace Zirve\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;
use Zirve\Models\Player;

class PlayerController extends Base
{

    public function post(Request $request, Response $response)
    {
        $player = new Player();

        $this->applyRequestToPlayer($request, $player);

        $player->save();
        $response->write(
            $player
        );
    }

    public function get(Request $request, Response $response, $args)
    {
        return $response->withJson(Player::find($args)->first());
    }

    public function getall(Request $request, Response $response, $args)
    {
        return $response->withJson(Player::all() );
    }

    public function delete(Request $request, Response $response, $args)
    {
        $player = Player::find($args)->first();
        if (!$player) {
            return $response->withJson([])->withStatus(404);
        }
        $player->delete();

        return $response->withJson( $player);
    }

    public function put(Request $request, Response $response, $args)
    {
        $player = Player::find($args)->first();
        if (!$player) {
            return $response->withJson([])->withStatus(404);
        }
        $this->applyRequestToPlayer($request, $player);
        try{
            $player->save();
            return $response->withJson( $player);
        }catch (\Exception $e){
            return $response->withJson( [
                "message" => "İşlem sırasında bir hata oluştu"
            ] )->withStatus(400);
        }
    }

    protected function applyRequestToPlayer(Request $request, &$player)
    {
        $parsedBody = $request->getParsedBody();
        $player->name = $parsedBody['name'];
        $player->team_id = $parsedBody['team_id'];
    }


}