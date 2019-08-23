<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel Admin <?php echo $this->Mcrud->get_web('nama_web'); ?></title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <base href="<?php echo base_url();?>"/>
    <link rel="icon" type="image/ico" href="images/<?php echo $web->favicon; ?>"/>
		<link rel="stylesheet" href="assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="assets/admin/css/matrix-login.css" />
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">
          <?php
          echo $this->session->flashdata('msg_login');
          ?>
          <form id="loginform" class="form-vertical" action="" method="post">
				        <div class="control-group normal_text"> <h3><img src="images/<?php echo $web->logo; ?>" alt="Logo" width="100"/></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Username" required autofocus/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" name="btnlogin" class="btn btn-success" /> Login</button></span>
                </div>
            </form>

            <form id="recoverform" action="lp" class="form-vertical" method="post">
				           <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" name="email" placeholder="E-mail address" required/>
                        </div>
                    </div>

                <div class="form-actions">
                    <span class="pull-left"><a class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button type="submit" name="kirim" class="btn btn-info"/>Reecover</button></span>
                </div>
            </form>
        </div>

        <script src="assets/admin/js/jquery.min.js"></script>
        <script src="assets/admin/js/matrix.login.js"></script>
        <script src="assets/admin/js/bootstrap.min.js"></script>

    </body>

</html>
