<script type="text/javascript">
function clear_cart(){
	var result = confirm('This will clear your cart. Continue?');

	if(result) {
		window.location = "<?php echo base_url(); ?>cart/remove/all";
	}else{
		return false; // cancel button
	}
}
</script>
<div id="confirm" class="modal hide fade">
  <div class="modal-body">
    Are you sure?
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php
			if(!$this->cart->contents()): ?>
				<h1>Your Cart is empty.</h1>
				<a href="<?= base_url() . 'shop/'; ?>" class="btn btn-default btn-lg">Go Back Shopping</a>
			<?php else: ?>
				<div class="progress progress-striped active">
				  <div class="progress-bar" style="width: 33%"></div>
				</div>
				<table class="table table-striped">
					<thead>
					    <tr class="info">
					      <th>Product Name</th>
					      <th>Product Price</th>
					      <th>Quantity Ordered</th>
					      <th>Amount</th>
					      <th>&nbsp;</th>
					    </tr>
					  </thead>
				<form action="<?= base_url() . 'cart/update_cart'; ?>" method="post">
				<?php 
				$cart =$this->cart->contents();
				$grand_total = 0; $i = 1;

				foreach($cart as $item):
					echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
					echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
					echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
					echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
					echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
				?>
					  <tbody>
					    <tr>
					      <td><?= $item['name']; ?></td>
					      <td>&#8369; <?= number_format($item['price'], 2); ?></td>
					      <td><input type="number" name="<?= 'cart['. $item['id'] .'][qty]' ;?>" min="1" value="<?= $item['qty'] ;?>"></td>
					      <td>&#8369; <?= number_format($item['subtotal'], 2); ?></td>
					      <td class="pull-right"><a href="<?= base_url() . 'cart/remove/' . $item['rowid']; ?>"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a></td>
					    </tr>
				<?php endforeach; ?>	    
					    <tr>
					    	<?php $grand_total = $grand_total + $item['subtotal']; ?>
					    	<td colspan="2"><strong>Order Total: P <?= number_format($this->cart->total(),2) ?></strong></td>
					    	<td>&nbsp;</td>
					    	<td>&nbsp;</td>
					    	<td>
					    		<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Continue Shopping</a> 
					    		<button class="btn btn-default" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i> Update Cart</button> 
					    		<button class="btn btn-default" type="button" onclick="clear_cart()"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Clear Cart</button>
					    	</td>
					    </tr>
					  </tbody>
				</form>
				</table>
			<?php endif; ?>
		</div>
		<div class="col-md-3">
			<?php
			if(!$this->cart->contents()):
			?>
			<?php else: ?>
			<div align="center">
				<!-- <button class="btn btn-primary btn-block btn-lg">Place Order</button> -->
				<a href="<?= base_url() . 'billing/'; ?>" class="btn btn-primary btn-block btn-lg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Continue to Billing</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>