<div class="container">
    <div class="row">
        <form action="/admin/category/create" method="post">
            <div class="form-group">
                <label for="categoryId">Category id</label>
                <input required="required" type="text" class="form-control" id="categoryId" name="categoryId" placeholder="Category id">
            </div>
            <div class="form-group">
                <label for="categoryTitle">Category name</label>
                <input required="required" type="text" class="form-control" id="categoryTitle" name="categoryTitle" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="categoryDescription">Category description</label>
                <input required="required" type="text" class="form-control" id="categoryDescription" name="categoryDescription" placeholder="Description">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>