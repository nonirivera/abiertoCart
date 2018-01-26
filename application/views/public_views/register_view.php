<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-success">
				<div class="panel-heading">
					<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Register for an Account
				</div>
				<div class="panel-body">
				<div id="the-message"></div>

				<?php echo form_open("customers/save", array("id" => "form-user", "class" => "form-horizontal")) ?>
					<h3 class="text-primary">Personal Details</h3>
					<hr>
					<div class="form-group">
						<label for="firstname" class="col-md-3 col-sm-4 control-label">First Name <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="firstname" id="firstname" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="lastname" class="col-md-3 col-sm-4 control-label">Last Name <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="lastname" id="lastname" class="form-control">							
						</div>
					</div>
					<div class="form-group">
						<label for="mobilenum" class="col-md-3 col-sm-4 control-label">Mobile Number <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="mobilenum" id="mobilenum" class="form-control" placeholder="+63 xxxx-xxx-xxxx">
						</div>
					</div>
					<div class="form-group">
						<label for="landlinenum" class="col-md-3 col-sm-4 control-label">Landline Number</label>
						<div class="col-md-9 col-sm-8">
							<input type="password" name="landlinenum" id="landlinenum" class="form-control" placeholder="+02 xxx-xx-xx">
						</div>
					</div>
					<h3 class="text-primary">Billing Address</h3>
					<hr>
					<div class="form-group">
						<label for="address1" class="col-md-3 col-sm-4 control-label">Address 1 <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="address1" id="address1" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="address2" class="col-md-3 col-sm-4 control-label">Address 2</label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="address2" id="address2" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-md-3 col-sm-4 control-label">City <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="city" id="city" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="postalcode" class="col-md-3 col-sm-4 control-label">Postal Code</label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="postalcode" id="postalcode" class="form-control" placeholder="xxxx">
						</div>
					</div>
					<h3 class="text-primary">Login Details</h3>
					<hr>
					<div class="form-group">
						<label for="emailaddress" class="col-md-3 col-sm-4 control-label">Email Address <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="xxxxxxxx@site.com">
						</div>
					</div>
					<div class="form-group">
						<label for="c_username" class="col-md-3 col-sm-4 control-label">Username <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="text" name="c_username" id="c_username" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="c_password" class="col-md-3 col-sm-4 control-label">Password <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="password" name="c_password" id="c_password" class="form-control" placeholder="xxxxxxxx">
						</div>
					</div>
					<div class="form-group">
						<label for="cpassword" class="col-md-3 col-sm-4 control-label">Confirm Password <i class="fa fa-asterisk" aria-hidden="true"></i></label>
						<div class="col-md-9 col-sm-8">
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="xxxxxxxx">
						</div>
					</div>					
					<div class="form-group">
						<div class="col-md-offset-3 col-md-3 col-sm-offset-4 col-sm-4">
							<button type="submit" class="btn btn-lg btn-primary pull-right" id="regiBtn"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</button>
						</div>
					</div>
				</form>
			</div>
	</div>
</div>
	<div class="row">
		<div class="col-md-4">
			<div id="alert_msg"></div>
			<?php foreach($help_info as $row): ?>
				<div class="panel panel-success">
				  <div class="panel-heading"><i class="fa fa-question-circle" aria-hidden="true"></i> <?= $row->i_title; ?></div>
				  <div class="panel-body">
				  	<?= $row->i_description; ?>
				  </div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
$('#form-user').submit(function(e) {

	var me = $(this);

	$.ajax({
		url: me.attr('action'),
		type: 'post',
		data: me.serialize(),
		dataType: 'json',
		success: function(response) {
			if (response.success == true) {
				// show success message, remove error class, and disable form inputs
				$('#the-message').append('<div class="alert alert-success">You have been successfully registered! You may proceed by logging into your account here: <a href="<?php echo base_url() . 'shop/login';?>" id="panelHeadLink">Login</a></div>');
				$('.form-group').removeClass('has-error')
								.removeClass('has-success');
				$('.text-danger').remove();
				$("#form-user input").prop("disabled", true);
				$("#form-user #regiBtn").prop("disabled", true);
			}
			else {
				$.each(response.messages, function(key, value) {
					var element = $('#' + key);
					
					element.closest('div.form-group')
					.removeClass('has-error')
					.addClass(value.length > 0 ? 'has-error' : 'has-success')
					.find('.text-danger')
					.remove();
					
					element.after(value);
				});
			}
		}
	});
	return false;
});
</script>