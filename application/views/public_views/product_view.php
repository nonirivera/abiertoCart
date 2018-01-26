<div class="container">
<?php foreach($query as $row): ?>

	<div class="row">
		<div class="col-md-8">
			<div class="thumbnail">
			<?php if($row->product_image != ""): ?>
				<img class="img-responsive" src="<?= '../../' .$row->product_image; ?>" />
			<?php else: ?>
				<img src="<?= base_url() . 'assets/images/no_image.jpg'; ?>" class="img-responsive">
			<?php endif; ?>
				<div class="caption-full">
						<div align="center"></div>
						<p></p>
				</div>
			</div>
		<div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"><i class="fa fa-comments" aria-hidden="true"></i> Customer Reviews</a></li>
		    <li role="presentation"><a href="#addReview" aria-controls="addReview" role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Review</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="reviews">
		    <p></p>
		    <?php if(count($reviews) > 0): ?>
		    <?php foreach($reviews as $rev): ?>
		    	<div class="alert alert-primary" role="alert">
				    <strong><?= $rev->pr_username; ?></strong>
					<span class="pull-right">10 days ago</span>
					<p><?= $rev->pr_content; ?></p>
		    	</div>
		    <?php endforeach; ?>
		<?php else: ?>
			<strong>No reviews yet</strong>
		<?php endif; ?>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="addReview">
		    	<p></p>
		    	<div class="pull-right"><strong class="text-warning">You are signed in as <i><?= $this->session->userdata('username'); ?></i></strong></div>

		    	<!--- PRODUCT COMMENT FORM -->
		    	<?php echo form_open('shop/product_comment_submit','id="product_comment_form"'); ?>
		    	<input type="hidden" name="product_id" id="product_id", value="<?= $row->product_id; ?>">
		    	<?php
		    	$customerLogged = $this->session->userdata('username');
		    	if(isset($customerLogged)):
		    		$customerLogged = $this->session->userdata('username');
		    	else:
		    		$customerLogged = "Anonymous";
		    	endif;
		    	?>
		    	<input type="hidden" name="pr_username" value="<?= $customerLogged; ?>">
		    	<div class="form-group">
				  <label for="comment">Your comment about this product:</label>
				  <div id="comment_alert_msg"></div>
				  <textarea class="form-control" rows="5" id="comment" name="product_comment"></textarea>
				</div>
				<div class="form-group">
					<input type="button" class="btn btn-success btn-lg" name="comment_form_btn" id="comment_form_btn" value="Submit">
				</div>
				<?php echo form_close(); ?>
				<!--- PRODUCT COMMENT FORM END -->

		    </div>
		  </div>

		</div>
		<?php
		// define shop variables 
		// $id = $row->product_id; 
		// $name = $row->product_name; 
		// $description = $row->product_description;
		// $price = $row->product_price;
		// $qty = $this->input->post('quantity')
		// $quantity = $row->product_quantity; 
		// $product_reference_no = $product->product_reference_no; 
		?>
		</div>
		<?php
		echo form_open('cart/add');
		// echo form_hidden('id', $this->input->post('product_id'));
		// echo form_hidden('name', $name);
		// echo form_hidden('price', $price);
		// echo form_hidden('qty', $qty);

		?>

		<div class="col-md-4">
			<div class="well">
			  <h3><input type="hidden" name="product_name" value="<?=$row->product_name; ?>"><?=$row->product_name; ?></h3>
			  <input type="hidden" name="product_id" value="<?= $row->product_id; ?>">
			  <p>Brand: <a href="#"><?= $row->brand_name; ?></a></p>
			  <p>Product Code: <?= $row->product_code; ?></p>
			  <h3>P <input type="hidden" name="product_price" value="<?=$row->product_price; ?>"><?=$row->product_price; ?></h3>
			  <?php if($this->session->userdata('is_logged_in') === 1): ?>
				  <div class="row">
				  	<div class="col-xs-5">
				  		<input class="form-control" id="focusedInput" type="number" min="1" max="<?=$row->product_quantity; ?>" required placeholder="Qty" name="product_quantity">
				  	</div>
				  	<div class="col-xs-7">
				  		<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</a></button>
				  	</div>
				  </div>
			<?php else: ?>
				<div align="center">
					<p class="text-warning">You must be logged in to do orders.</p>
					<a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary">Log me in</a>
				</div>
			<?php endif; ?>
				</div>
			<div class="panel panel-default">
			  <div class="panel-heading">Product Overview</div>
			  <div class="panel-body">
			  	<?= $row->product_qdescription; ?>
			  </div>
			</div>
		<?php if($row->product_description != ""): ?>
			<div class="panel panel-default">
			  <div class="panel-heading">Description / Specifications</div>
			  <div class="panel-body">
			  	<?= $row->product_description; ?>
			  </div>
			</div>
		<?php endif; ?>
		</div>

		<?php echo form_close(); ?>

	</div>
<?php endforeach; ?>
</div>
<script type="text/javascript">
$('#comment_form_btn').click(function(){
	var comment_fields = $('#product_comment_form').serialize();

	$.ajax({
		url: "<?php echo site_url('shop/product_comment_submit'); ?>",
		type: "POST",
		data: comment_fields,
		success: function(result)
		{
			if(result == 'COMMENTSUBMIT')
			{
				$('#comment_alert_msg').html('<div class="alert alert-success">Your comment was successfully posted!</div>');
				location.reload();
			}
			else
			{
				$('#comment_alert_msg').html('<div class="alert alert-danger">' + result + '</div>');
			}
		}
	});
});
</script>