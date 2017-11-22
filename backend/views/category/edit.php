<?php

// debug($getCat);

?>
<div class="container">
    <div class="row">
        <h1><?=$getCat['title'];?> Edit</h1>
        <form action="/admin/category/edit" method="post">
            <div class="form-group">
                <label for="categoryTitle">Title</label>
                <input class="form-control" type="text" name="title" placeholder="title" id="categoryTitle" value="<?=$getCat['title'];?>">
            </div>
            <div class="form-group">
                <label for="categoryDescription">Description</label>
                <input class="form-control" type="text" name="description" id="categoryDescription" placeholder="description" value="<?=$getCat['description'];?>">
            </div>
            <input name="category_id" type="hidden" value="<?=$getCat['category_id'];?>">
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
</div>