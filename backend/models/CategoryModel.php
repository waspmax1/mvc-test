<?php

namespace admin\models;

use PDO;

class CategoryModel extends AdminDbModel
{
    public $updateResult;
    public $createResult;
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategory($id)
    {
        $sth = $this->dbh->prepare('SELECT title, description, category_id FROM categories WHERE category_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($id == null){
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function getCategoryList()
    {
        $sth = $this->dbh->prepare('SELECT title, description, category_id FROM categories');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result == null){
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function categoryUpdate()
    {
        $this->updateResult;
        if(isset($_POST['title']) && isset($_POST['description'])){
            $categoryTitle = $_POST['title'];
            $categoryDescription = $_POST['description'];
            $categoryId = $_POST['category_id'];
        }
        $sth = $this->dbh->prepare('UPDATE categories SET title = ?, description = ? WHERE category_id = ?');
        if($sth->execute([$categoryTitle, $categoryDescription, $categoryId])){
            $this->updateResult = true;
        }else{
            $this->updateResult = false;
        }
        return $this->updateResult;
    }

    public function categoryCreate()
    {
     $this->createResult;
     if(isset($_POST['categoryId']) && isset($_POST['categoryTitle']) && isset($_POST['categoryDescription'])){
        $categoryId = urlencode($_POST['categoryId']);
        $catTitle = $_POST['categoryTitle'];
        $catDescription = $_POST['categoryDescription'];
         $sth = $this->dbh->prepare('INSERT INTO categories(category_id, title, description) VALUES(?, ?, ?)');
         if($sth->execute([$categoryId, $catTitle, $catDescription])){
             $this->createResult = true;
             $this->categoryId = $categoryId;
         }else{
             $this->createResult = false;
         }
     }

    return $this->createResult;
    }
}