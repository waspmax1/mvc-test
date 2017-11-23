<?php

namespace admin\controllers;

use controllers\Controller;
use admin\models\AdminDbModel;
class LoginController extends Controller
{

    public function loginValidate()
    {
        $dbModel = new AdminDbModel();
        $checkAuth = $dbModel->adminLoginValidate();
        if($checkAuth == true){
            $cookieInterval = time()+60*60*24;
            setcookie('auth[logged]', 1,$cookieInterval,'/');
            $this->goBack();
        }
    }

}
