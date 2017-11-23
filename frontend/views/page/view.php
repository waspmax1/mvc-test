<?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/web/images/'.$postContent['thumbnail'])): ?>
<header class="intro-header" style="background-image: url('<?='/web/images/'.$postContent['thumbnail']; ?>'); ">
<?php else: ?>
    <header class="intro-header" style="background-image: url('/web/images/no-image.png'); ">
<?php endif;?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1><?=$postContent['title']?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?=$postContent['content']?>
            </div>
        </div>
    </div>
</article>