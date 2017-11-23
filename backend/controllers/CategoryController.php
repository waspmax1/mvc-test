<?php

namespace admin\controllers;

use admin\models\CategoryModel;
use controllers\Controller;

class CategoryController extends Controller
{

    public function view($id)
    {
        $categoryModel = new CategoryModel();
        $getCat = $categoryModel->getCategory($id);
        $pageInfo = ['title' => 'admin category list', 'description' => ''];
        return $this->render('backend', 'main/header', 'main/footer', 'category/edit', compact('getCat', 'pageInfo'));
    }

    public function index()
    {
        $categoryModel = new CategoryModel();
        $catList = $categoryModel->getCategoryList();
        $pageInfo = ['title' => 'admin category list', 'description' => ''];
        return $this->render('backend', 'main/header', 'main/footer', 'category/index', compact('catList', 'pageInfo'));
    }

    public function edit()
    {
        $categoryModel = new CategoryModel();
        if ($categoryModel->categoryUpdate()) {
            return $this->goBack();
        } else {
            echo 'wrong category update';
        }
    }

    public function create(){
        $categoryModel = new CategoryModel();
        if($categoryModel->categoryCreate()){
            return $this->goToUrl('/admin/category/view/' . $categoryModel->categoryId);
        }

        $pageInfo = ['title' => 'admin category create', 'description' => ''];
        return $this->render('backend', 'main/header', 'main/footer', 'category/create', compact( 'pageInfo'));
    }

}
