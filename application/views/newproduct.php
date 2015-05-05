<?php
/**
 * Created by PhpStorm.
 * User: pl
 * Date: 5/4/15
 * Time: 17:48
 */
include('navigation.php');
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea rows="5" class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <select id="categories" class="form-control">
                    <?php /*$categories = $this->db->query("SELECT name FROM categories")->results_array();
                    foreach($categories as $category){
                        echo $category;
                    }
                    */?>
                </select>
            </div>
            <div class="form-group">
                <label for="addcategory">Or add new category:</label>
                <input type="text" id="addcategory" class="form-control" name="addcategory">
            </div>
            <div class="form-group">
                <label for="uploadimage">Upload Images</label>
                <input type="file" id="uploadimage" name="upload">
            </div>
            <button type="submit" class="btn btn-primary">New Product</button>
            <button type="reset" class="btn btn-default pull-right">Cancel</button>
        </form>
    </div>
</div>