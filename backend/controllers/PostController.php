<?php
/**
 * Created by PhpStorm.
 * User: wasmax1
 * Date: 18.11.2017
 * Time: 20:11
 */

namespace admin\controllers;

use admin\models\PostModel;
use controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $pageModel = new PostModel();
        $pages = $pageModel->getPages();
        $pageInfo = ['title' => 'admin posts list', 'description' => ''];
        return $this->render('backend', 'main/header', 'main/footer', 'post/index', compact('pages', 'pageInfo'));
    }

    public function view($id)
    {
        $postModel = new PostModel();
        $getCat = $postModel->getPost($id);
        $pageInfo = ['title' => 'admin post page', 'description' => ''];
        return $this->render('backend', 'main/header', 'main/footer', 'post/view', compact('getCat', 'pageInfo'));
    }

    public function update()
    {
        $postTitle = $_POST['postTitle'];
        $postDescription = $_POST['postDescription'];
        $postContent = $_POST['postContent'];
        if(!empty($_FILES['postImage']['name'])){
            $postImage = $_FILES['postImage']['name'];
        }else{
            $postImage = 'no-image.png';
        }
        $postId = $_POST['post_id'];

        $postModel = new PostModel();
        if($postModel->postUpdate($postTitle, $postDescription, $postContent, $postImage, $postId)){
            return $this->goBack();
        } else {
            echo 'wrong post update';
        }
    }
}