<?php

namespace controllers;

class Router
{

    private $uri;

    public function __construct($uri = '/')
    {
        $this->uri = $uri;
        $this->uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
        if(empty($this->uri[0])){
            $this->uri[0] = '/';
        }
        return $this->uri;
    }
    public function run()
    {
        if($this->uri[0] == '/'){
            $getController = new SiteController();
            return $getController->actionIndex();
        }else{
            $className = 'frontend/controllers/'.$this->uri[0] . 'Controller.php';
            $controllerName = 'controllers\\'.ucfirst($this->uri[0]) . 'Controller';
            if(file_exists($className) && !empty($this->uri[1])){
                $getController = new $controllerName();
                $getController->actionView($this->uri[1]);
            }else{
               return SiteController::actionError();
            }
        }
    }
}
