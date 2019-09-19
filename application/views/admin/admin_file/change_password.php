<div class="change_pass">
	<div class="change_pass_area">
		<div class="form_hadder">
			<h4>Change Password</h4>
		</div>
		<div class="form_area">
                        <?php 
                            $msg = $this->session->flashdata("pmsg");
                            if($msg != NULL){
                                echo "<h4 style='text-align: center; color: red;'>". $msg ."</h4>";
                            }
                        ?>
			<form class="form-horizontal" action="<?php echo base_url() . "parent_controller/check_password"; ?>" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-5 control-label">Current Password : </label>
					<div class="col-sm-7">
						<input type="password" name="current_pass" class="form-control" id="" value="<?php echo set_value('cat_name'); ?>">
						<span class="danger"><?php echo form_error('current_pass'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-5 control-label">New Password : </label>
					<div class="col-sm-7">
						<input type="password" name="new_pass" class="form-control" id="" value="<?php echo set_value('cat_name'); ?>" >
						<span class="danger"><?php echo form_error('new_pass'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-5 control-label">Retype New Password : </label>
					<div class="col-sm-7">
						<input type="password" name="rnew_pass" class="form-control" id="" value="<?php echo set_value('cat_name'); ?>" >
						<span class="danger"><?php echo form_error('rnew_pass'); ?></span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-5">
						&nbsp;
					</div>
					<div class="col-sm-7">
						<button type="submit" class="btn btn-default">Submit Data</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</div>

