<?php
foreach($query as $row):
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?=$row->c_last_name . ', ' . $row->c_first_name . ' ' .$row->c_last_name; ?></h3>
  </div>
  <div class="panel-body">
	<div class="col-md-6">
		<div class="well">
			<h4>Contact Information</h4>
			<hr>
			<h5>Username:</h5>
			<p><?=$row->c_username; ?></p>
			<h5>Email Address:</h5>
			<p><?=$row->c_email_address; ?></p>
			<h5>Mobile Number:</h5>
			<p><?=$row->c_mobile_num; ?></p>
			<h5>Landline Number:</h5>
			<p><?=$row->c_landline_num; ?></p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="well">
			<h4>Shipping/Billing Information</h4>
			<hr>
			<h5>Address:</h5>
			<p><?=$row->c_address1 . ' ' . $row->c_address2; ?></p>
			<h5>City &amp; Postal:</h5>
			<p><?=$row->c_city . ' ' .$row->c_postal_code; ?></p>
			<hr>
		</div>
	</div>
  </div>
</div>
<?php
endforeach;
?>