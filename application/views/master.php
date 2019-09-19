<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php if(isset($siteTitle)){echo $siteTitle;}?></title>
		
		 <link rel="icon" href="<?php echo base_url();?>assets/images/fav.png" type="image/gif" sizes="16x16"> 
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.main.css" />
		


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

 
       <script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
       <script src="<?php echo base_url();?>assets/js/script.js"></script>

    </head>
    <body>
        <div class="main-container">

            <div class="header_area">
                <div class="container-fluid">
					<div class="header navbar-fixed-top">
						<div class="row">
							<div class="col-md-12">
								<div class="logo">
									<img src="<?php echo base_url();?>assets/images/logo.png" alt="Logo" class="img-responsive" >
								</div>								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="qet">
									<h3>Request For Quotation</h3>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
<?php
           if(isset($content)){
            echo $content;
           }
           
           ?>
        </div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
		
               <!-- Start Zoom product -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/single_jq_style.css" media="all">
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/product-show.js"></script>
        <script type='text/javascript' src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
        <!-- End Zoom product -->

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jqzoom.js"></script>
        <script type="text/javascript">
            $("#bzoom").zoom({
                zoom_area_width: 300,
                autoplay_interval: 3000,
                small_thumbs: 4,
                autoplay: false
            });
        </script>
		
    </body>
</html>