<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 2019-07-12
 * Time: 11:03
 */

namespace Zirve\Plugins;


use Zirve\Models\Token;
use Zirve\Models\User;

class Auth
{

    const ROLE_GUEST = 0;
    const ROLE_USER = 1;

    /**
     * @var Token
     */
    protected $token;

    protected $role = 0;


    public function isUser()
    {
        return $this->role == self::ROLE_USER;
    }

    public function isGuest()
    {
        return $this->role == self::ROLE_GUEST;
    }

    public function setGuest()
    {
        return $this->role == self::ROLE_GUEST;
    }

    public function login(Token $token)
    {
        $this->token = $token;
        $this->role = self::ROLE_USER;
    }

    public function hasToken()
    {
        return $this->token && true;
    }

    public function getToken()
    {
        return $this->token;
    }

}