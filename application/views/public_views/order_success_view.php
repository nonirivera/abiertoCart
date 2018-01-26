<div class="container">
	<p class="lead">Your order has been successfully submitted!</p>
	<div class="progress progress-striped active">
	  <div class="progress-bar" style="width: 100%"></div>
	</div>

	<div class="jumbotron">
		<h2>What's Next?</h2>
		<div class="row">
			<div class="col-md-6">
				<p>You can go on your account to check on your order history</p>
				<a href="<?= base_url() . 'customers/account'; ?>" class="btn btn-info">Order History</a>
			</div>
			<div class="col-md-6">
				<p>Or just browse for more items and make another purchase</p>
				<a href="<?= base_url() . 'shop/'; ?>" class="btn btn-info">Back to Shop</a>
			</div>
		</div>
	</div>
</div>