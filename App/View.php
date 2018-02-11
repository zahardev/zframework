<?php

namespace App;

class View implements \Countable
{

    protected $data;

    function __set($name, $arguments)
    {
        $this->data[$name] = $arguments;
    }

    function __get($name)
    {
        return $this->data[$name];
    }

    function __isset($name)
    {
        return isset($this->data[$name]);
    }

    function count(){
        return count($this->data);
    }

    function render($template){
        extract($this->data);
        ob_start();
        include __DIR__ . '/views/' . $template . '.php';

        return ob_get_clean();
    }

    function display($template){
        echo $this->render($template);
    }
}