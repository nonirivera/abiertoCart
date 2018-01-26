<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="progress progress-striped active">
			  <div class="progress-bar" style="width: 66%"></div>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url() . 'billing/save_order'; ?>">
			<?php foreach($query as $row): ?>
			  <fieldset>
			    <legend>Billing and Shipping Information</legend>
			    <div class="form-group">
			      <label for="firstname" class="col-lg-2 control-label">First Name</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="firstname" placeholder="First Name" value="<?= $row->c_first_name; ?>" name="firstname">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="lastname" class="col-lg-2 control-label">Last Name</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="<?= $row->c_last_name; ?>" name="lastname">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="emailaddress" class="col-lg-2 control-label">Email Address</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="emailaddress" placeholder="Email Address" value="<?= $row->c_email_address; ?>" name="emailaddress">
			        <input type="hidden" name="username" value="<?= $row->c_username; ?>">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="mobilenum" class="col-lg-2 control-label">Mobile Number</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="mobilenum" placeholder="Mobile Number" value="<?= $row->c_mobile_num; ?>" name="mobilenum">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="landlinenum" class="col-lg-2 control-label">Landline Number</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" id="landlinenum" placeholder="Landline Number" value="<?= $row->c_landline_num; ?>" name="landlinenum">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="address" class="col-lg-2 control-label">Address</label>
			      <div class="col-lg-10">
			        <textarea class="form-control" rows="3" id="textArea" name="address"><?= $row->c_address1 . ' ' . $row->c_address2 . ' '  . $row->c_city . ' '; ?></textarea>
			        <span class="help-block">You may specify a different billing address by editing this field.</span>
			      </div>
			    </div>
			    <div class="form-group">
			      <label class="col-lg-2 control-label">Mode of Payment</label>
			      <div class="col-lg-10">
			        <div class="radio">
			          <label>
			            <input type="radio" name="modeofpayment" id="optionsRadios1" value="Pickup" checked="">
			            For Pickup
			          </label>
			        </div>
			        <div class="radio">
			          <label>
			            <input type="radio" name="modeofpayment" id="optionsRadios2" value="Cash on Delivery">
			            Cash on Delivery
			          </label>
			        </div>
			      </div>
			    </div>
			    <hr>
			  </fieldset>
			<?php endforeach; ?>
		</div>
		<div class="col-md-3">
			<div align="center">
				<input type="hidden" name="total_amount" value=<?php echo $grand_total; ?> />
				<button class="btn btn-primary btn-block btn-lg" type="submit" onclick="return confirm('Submit this order?')">
			  		Total Amount: <?php echo number_format($grand_total,2); ?><br>
			  		Place Order
			  	</button>
				<!-- <input type="submit" name="submit_order" value="Place Order" class="btn btn-primary btn-block btn-lg" onclick="return confirm('Submit this order?')"> -->
			</form>
			</div>
			 <p></p>
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Information</h3>
			  </div>
			  <div class="panel-body">
			    <p>Some random crap here.</p>
			    <p>Some random crap here.</p>
			    <p>Some random crap here.</p>
			    <p>Some random crap here.</p>
			    <p>Some random crap here.</p>
			  </div>
			</div>
		</div>
	</div>
</div>