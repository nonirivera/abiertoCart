<div class="well">
  <?php if($su == 1): ?>
  <a href="<?= base_url() . 'admin/add_product';?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Product</a>
  <?php else: ?>
  <p class="text-warning">Can't Add Product</p>
  <?php endif; ?>
  <a href="#" onclick='location.reload(true); return false;' class="btn btn-sm btn-default"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh List</a>
</div>
<div class="table-responsive">
<table id="tableView" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <td>Order Number</td>
      <td>Date</td>
      <td>Total Amount</td>
      <td>Mode of Payment</td>
      <td>Status</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($query as $row): ?>
<?php if($row->status == 'Open'): ?>
    	<tr>
<?php elseif($row->status == 'Shipped'): ?>
		<tr class="info">
	<?php else: ?>
		<tr class="success">
<?php endif; ?>
	      <td><?= date('Y', strtotime($row->date)) . $row->serialnum; ?></td>
	      <td><?= $row->date; ?></a></td>
	      <td><?= $row->total_amount; ?></td>
	      <td><?= $row->mode_of_payment; ?></td>
	      <td><?= $row->status; ?></td>
	      <td>
        <?php if($row->status == 'Completed'): ?>
        <a href="<?= base_url() . 'admin/order/' . $row->serialnum;?>" class="btn btn-primary btn-sm" target="_blank">Receipt</a>
        <?php else: ?>
        <a href="<?= base_url() . 'admin/order/' . $row->serialnum;?>" class="btn btn-default btn-sm">View Details</a>
        <?php endif; ?> 
        </td>
	    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
