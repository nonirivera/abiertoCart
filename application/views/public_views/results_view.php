<div class="container">
	
  <div class="row text-center" style="display:flex; flex-wrap: wrap;">
<?php if($query > 0): ?>
	<?php foreach($query as $row):?>
      <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
          <?php if($row->product_image): ?>
          <img class="img-responsive" src="<?= base_url() . $row->product_image; ?>">
          <?php else: ?>
            <img class="img-responsive" src="<?= base_url() . 'assets/images/no_image.jpg'; ?>">
          <?php endif; ?>
          <div class="caption">
            <h4><?= $row->product_name; ?></h4>
            <p><?php echo substr($row->product_qdescription,0,100).'....' ? : "No Description"; ?></p>
            <p><strong>P 555</strong></p>
          </div>
          <p>
            <a href="<?= base_url() . 'shop/product/' . $row->product_id; ?>" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> More Info</a>
          </p>
        </div>
      </div>
 	<?php endforeach; ?>
 	<?php else: ?>
    <br>
	<div style="text-align: center;">
    <div class="container">
    <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
    <h2>No Result</h2>
    <br>
    <p><strong>Oops, seems like the product you are searching for is not available.</strong></p>
    <p>Make sure to type either the product name or its description correctly.</p> 
    </div>
  </div>
<?php endif; ?>	     

  </div>
</div>