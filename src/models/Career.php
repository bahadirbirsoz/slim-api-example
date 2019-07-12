<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 09:42
 */

namespace Zirve\Models;


use Illuminate\Database\Eloquent\Model;

class Career extends Model
{

    protected $id;
    protected $player_id;
    protected $team_id;

    public function team()
    {
        return $this->hasOne("\Zirve\Models\Team");
    }

    public function player()
    {
        return $this->hasOne("\Zirve\Models\Player");
    }


}