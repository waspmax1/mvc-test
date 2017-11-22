<?php
/**
 * Created by PhpStorm.
 * User: wasmax1
 * Date: 08.11.2017
 * Time: 18:13
 */

namespace controllers;


class Controller
{
    private $id;
    public function actionView($id)
    {
        $this->id = $id;
        return $this->id;
    }



    public static function render($loadFrom, $header, $footer,$template, $params = array())
    {
        if($loadFrom == 'frontend'){
            $currentDir = $_SERVER['DOCUMENT_ROOT'] . '/frontend';
        }
        if($loadFrom == 'backend'){
            $currentDir = $_SERVER['DOCUMENT_ROOT'] . '/backend';
        }

        ob_start();
        if($params != null){
            extract($params);
        }
        require $currentDir . '/views/layouts/'.$header.'.php';
        require $currentDir . '/views/'.$template.'.php';
        require $currentDir . '/views/layouts/'.$footer.'.php';
        ob_end_flush();
        return ob_get_clean();
    }

    public function refresh()
    {
        return header('Refresh: 0');
    }

    public function goBack()
    {
        header("Location:". $_SERVER['HTTP_REFERER']);
    }

    public function goToUrl($url)
    {
        header("Location: $url");
    }
}
