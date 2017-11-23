<?php

namespace controllers;

use models\DbModel;

class PageController extends Controller
{

    public function actionView($id)
    {
        $myModel = new DbModel();
        $pageInfo = $myModel->getPageInfo($id);
        $postContent = $myModel->getPost($id);
        $this->render('frontend', 'main/header', 'main/footer','page/view', compact('pageInfo', 'postContent'));
    }
}
