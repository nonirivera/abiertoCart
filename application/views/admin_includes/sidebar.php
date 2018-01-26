    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id="sidebarz">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Shop Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'admin/customers'; ?>"><i class="fa fa-users" aria-hidden="true"></i>
 Customers</a></li>
            <li><a href="<?= base_url() . 'admin/categories'; ?>"><i class="fa fa-bars" aria-hidden="true"></i>
 Categories</a></li>
            <li><a href="<?= base_url() . 'admin/products'; ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
 Products</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Site Interaction <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'admin/orders'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i>
 Orders</a></li>
            <li><a href="<?= base_url() . 'admin/messages'; ?>"><i class="fa fa-envelope" aria-hidden="true"></i>
 Messages</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Settings <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'settings/about'; ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i>
 About Page</a></li>
            <li><a href="<?= base_url() . 'settings/policy'; ?>"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>
 Privacy Policy</a></li>
            <li><a href="<?= base_url() . 'settings/help_info'; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
 Registration Panel (Help)</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#"> <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'settings/about'; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generate Report</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo (isset($header)) ? $header : ""; ?></h1>


