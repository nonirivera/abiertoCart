<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo isset($title) ? $title : "Welcome"; ?></title>

    <link href="<?= base_url() . 'assets/stylesheets/cosmo_bootstrap.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/addons/font-awesome/css/font-awesome.min.css'; ?>">    
    <script type="text/javascript" src="<?= base_url() . 'assets/scripts/jquery.js';?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/addons/bootstrap/js/bootstrap.min.js';?>"></script>
    <style type="text/css">
		body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f0f0f0;
		}

		.container{
			margin-top: 200px;
		}

		#contactForm{
			font-weight: bold;
		}
    </style>
  </head>

  <body>

<div class="container">
	<div class="col-md-4 col-md-offset-4">
	<div align="center"><img src="<?= base_url() . 'assets/images/logo.png'; ?>"></div>
	  <form class="form-horizontal" id="contactForm" action="<?= base_url() . 'admin_login/validate_login'; ?>" method="post">
	    <div id="the-message"></div>
	    <div class="form-group">
	      <label for="username" class="col-lg-2 control-label text-primary">Username</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="username" name="username" placeholder="Your Username">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="password" class="col-lg-2 control-label text-primary">Password</label>
	      <div class="col-lg-10">
	        <input type="password" class="form-control" id="password" name="password" placeholder="*********">
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="submit" class="btn btn-primary" id="contactBtn"><i class="fa fa-lock" aria-hidden="true"></i> Login</button>
	      </div>
	    </div>
	  </form>
	</div>
</div> <!-- /container -->

<script type="text/javascript">
$('#contactBtn').click(function(e) {

	var formData = $('#contactForm').serialize();

	$.ajax({
		url: "<?= base_url() . 'admin_login/validate_login'; ?>",
		type: 'post',
		data: formData,
		success: function(msg) {
			if (msg == 'YES') {
				$('#the-message').html('<div class="alert alert-success text-center">You are logged in. Redirecting...<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>');
        window.setTimeout(function(){
          window.location.href = "<?php echo site_url('admin/'); ?>";
        }, 3000);
			}
			else if(msg == 'NO'){
				$('#the-message').html('<div class="alert alert-danger">Incorrect Username / Password</div>');
			}
			else {
				$('#the-message').html('<div class="alert alert-danger">' + msg + '</div>');
			}
		}
	});
	return false;
});
</script>

  </body>
</html>
