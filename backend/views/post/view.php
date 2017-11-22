<?php

 // debug($getCat);
?>

<div class="container">
    <div class="row">
        <h1><?=$getCat[0]['title']?> Edit</h1>
        <form action="/admin/post/update" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="postTitle">Title</label>
                <input name="postTitle" type="text" id="postTitle" placeholder="title" value="<?=$getCat[0]['title'];?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="postDescription">Description</label>
                <input name="postDescription" type="text" id="postDescription" placeholder="description" value="<?=$getCat[0]['description'];?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="postContent">Content</label>
                <textarea rows="15" cols="120" name="postContent" type="text" id="postcontent" placeholder="content"  class="form-control">
            <?=$getCat[0]['content'];?>
        </textarea>
            </div>

            <div class="form-group">
                <label for="postImage">Post image</label>
                <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/web/images/'.$getCat[0]['thumbnail'])): ?>
                    <img class="img-responsive" src="<?='/web/images/'.$getCat[0]['thumbnail']; ?>" alt="<?=$getCat[0]['title']?>">
                    <?php



                    ?>
                <?php else: ?>
                    <img class="img-responsive" src="/web/images/no-image.png" alt="<?=$getCat[0]['title']?>">
                <?php endif;?>
                <input name="postImage" type="file" id="postImage" class="form-control" value="<?=$getCat[0]['thumbnail'];?>">
            </div>
            <input name="post_id" type="hidden" value="<?=$getCat[0]['id'];?>">

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
