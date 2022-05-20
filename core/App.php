<?php

class App {

    protected $controller = 'HomeController';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = ($this->parseUrl());

        if (isset($url[0])) {
            if (file_exists('controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }        

        require_once 'controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], [$this->params]);
    }

    public function parseUrl() {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
            
            // Trimming down the URL to just the useful stuff. (indexes 0-5 were parts of the physical address which aren't needed.)
            $finalUrl = \array_diff_key($url, [0 => "xy", 1 => "xy", 2 => "xy", 3 => "xy", 4 => "xy", 5 => "xy"]);

            return array_values($finalUrl);
        }
    }
}

?>