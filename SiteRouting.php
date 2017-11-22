<?php




class SiteRouting
{
    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        if($uri[1] != 'admin'){
            $router = new controllers\Router();
            $router->run();
        }else{
            $router = new admin\controllers\Router();
            $router->run();
        }
    }
}