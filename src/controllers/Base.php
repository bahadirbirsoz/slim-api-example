<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.06.2019
 * Time: 12:34
 */

namespace Zirve\Controllers;


use Zirve\Plugins\Auth;

class Base
{

    protected $_app;


    public function __construct($app)
    {
        $this->_app = $app;
    }

    /**
     * @return Auth
     */
    protected function auth(){
        return $this->_app->get("auth");
    }



}