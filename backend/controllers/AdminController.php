<?php
/**
 * Created by PhpStorm.
 * User: wasmax1
 * Date: 11.11.2017
 * Time: 13:53
 */

namespace admin\controllers;
use controllers\Controller;
use admin\models\AdminDbModel;

class AdminController extends Controller
{
    
    public function actionIndex()
    {
        if(isset($_COOKIE['auth']['logged']) && $_COOKIE['auth']['logged'] == 1){
            $pageInfo = ['title' => 'Admin index page', 'description' => ''];
            $this->render('backend', 'main/header', 'main/footer', 'index', compact('pageInfo'));
        }else{
            $loginC = new LoginController();
            $validateMethod = $loginC->loginValidate();
            $pageInfo = ['title' => 'Admin login page', 'description' => ''];
            $this->render('backend', 'main/header', 'main/footer', 'login', compact('pageInfo', 'validateMethod'));
        }
    }

}