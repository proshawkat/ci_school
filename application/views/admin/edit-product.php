<form class="form-horizontal" action="<?php echo base_url() . "product/update_product"; ?>" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="hid" class="form-control" id="" value="<?php echo $singleData['product_id']; ?>">

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Art No : </label>
        <div class="col-sm-8">
            <input type="text" name="model_num" class="form-control" id="" value="<?php echo $singleData['art_no']; ?>" placeholder="Model number">
            <span class="danger"><?php echo form_error('model_num'); ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Composition : </label>
        <div class="col-sm-8">
            <textarea class="ckeditor" id="editor1" name="composition" cols="100" rows="10"><?php echo $singleData['composition']; ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Quantity  : </label>
        <div class="col-sm-8">
            <input type="text" name="quantity" class="form-control" id="" value="<?php echo $singleData['quantity']; ?>" placeholder="quantity">
            <span class="danger"><?php echo form_error('quantity'); ?></span>
        </div>
    </div>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Your Product Image: </label>
        <div class="col-sm-8">
            <input type="file" name="picture" id="exampleInputFile">
        </div>
        <?php echo "<img src='" . base_url() . "assets/images/product/p_{$singleData['product_id']}.{$singleData['picture']}' style='margin-top: 15px;' width='150' height='100' />"; ?>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-default">Submit Data</button>
        </div>
    </div>
</form>
