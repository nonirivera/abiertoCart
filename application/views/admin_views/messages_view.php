<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Heads up!</h4>
  <p>Orange-colored rows contain the unread messages.</p>
</div>
<div class="table-responsive">
<table id="tableView" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <td>From</td>
      <td>Email Address</td>
      <td>Message</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($query as $row): ?>
  <?php if($row->has_read == 0): ?>
    <tr class="warning">
  <?php else: ?>
    <tr>
  <?php endif; ?>
      <td>
        <?= $row->cm_name; ?>
      </td>
      <td>
        <a href="mailto:<?=$row->cm_email_address; ?>"><?= $row->cm_email_address; ?></a>
      </td>
      <td>
        <?= $row->cm_message; ?>
      </td>
      <td>
        <a href="<?= base_url() . 'admin/view_message/' . $row->cm_id; ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View Message</a>
        <?php if($su == 1): ?>
         <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row->cm_id; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete</a>
      <?php endif; ?>
      </td>
    </tr>
    <!-- Confirmation modal-->
<div id="myModal<?php echo $row->cm_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Message</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this message? </p>
      </div>
      <div class="modal-footer">
          <a href="<?= base_url('admin/delete_message').'/'.$row->cm_id; ?>" class="btn btn-danger btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</a>
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>  No</button>
      </div>
    </div>

  </div>
</div>

<?php endforeach; ?>
  </tbody>
</table>
</div>
<a href="#" onclick='location.reload(true); return false;' class="btn btn-lg btn-default"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh List</a>
