<div class="container">
	<div class="row">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<?php foreach($query as $row): ?>
		    <h3 class="panel-title">Order Serial ORD-N-<?= $row->serialnum; ?></h3>
		  </div>
		  <div class="panel-body">
		    <div class="col-md-6">
				<div class="well">
					<?php $date = strtotime($row->date); ?>
					<p class="lead"><i>Made by: <?= $row->order_customer_username; ?> | <a href="mailto:<?= $row->email; ?>"><?= $row->email; ?></a></i> </p>
					<p class="text-success"><strong>Order Date: <?= date("F j, Y",$date); ?></strong></p>
					<p class="text-primary"><strong>Total Amount: <?= $row->total_amount; ?></strong></p>
			    	<p class="text-warning"><strong>Mode Of Payment: <?= $row->mode_of_payment; ?></strong></p>
			    	<p>&nbsp;</p>
			    	<strong>Shipping Address:</strong>
			    	<p class="text-muted"><?= $row->address; ?></p>
			    	<p>&nbsp;</p>
			    	<p>&nbsp;</p>
			    	<?php 
			    	$options = array(
			    			'Open' => 'Open',
			    			'Shipped' => 'Shipped',
			    			'Completed' => 'Completed'
			    		);
			    	echo form_dropdown('status', $options, $row->status); 
			    	?>
			    	<?php if($row->status == 'Completed'): ?>
			    		<button class="btn btn-primary btn-xs disabled">Update</button>
			    	<?php else: ?>
			    		<button class="btn btn-primary btn-xs">Update</button>
			    	<?php endif; ?>
			    <?php endforeach; ?>		
				</div>   	
		    </div>
		    <div class="col-md-6">
		    	<div class="well">
		    		<h3>Product(s) Detail</h3>
	    			<ul class="list-group">
	    			<?php foreach($prods as $product): ?>
					  <li class="list-group-item">
					    <span class="badge"><?= $product->quantity; ?> unit(s)</span>
					    <?= $product->product_name; ?>
					  </li>
	    			<?php endforeach; ?>
					</ul>
		    	</div>
		    </div>
		  </div>
		</div>
	</div>
</div>