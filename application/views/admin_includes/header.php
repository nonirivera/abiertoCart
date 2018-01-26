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
            <li><a href="<?= base_url () . 'admin/'; ?>">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="<?= base_url() . 'shop/'; ?>" target="_blank">Public Site</a></li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown">Account
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">My Profile</a></li>
                <li><a href="<?= base_url() . 'admin_login/logout'; ?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>