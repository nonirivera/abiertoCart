<div class="table-responsive">
<table id="tableView" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <td>Full Name</td>
      <td>Mobile Number</td>
      <td>Landline Number</td>
      <td>Full Address</td>
      <td>Email Address</td>
      <td>Username</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($query as $row): ?>
    <tr>
      <td><?= $row->c_first_name . ' ' . $row->c_last_name; ?></td>
      <td><?= $row->c_mobile_num; ?></a></td>
      <td><?= $row->c_landline_num; ?></td>
      <td><?= $row->c_address1 . ' ' . $row->c_address2 . ',' .$row->c_city; ?></td>
      <td><?= $row->c_email_address; ?></td>
      <td><?= $row->c_username; ?></td>
      <td><a href="<?= base_url() . 'admin/customer/'.$row->c_id; ?>" class="btn btn-info">View More</a></td>
      <td>
        <?php if($su == 1): ?>
         <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row->c_id; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete</a>
      <?php endif; ?>
      </td>
    </tr>
<!-- Confirmation modal-->    
<div id="myModal<?php echo $row->c_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Customer</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this customer information? </p>
      </div>
      <div class="modal-footer">
          <a href="<?= base_url('admin/delete_customer').'/'.$row->c_id; ?>" class="btn btn-danger btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</a>
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>  No</button>
      </div>
    </div>
  </div>
</div>    
<?php endforeach; ?>
  </tbody>
</table>
</div>
<!-- Customer Modal -->
<div id="viewCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
