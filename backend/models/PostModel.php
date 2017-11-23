<?php

namespace admin\models;

use PDO;

class PostModel extends AdminDbModel
{

    public $updateResult;
    public function __construct()
    {
        parent::__construct();
    }

    public function getPages()
    {
        $sth = $this->dbh->prepare('SELECT id, category_id, title, description, content, thumbnail FROM posts');
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == null) {
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function getPost($id)
    {
        $sth = $this->dbh->prepare('SELECT id, category_id, title, description, content, thumbnail FROM posts WHERE  id = ?');
        $sth->execute([$id]);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == null) {
            $result = ['title' => 'empty title', 'description' => 'empty description'];
        }
        return $result;
    }

    public function postUpdate($postTitle, $postDescription, $postContent, $postImage, $postId)
    {
        $this->updateResult;
        if(!empty($_FILES['postImage']['tmp_name'])){
            copy($_FILES['postImage']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/web/images/'.$_FILES['postImage']['name']);
        }
        $sth = $this->dbh->prepare('UPDATE posts SET title = ?, description = ?, content = ?, thumbnail = ? WHERE id = ?');
        if($sth->execute([$postTitle, $postDescription, $postContent, $postImage, $postId])){
            $this->updateResult = true;
        }else{
            $this->updateResult = false;
        }
        return $this->updateResult;
    }

}
