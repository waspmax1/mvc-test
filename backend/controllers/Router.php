<?php

namespace admin\controllers;


class Router
{

    public function run()
    {
        $uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
        $className = 'backend/controllers/'.$uri[0] . 'Controller.php';
        $controllerName = 'admin\\controllers\\'.ucfirst($uri[0]) . 'Controller';
        if(file_exists($className) && empty($uri[1])){
            $controllerObj = new $controllerName();
            $controllerObj->actionIndex();
        }else{
            $controllerName = 'admin\\controllers\\'.ucfirst($uri[1]) . 'Controller';
            $controllerAction = $uri[2];
            $controllerObj = new $controllerName();
            if(!empty($uri[3])){
                $param = $uri[3];
                $controllerObj->$controllerAction($param);
            }else{
                $controllerObj->$controllerAction();
            }
        }
    }

}
