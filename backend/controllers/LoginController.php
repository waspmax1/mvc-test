<?php
/**
 * Created by PhpStorm.
 * User: wasmax1
 * Date: 11.11.2017
 * Time: 14:21
 */

namespace admin\controllers;

use controllers\Controller;
use admin\models\AdminDbModel;
class LoginController extends Controller
{
//    public function actionView()
//    {
//        $this->render('backend', 'main/header', 'main/footer', 'backend/login');
//    }

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