<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= isset($title) ? $title : "Welcome"; ?></title>
        <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/stylesheets/main.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/stylesheets/cosmo_bootstrap.min.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/addons/font-awesome/css/font-awesome.min.css'; ?>">
        <!-- dashboard stylesheet-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/stylesheets/dashboard.css'; ?>">
        <!-- DATATABLES CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
        <!--- LOAD SCRIPTS -->
        <script type="text/javascript" src="<?= base_url() . 'assets/addons/tinymce/js/tinymce/tinymce.min.js'; ?>"></script>
        <script type="text/javascript" src="<?= base_url() . 'assets/scripts/jquery.js';?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
        <script type="text/javascript" src="<?= base_url() . 'assets/addons/bootstrap/js/bootstrap.min.js';?>"></script>
        <script type="text/javascript" src="<?= base_url() . 'assets/scripts/custom.js';?>"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?= base_url() . 'assets/images/logo.png'; ?>"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a style="color: red;" href="<?= base_url () . 'admin/'; ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a></li>
            <li><a style="color: green;" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>
 Settings</a></li>
            <li><a style="color: blue;" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i>
 Help</a></li>
            <li><a style="color: orange;" href="<?= base_url() . 'shop/'; ?>" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i>
 Public Site</a></li>
            <li class="dropdown">
              <a style="color: violet;" href="#" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
 Account
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> My Profile</a></li>
                <li><a href="<?= base_url() . 'admin_login/logout'; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>