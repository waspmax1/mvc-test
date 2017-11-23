<?php

namespace models;

use controllers\SiteController;
use PDO;

class DbModel
{

    protected $dbh;
    public function __construct()
    {
        $user = 'root';
        $pass = '';
        $this->dbh = new PDO('mysql:host=localhost;dbname=mvc_test', $user, $pass, array(
            PDO::ATTR_PERSISTENT => true
        ));
        $this->dbh->query("SET wait_timeout=9999;");
    }

    public function getCategoryInfo($id = null)
    {
        $sth = $this->dbh->prepare('SELECT title, description FROM categories WHERE category_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($id == null){
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function getPageInfo($id)
    {
        $sth = $this->dbh->prepare('SELECT title, description FROM posts WHERE id = ?');
        $sth->execute([$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($id == null){
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function getPosts($id)
    {
        $sth = $this->dbh->prepare('SELECT id, category_id, content, title, thumbnail FROM posts WHERE category_id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result == false){
            SiteController::actionError();
            exit();
        }
        return $result;
    }

    public function getPost($id)
    {
        $sth = $this->dbh->prepare('SELECT id, category_id, content, title, thumbnail FROM posts WHERE id = ?');
        $sth->execute([$id]);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result == false){
            SiteController::actionError();
            exit();
        }
        return $result;
    }

    public function getAllPosts()
    {
        $sth = $this->dbh->prepare('SELECT id, category_id, content, title, thumbnail FROM posts');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if($result == false){
            SiteController::actionError();
            exit();
        }
        return $result;
    }

}
