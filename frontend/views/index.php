<div class="container">
    <div class="row">
        <h1>Index page</h1>
    </div>
    <div class="row">
        <?php
        $count = 0;
        foreach($posts as $post): ?>
        <div class="index-post col-sm-4">
            <h2><?=$post['title'];?></h2>
            <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/web/images/'.$post['thumbnail'])): ?>
                <img class="img-responsive post-thumb" src="<?='/web/images/'.$post['thumbnail']; ?>" alt="<?=$post['title']?>">
            <?php else: ?>
                <img class="img-responsive post-thumb" src="/web/images/no-image.png" alt="<?=$post['title']?>">
            <?php endif;?>
            <p><?=substr($post['content'], 0, 100) . '...';?></p>
            <a href="<?='page/'.$post['id'];?>">Read more</a>
        </div>
        <?php
        $count++;
        if($count % 3 === 0){
            echo '</div><div class="row">';
        }
        endforeach; ?>
    </div>
</div>