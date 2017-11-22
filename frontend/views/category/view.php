<div class="container">
    <div class="row">
        <h1>Category name - <?=$pageInfo['title']?></h1>
        <?php foreach ($categoryPosts as $categoryPost): ?>
            <?php // debug($categoryPost); ?>
            <div class="col-sm-12 post_block">
               <h2><?=$categoryPost['title']?></h2>
                <div class="col-sm-6">
                    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/web/images/'.$categoryPost['thumbnail'])): ?>
                        <img class="img-responsive" src="<?='/web/images/'.$categoryPost['thumbnail']; ?>" alt="<?=$categoryPost['title']?>">
                    <?php else: ?>
                        <img class="img-responsive" src="/web/images/no-image.png" alt="<?=$categoryPost['title']?>">
                    <?php endif;?>
                </div>
                <div class="col-sm-6">
                    <p><?=$categoryPost['content']?></p>
                    <a class="read-more" href="<?='/page/'.$categoryPost['id']?>">Read more</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>