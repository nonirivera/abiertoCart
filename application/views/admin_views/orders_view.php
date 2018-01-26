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
	      <td>ORD-N-<?= $row->serialnum; ?></td>
	      <td><?= $row->date; ?></a></td>
	      <td><?= $row->total_amount; ?></td>
	      <td><?= $row->mode_of_payment; ?></td>
	      <td><?= $row->status; ?></td>
	      <td><a href="<?= base_url() . 'admin/order/' . $row->serialnum;?>" class="btn btn-default btn-lg">View Details</a></td>
	    </tr>
<?php endforeach; ?>
  </tbody>
</table>
</div>
