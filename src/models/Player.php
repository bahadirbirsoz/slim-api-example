<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.06.2019
 * Time: 12:33
 */

namespace Zirve\Models;


use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $id;
    protected $name;
    protected $number;

    public function teams()
    {
        return $this->belongsTo("Zirve\Models\Team");
    }


}