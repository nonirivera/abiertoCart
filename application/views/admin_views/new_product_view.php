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
<form class="form-horizontal" id="productForm" action="<?= base_url() . 'admin/save_product';?>" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend><?= $legend; ?></legend>
    <div id="the-message"></div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label"><strong>&#x20B1;</strong></label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price">
      </div>
      <div class="col-lg-4">
        <p class="text-warning">Product Price should be in decimal value. (000.00)</p>
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Qty Left</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_quantity" name="product_quantity" placeholder="Product Quantity">
      </div>
      <div class="col-lg-4">
        <p class="text-warning">Product Quantity should be numeric.</p>
      </div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Product Code</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code">
      </div>
    </div>
    <div class="form-group">
      <label for="product_description" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" id="i_description" name="product_description"></textarea>
      </div>
    </div>
    <div class="form-group">
    	<label for="select" class="col-lg-2 control-label">Category</label>
    	<div class="col-lg-4">
    		<?php echo form_dropdown('product_category', $category_list, '', 'class="form-control", id="category"'); ?>
    	</div>
    	<label for="select" class="col-lg-2 control-label">Brand</label>
    	<div class="col-lg-4">
    		<?php echo form_dropdown('product_brand', $brand_list, '','class="form-control", id="brand"'); ?>
    	</div>
    </div>
    <div class="form-group">
      <label for="product_name" class="col-lg-2 control-label">Image</label>
      <div class="col-lg-10">
        <label class="btn btn-info btn-file">
          <?php echo form_upload('userfile'); ?>
        </label>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary btn-lg" id="saveProductBtn">Save Changes</button>
        <a href="<?= base_url() . 'admin/products';?>" class="btn btn-default btn-lg">Back to List</a>
      </div>
    </div>
  </fieldset>
</form>

<script type="text/javascript">
$('#productForm').submit(function(e){
	var me = $(this);

	$.ajax({
		url: me.attr('action'),
		type: 'post',
		//data: me.serialize(),
    data: new FormData(this),
    mimeType:"multipart/form-data",
    contentType: false,
    cache: false,
    processData:false,
		dataType: 'json',
		success: function(response){
			if(response.success == true){
				// show success message, remove error class, and disable form inputs
		        $('#the-message').append('<div class="alert alert-success">Product has been successfully added!</div>');
		        $('.form-group').removeClass('has-error')
		                .removeClass('has-success');
		        $('.text-danger').remove();
		        $("#productForm input").prop("disabled", true);
		        $("#productForm #saveProductBtn").prop("disabled", true);
			}
			else{
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
	//return false;
  e.preventDefault();
});	
</script>
