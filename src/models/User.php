<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 10:50
 */

namespace Zirve\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function tokens()
    {
        return $this->hasMany("Zirve\Models\Token");
    }

    protected function hashPassword($clearText)
    {
        return sha1($clearText);
    }

    public function checkPassword($clearText)
    {
        return $this->password == $this->hashPassword($clearText);
    }

}