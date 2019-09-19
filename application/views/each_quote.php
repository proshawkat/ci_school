<div class="main-section">
	<div class="wrapper" id="cont">
		<?php foreach ($product as $vp): ?>
		<div class="container">
			<div class="quatation-img-area">
				<div class="row">
					<div class="col-md-12">
					
						<div class="col-md-4">
							<div class="quatation">
								<div class="bzoom_wrap">
									<ul id="bzoom">
										<li>
											<?php echo "<img src='" . base_url() . "assets/images/product/p_{$vp->product_id}.{$vp->picture}' class='bzoom_thumb_image' />"; ?>
											<?php echo "<img src='" . base_url() . "assets/images/product/p_{$vp->product_id}.{$vp->picture}' class='bzoom_big_image' />"; ?>
										</li>

									</ul>
								</div>
							</div>
						</div>
						
						<div class="col-md-8">
							<div class="lace-description">
								<div class="single-description">
									<h3 class="code-k"><kbd>Code :</kbd> <?php echo $vp->art_no; ?></h3>
									<div class="des-p">
										<kbd>Composition :</kbd> <?php echo $vp->composition; ?>
									</div>
									<div class="quntity-s">
										<ul class="list-inline">
											<li><h3><kbd>Quantity :</kbd> <?php echo $vp->quantity; ?></h3></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<?php if($first['product_id']!=$vp->product_id){?>
						<div id="left_button" onclick="createUrl('<?php echo base_url();?><?php echo $prev_r;?>')">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<?php } ?>
					</div>
					<!--<div class="col-md-8">sdfsadf</div>-->
					<div class="col-md-6">
						<?php if($last['product_id']!=$vp->product_id){?>
						<div id="right_button" onclick="createUrl('<?php echo base_url();?><?php echo $next_r;?>')">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
    <!-- Start form -->

    <div class="form_area">
        <div class="container">
            <div class="quatation-form">
                <div class="row">
                    <div class="col-md-12">
                        
                        <?php
                        $msg = $this->session->flashdata('msg');
                        if ($msg != NULL) {
                            ?>
                            
						<div class="alert alert-info alert-dismissible fade in msg" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							  <?php echo $msg; ?>
						</div>
                            <?php
                        }
                        $emsg = $this->session->flashdata("emsg");
                        if ($emsg != NULL) {
                            echo "<p class=\"bg-success\">{$emsg}</p>";
                            $this->session->unset_userdata("emsg");
                        }
                        ?>
                        <div class="col-md-2">
                            &nbsp;
                        </div>
                        <div class="col-md-10">
                            <form class="form-horizontal" action="<?php echo base_url() . "welcome/insert"; ?>" method="post" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label for="inputPassword3" name="price" class="col-sm-3 control-label" value="<?php echo set_value('price'); ?>">Price : </label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input name="price" type="text" class="form-control" id="exampleInputAmount" value="<?php echo set_value('model_num'); ?>" placeholder="Amount">
                                            <div  class="input-group-addon">/ Per Yards</div>

                                        </div>
                                        <span class="danger"><?php echo form_error('price'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Weight : <br/><small>Per Kilogram</small></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" name="weight" class="form-control" id="exampleInputAmount" >
                                            <div  class="input-group-addon">/ Yards</div>
                                        </div>
                                        <span class="danger"><?php echo form_error('weight'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Art No : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="model_num" class="form-control" id="" value="<?php echo set_value('model_num'); ?>" placeholder="Model number">
                                        <span class="danger"><?php echo form_error('model_num'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Email : </label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" id="inputEmail3" placeholder="email">
                                        <span class="danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Phone : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" id="" placeholder="phone">
                                        <span class="danger"> <?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Contact Name : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="p_name" class="form-control" id="" value="<?php echo set_value('p_name'); ?>" placeholder="person name">
                                        <span class="danger"><?php echo form_error('p_name'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-3 control-label">Company Name : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="c_name" class="form-control" id="" value="<?php echo set_value('c_name'); ?>" placeholder="Company name">
                                        <span class="danger"><?php echo form_error('c_name'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Company Website : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="website" value="<?php echo set_value('website'); ?>" class="form-control" id="" placeholder="Website Link">
                                        <span class="danger"><?php echo form_error('website'); ?></span>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Your Product Image: </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="picture" id="exampleInputFile" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <button type="submit" class="btn btn-default">Submit Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End form -->

    <div class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer">
                        <p>&copy; All rights reserved 2016. Developed By: <a target="_blank" href="https://www.facebook.com/shawkat.osman.73">Md. Shawkat Ali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>