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
      <td><a href="#" class="btn btn-info btn-lg">View More</a></td>
      <td><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#viewCustomer">Open Modal</button></td>
    </tr>
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
