<form class="form-horizontal" action="<?php echo base_url() . "product/insert_cat"; ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Category Name : </label>
        <div class="col-sm-8">
            <input type="text" name="cat_name" class="form-control" id="" value="<?php echo set_value('cat_name'); ?>" placeholder="category name">
            <span class="danger"><?php echo form_error('cat_name'); ?></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-default">Submit Data</button>
        </div>
    </div>
</form>