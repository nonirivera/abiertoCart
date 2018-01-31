<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Welcome to <strong>abrietoCart Control Panel.</strong> Quick details are provided in the Dashboard to get you started.
</div>

<div class="row">
  <div class="col-md-3 col-sm-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div align="center"><h3 class="panel-title"><i class="fa fa-shopping-cart fa-5x aria-hidden="true"></i></h3></div>
      </div>
      <div class="panel-body">
        <p class="text-success pull-right">See all orders.  <a href="<?= base_url() . 'admin/orders/';?>"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></a></p>
      </div>
    </div> 
  </div>
  <div class="col-md-3 col-sm-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div align="center"><h3 class="panel-title"><i class="fa fa-shopping-cart fa-5x aria-hidden="true"></i></h3></div>
      </div>
      <div class="panel-body">
        <p class="text-primary pull-right">There are <?= $products; ?> products available.  <a href="<?= base_url() . 'admin/products'; ?>"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></a></p>
      </div>
    </div> 
  </div>
  <div class="col-md-3 col-sm-12">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <div align="center"><h3 class="panel-title"><i class="fa fa-users fa-5x" aria-hidden="true"></i></h3></div>
      </div>
      <div class="panel-body">
         <p class="text-danger pull-right">There are <?= $customers ?> registered users.  <a href="<?= base_url() . 'admin/customers'; ?>"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></a></p>
      </div>
    </div>      
  </div>
  <div class="col-md-3 col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div align="center"><h3 class="panel-title"><i class="fa fa-phone-square fa-5x" aria-hidden="true"></i></h3></div>
      </div>
      <div class="panel-body">
        <p class="text-default pull-right">See contact form messages  <a href="<?= base_url() .'admin/messages'; ?>"><i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i></a></p>
      </div>
    </div>      
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div class="well">
              <?php if($su!=1): ?>
                <p>Only users with <strong>Super Admin</strong> capabilities can add, modify or delete data. Contact the <a href="mailto:arevirinon@gmail.com">System Administrator</a> for more information. </p>
              <?php else: ?>
                <p>You are logged in as <strong>Super Admin</strong>. You can add, modify or delete data.
              <?php endif; ?>
          </div>
        </div>
      </div>
  </div>
</div>
