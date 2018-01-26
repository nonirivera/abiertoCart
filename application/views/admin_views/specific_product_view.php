<?php
// generate dynamic category / brand
foreach($categories as $ct):
	$category_list[] = array(
			$ct->category_id => $ct->category_name
		);
endforeach;

foreach($brands as $br):
	$brand_list[] = array(
			$br->brand_id => $br->brand_name
		);
endforeach;
?>
<?php foreach($query as $row): ?>
<form class="form-horizontal" id="productForm">
  <fieldset>
    <legend>View Product</legend>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?=$row->product_name; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label"><strong>&#x20B1;</strong></label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_price" name="product_price" value="<?=$row->product_price; ?>">
      </div>
      <div class="col-lg-4">
        <p class="text-warning">Product Price should be in decimal value. (000.00)</p>
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Qty Left</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_quantity" name="product_quantity" value="<?=$row->product_quantity; ?>">
      </div>
      <div class="col-lg-4">
        <p class="text-warning">Product Quantity should be numeric.</p>
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Product Code</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_code" name="product_code" value="<?= $row->product_code; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="product_description" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" id="i_description" name="product_description"><?=$row->product_description; ?></textarea>
      </div>
    </div>
    <div class="form-group">
    	<label for="select" class="col-lg-2 control-label">Category</label>
    	<div class="col-lg-4">
    		<?php echo form_dropdown('product_category', $category_list, $row->category_id,'class="form-control", id="category"'); ?>
    	</div>
    	<label for="select" class="col-lg-2 control-label">Brand</label>
    	<div class="col-lg-4">
    		<?php echo form_dropdown('product_brand', $brand_list, $row->brand_id,'class="form-control", id="brand"'); ?>
    	</div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Image</label>
      <div class="col-lg-4">
        <img class="img-responsive img-rounded" src="<?= '../../' .$row->product_image; ?>">
      </div>
      <div class="col-lg-6">
        <label class="btn btn-info btn-file">
          <?php echo form_upload('userfile','asdsd'); ?>
        </label>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      <?php if($su == 1): ?>
        <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
      <?php else: ?>
        <button type="submit" class="btn btn-primary btn-lg" disabled="true">Save Changes</button>
      <?php endif; ?>
        <button type="reset" class="btn btn-default btn-lg">Cancel</button>
      </div>
    </div>
  </fieldset>
</form>
<?php endforeach; ?>

<script type="text/javascript">
$('.form-control').prop('readonly', true);

$('.form-control').click(function(){
	$('.form-control').prop('readonly', false);
});
</script>