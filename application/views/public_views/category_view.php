
<div class="container">
	<div class="row text-center" style="display:flex; flex-wrap: wrap;">
  <?php foreach($query as $row): ?>
      <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
          <?php if($row->product_image): ?>
            <img class="img-responsive" src="<?= base_url() . $row->product_image; ?>">
          <?php else: ?>
            <img class="img-responsive" src="<?= base_url() . 'assets/images/no_image.jpg'; ?>">
          <?php endif; ?>
          <div class="caption">
            <h4><?= $row->product_name; ?></h4>
            <p><?= substr($row->product_qdescription, 0, 35) . '...'; ?></p>
            <p><strong>P 99.99</strong></p>
          </div>
          <p>
            <a href="<?= base_url() . 'shop/product/' . $row->product_id; ?>" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> More Info</a>
          </p>
        </div>
      </div>
  <?php endforeach; ?>  
	</div>
</div>