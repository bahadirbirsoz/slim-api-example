<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 10:51
 */

namespace Zirve\Models;


use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    public function user()
    {
        return $this->belongsTo("Zirve\Models\User");
    }

//    public static function boot()
//    {
//        parent::boot();
//        self::creating(function ($model) {
//            $model->token = \Phalcon\Text::random();
//        });
//    }

}