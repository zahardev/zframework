<?php

namespace App;


abstract class Controller
{
    public function action($action)
    {
        $method = 'action' . $action;
        return $this->$method();
    }
}