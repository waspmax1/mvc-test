<?php
namespace controllers;

use models\DbModel;

class CategoryController extends Controller
{
	public function actionView($id)
	{
	    $myModel = new DbModel();
        $pageInfo = $myModel->getCategoryInfo($id);
        $categoryPosts = $myModel->getPosts($id);
		$this->render('frontend', 'main/header', 'main/footer','category/view', compact('categoryPosts', 'pageInfo'));
	}
}
