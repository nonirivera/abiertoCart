<!DOCTYPE html>
<html>
	<head>
		<title><?= isset($title) ? $title: "Welcome"; ?></title>
		<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/stylesheets/main.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/stylesheets/cosmo_bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/addons/font-awesome/css/font-awesome.min.css'; ?>">
		<script type="text/javascript" src="<?= base_url() . 'assets/scripts/jquery.js';?>"></script>
		<script type="text/javascript" src="<?= base_url() . 'assets/addons/bootstrap/js/bootstrap.min.js';?>"></script>
		<script type="text/javascript" src="<?= base_url() . 'assets/scripts/custom.js';?>"></script><!-- DATATABLES CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
        
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
	</head>
	<body>
<!--- navbar-->
<nav class="navbar navbar-default" id="publicNav">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        More <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url() . 'shop/';?>">Home</a></li>
        <li><a href="<?= base_url() . 'shop/about';?>">About</a></li>
        <li><a href="<?= base_url() . 'shop/contact';?>">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="You are not logged in!">
            	<i class="fa fa-user"></i>
            	 <?php if($this->session->userdata('is_logged_in')): ?>
            	 Welcome, <?= $this->session->userdata('username'); ?>
            	<?php else: ?>
            		Account
            	<?php endif; ?>
            	 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" id="headerDropDown">
            <?php if($this->session->userdata('is_logged_in')): ?>
                <li><a href="<?= base_url() . 'customers/account'; ?>"><i class="fa fa-user-secret" aria-hidden="true"></i> My Account</a></li>
                <li><a href="<?= base_url() . 'shop/logout'; ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>
            <?php else: ?>
            	<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                <li><a href="<?= base_url() . 'customers/register';?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Register for an account</a></li>
            <?php endif; ?>
            </ul>
        </li>
        <li><a href="mailto:nonesio.rivera@yahoo.com"><i class="fa fa-envelope" aria-hidden="true"></i> Reach us via Email</a></li>
      </ul>
    </div>
  </div>
</nav>
<!--- navbar end-->

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="<?= base_url() . 'assets/images/logo.png'; ?>" alt="abiertocart" id="clogo" class="img-responsive" />
			</div>
			<div class="col-md-5">
				<form action="<?= base_url().'shop/search'; ?>" method="post">
					<div class="form-group">
					  <div class="input-group">
					    <input type="text" class="form-control" name="search" placeholder="Product Name / Code / Description">
					    <span class="input-group-btn">
					      <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
					    </span>
					  </div>
					</div>
				</form>
			</div>
			<div class="col-md-1"></div>	
			<div class="col-md-3 pull-right">
				<ul class="nav nav-pills" role="tablist">
				  <li role="presentation" class="active">
				  <a href="<?= base_url() . 'cart/'; ?>">
				  	<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Your Cart <span class="badge"><?php echo number_format($this->cart->total(),2); ?></span>
				  </a>
				  </li>
				</ul>
			</div>
		</div>
	</div>

<!-- categories menu -->
<div class="container">
	<nav id="menu" class="navbar navbar-inverse">
		<div class="navbar-header"><span id="category" class="visible-xs"></span>
		<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">View Categories <i class="fa fa-bars"></i></button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
		<?php foreach($header_cat as $row): ?>
			<li><a href="<?= base_url() . 'shop/category/' . $row->category_id;?>"><?= $row->category_name; ?></a></li>
		<?php endforeach; ?>
		</ul>
		</div>
	</nav>
</div>
<!-- Login modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
	<div class="loginmodal-container">
		<div align="center">
			<img src="<?= base_url() . 'assets/images/logo.png'; ?>">
		</div>
		<div id="loginAlert"></div>
	  <form action="<?= base_url() . 'customers/validate_login';?>" method="post">
		<input type="text" name="username" id="username" placeholder="Username">
		<input type="password" name="password" id="password" placeholder="Password">
		<button class="btn btn-primary btn-md btn-block" id="loginBtn"><i class="fa fa-lock" aria-hidden="true"></i>Login</button>
	  </form>
		
	  <div class="login-help">
		No account yet? <a href="<?= base_url() . 'customers/register';?>">Register</a>
	  </div>
	</div>
</div>
</div>

<script type="text/javascript">
$('#loginBtn').click(function(){
	var form_data = {
		username: $('#username').val(),
		password: $('#password').val(),
	};

	$.ajax({
		url: "<?= base_url() . 'customers/validate_login';?>",
		type: 'POST',
		data: form_data,
		success: function(msg){
			if(msg == 'YES'){
				$('#loginAlert').html('<div class="alert alert-success text-center">You are now logged in. Redirecting..<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i><span class="sr-only">Loading...</span></div>');
        window.setTimeout(function(){
           window.location.reload(true);
        }, 3000);
			}
			else{
				$('#loginAlert').html('<div class="alert alert-danger text-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ' + msg + '</div>');
			}
		}
	});
	return false;
});
</script>

