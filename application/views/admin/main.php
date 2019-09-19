<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Admin</title>
		<link rel="icon" href="<?php echo base_url();?>assets/images/fav.png" type="image/gif" sizes="16x16"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_style.css" />	
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.main.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.main.css" />
        
        <!-- Start font -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css.map" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/FontAwesome.otf" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome-webfont.eot" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome-webfont.svg" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome-webfont.ttf" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome-webfont.woff" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome-webfont.woff2" />
        <!-- End font -->
        
         <!-- Start Ckeditor -->
        <script src="<?php echo base_url() ?>assets/js/ckeditor/ckeditor.js"></script>

         <!-- End Ckeditor -->
    </head>
    <body>
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="left_header floatleft">
                            <img src="<?php echo base_url() ?>img/admin_logo.png" alt="" />
                        </div>
                        <div class="header_menu floatleft">
                            <nav>
                                <ul>
                                    <li><a  href="<?php echo base_url() . "customer/customer_messeges"; ?>">Customer message</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_header floatright">
                            <nav>
                                <ul>
                                    <li class="has-children">
                                        <?php
                           $name = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('myid')))->row_array();
                           $n = explode(' ', $name['name']);
                           for ($i = 0; $i < count($n); $i++) {
                               if (strlen($n[$i]) > 3) {
                                   echo $n[$i];
                                   break;
                               }
                           }
                                        ?>
                                        <span></span>
                                        <ul>
                                            <?php if ($this->session->userdata('mytype') == "sa") { ?>
                                                <li><a href="">Create user</a></li>
                                                 <li><a href="<?php echo base_url() . "parent_controller/change_password"; ?>">Change Password</a></li>
                                            <?php } ?>
                                            <li><a href="<?php echo base_url() . "admin/logout"; ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="sidbar">
                        <?php
                        $msg = $this->session->flashdata('msg');
                        if ($msg != NULL) {
                            echo "<p  class=\"bg-success zindex\">{$msg}</p>";
                            $this->session->unset_userdata("msg");
                        }
                        $emsg = $this->session->flashdata("emsg");
                        if ($emsg != NULL) {
                            echo "<p class=\"bg-success\">{$emsg}</p>";
                            $this->session->unset_userdata("emsg");
                        }
                        ?>
                    </div>   
                </div>
            </div>
        </div>


        <div class="conteinner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="left_conteinner">
                            <nav>
                                <ul>
                                    <li class="statist"><a href="" class="icon_d"><i class="fa fa-tachometer" aria-hidden="true"></i>
Dashboard</a></li>
                                    <li class="has-children">
                                        <a class="list-group-item icon_i" href="<?php echo base_url()."product/add_category" ?>">
                                            <i class="fa fa-tags" aria-hidden="true"></i>Category 
                                        </a>
                                    </li>
                                    <li class="has-children">
                                        <a class="list-group-item icon_i" href="<?php echo base_url()."product/view_category" ?>">
                                            <i class="fa fa-child " aria-hidden="true"></i>
View category 
                                        </a>
                                    </li>
                                    <li class="has-children">
                                        <a class="list-group-item icon_i" href="<?php echo base_url()."product/add_product" ?>">
                                            <i class="fa fa-product-hunt" aria-hidden="true"></i>
Add Product
                                        </a>
                                    </li>
                                    <li class="has-children">
                                        <a class="list-group-item icon_i" href="<?php echo base_url()."product/view_product" ?>">
                                            <i class="fa fa-product-hunt" aria-hidden="true"></i>
View Product
                                        </a>
                                    </li>
									
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <?php
                        if (isset($content)) {
                            echo $content;
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>