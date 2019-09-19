
<form class="form-horizontal" action="<?php echo base_url() . "product/insert_product"; ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Art No : </label>
        <div class="col-sm-8">
            <input type="text" name="model_num" class="form-control" id="" value="<?php echo set_value('model_num'); ?>" placeholder="Model number">
            <span class="danger"><?php echo form_error('model_num'); ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Composition : </label>
        <div class="col-sm-8">
            <textarea class="ckeditor" id="editor1" name="composition" cols="100" rows="10"></textarea>
            <span class="danger"><?php echo form_error('composition'); ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Quantity  : </label>
        <div class="col-sm-8">
            <input type="text" name="quantity" class="form-control" id="" value="<?php echo set_value('quantity'); ?>" placeholder="quantity">
            <span class="danger"><?php echo form_error('quantity'); ?></span>
        </div>
    </div>

    <!--<div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Category  : </label>
        <div class="col-sm-8">
            <select class="form-control" name="cat_id" id="">
                <option value="">Select Category</option>
                <?php
               // $options = $this->db->get("category")->result();
               // foreach ($options as $vc):
                    ?>
                    <option value="<?php //echo $vc->category_id; ?>"><?php //echo $vc->category_name; ?></option>
                <?php //endforeach; ?>
            </select>
            <span class="danger"><?php //echo form_error('cat_id'); ?></span>
        </div>
    </div>-->


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Your Product Image: </label>
        <div class="col-sm-8">
            <input type="file" name="picture" id="exampleInputFile">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-default">Submit Data</button>
        </div>
    </div>
</form>