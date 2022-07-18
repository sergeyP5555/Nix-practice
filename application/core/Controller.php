<?php

namespace App\core;

use App\FileLogger;

abstract class Controller
{
    public array $route;
    public object $view;
    public object $logger;
    public $model;

    public function __construct($route)
    {
        $this->logger = new FileLogger();
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'App\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path();
        }
        return false;
    }
}
