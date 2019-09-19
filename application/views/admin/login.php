<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php if (isset($siteTitle)) {
    echo $siteTitle;
} ?></title>

        <!--Pulling Awesome Font -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.main.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>css/responsive.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-5 col-md-6">
                    <form action="<?php echo base_url()."admin/check"?>" method="post">
                        <div class="form-login">
                            <?php
                                if($this->session->flashdata("msg")!=""){
                                    echo '<h4>'.$this->session->flashdata("msg").'</h4>' ;
                                }else{
                                     echo '<h4>Welcome back.</h4>' ;
                                }
                            ?>
                            
                            <input type="text" name="email" id="userName" class="form-control input-sm chat-input" placeholder="Email" />
                            <br/>
                            <input type="password" name="pass" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                            <br/>
                            <div class="wrapper">
                                <span class="group-btn">     
                                    <input type="submit" class="btn btn-primary btn-md" value="Login" />
                                </span>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>
</html>