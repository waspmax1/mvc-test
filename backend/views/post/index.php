<?php //debug($pages);?>
<div class="container">
    <div class="row">
        <table class="table table-hover">
           <thead>
           <tr>
               <th>Thumbnail</th>
               <th>Title</th>
               <th>Content</th>
               <th>Edit</th>
           </tr>
           </thead>
            <tbody>
                <?php for($i = 0; $i < count($pages); $i++):?>
            <tr>
                <td>
                    <?php if(file_exists($_SERVER['DOCUMENT_ROOT'].'/web/images/'.$pages[$i]['thumbnail'])): ?>
                        <img class="admin-thumb" src="<?='/web/images/'.$pages[$i]['thumbnail']; ?>" alt="<?=$pages[$i]['title']?>">
                    <?php else: ?>
                        <img class="admin-thumb" src="/web/images/no-image.png" alt="<?=$pages[$i]['title']?>">
                    <?php endif;?>
                </td>
                <td><?=$pages[$i]['title']?></td>
                <td><?=substr($pages[$i]['content'], 0, 150);?></td>
                <td><a href="<?='/admin/post/view/'.$pages[$i]['id']?>">Edit</a></td>
            <?php endfor;?>
            </tr>
            </tbody>
        </table>
    </div>
</div>