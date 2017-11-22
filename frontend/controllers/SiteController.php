<?php

namespace controllers;

use models\DbModel;

class SiteController extends Controller
{
	public function actionIndex()
	{
        $myModel = new DbModel();
        $pageInfo = $myModel->getCategoryInfo();
        $posts = $myModel->getAllPosts();
        $this->render('frontend','main/header', 'main/footer','index', compact('pageInfo', 'posts'));
	}

    public static function actionError()
    {
        header("HTTP/1.0 404 Not Found");
        $pageInfo = ['title' => '404 title', 'description' => '404 description'];
        return self::render('frontend', 'main/header', 'main/footer', '404', compact('pageInfo'));
    }
}