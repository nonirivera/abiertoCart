    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Shop Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'admin/customers'; ?>">Customers</a></li>
            <li><a href="<?= base_url() . 'admin/categories'; ?>">Categories</a></li>
            <li><a href="<?= base_url() . 'admin/products'; ?>">Products</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Site Interaction <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'admin/orders'; ?>">Orders</a></li>
            <li><a href="<?= base_url() . 'admin/messages'; ?>">Messages</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Settings <span class="sr-only">(current)</span></a></li>
            <li><a href="<?= base_url() . 'settings/about'; ?>">About Page</a></li>
            <li><a href="<?= base_url() . 'settings/policy'; ?>">Privacy Policy</a></li>
            <li><a href="<?= base_url() . 'settings/help_info'; ?>">Registration Panel (Help)</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo (isset($header)) ? $header : ""; ?></h1>


