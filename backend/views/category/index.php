<div class="container">
    <div class="row">
        <h1>Categories list</h1>
        <a class="btn btn-primary btn-xs" href="/admin/category/create">Create category</a>
        <table class="table table-hover">
           <thead>
           <tr>
               <th>Title</th>
               <th>Description</th>
               <th>Edit</th>
           </tr>
           </thead>
            <tbody>
                <?php for($i = 0; $i < count($catList); $i++):?>
                <tr>
                    <td><?=$catList[$i]['title']?></td>
                    <td><?=$catList[$i]['description']?></td>
                    <td><a href="<?='/admin/category/view/'.$catList[$i]['category_id']?>">Edit</a></td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    </div>
</div>