<?php

namespace admin\models;

use models\DbModel;

class AdminDbModel extends DbModel
{

    protected $login;
    public function __construct()
    {
        parent::__construct();
    }

    public function adminLoginValidate()
    {
        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            if($login == 'admin' && $password == 'admin'){
                $auth = true;
            }else{
                $auth = false;
            }
        }else{
            $auth = false;
        }
        return  $auth;
    }
}
