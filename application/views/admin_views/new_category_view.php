<form class="form-horizontal" id="productForm" action="<?= base_url() . 'admin/save_category';?>" method="post">
  <fieldset>
    <legend><?= $legend; ?></legend>
    <div id="the-message"></div>
    <div class="form-group">
      <label for="category_name" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Product Name">
      </div>
    </div>
    <div class="form-group">
      <label for="category_description" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" id="i_description" name="category_description"></textarea>
      </div>
    </div>
    <hr>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary btn-lg" id="saveProductBtn">Save Changes</button>
        <a href="<?= base_url() . 'admin/categories';?>" class="btn btn-default btn-lg">Back to List</a>
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
		data: me.serialize(),
    //data: new FormData(this),
		dataType: 'json',
		success: function(response){
			if(response.success == true){
				// show success message, remove error class, and disable form inputs
		        $('#the-message').append('<div class="alert alert-success">Category has been successfully added!</div>');
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
	return false;
});	
</script>
