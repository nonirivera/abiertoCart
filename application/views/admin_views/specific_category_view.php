<div class="container">
	<?php foreach($query as $row): ?>
	  <form class="form-horizontal" id="cmsForm" action="<?= base_url() . 'admin/update_category'; ?>" method="post">
	    <fieldset>
	    <div id="the-message"></div>
	    <input type="hidden" name="category_id" value="<?= $row->category_id; ?>">
	    <div class="form-group">
	      <label for="category_name" class="col-lg-2 control-label">From</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $row->category_name; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="category_description" class="col-lg-2 control-label">Description</label>
	      <div class="col-lg-10">
	       <textarea class="form-group" id="i_description" name="category_description"><?= $row->category_description; ?></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <?php if($su == 1): ?>
		        <button type="submit" class="btn btn-primary" id="updateBtn">Save Change</button>
		    <?php else: ?>
		        <button type="submit" class="btn btn-primary" id="updateBtn" disabled="true">Save Change</button>
		    <?php endif; ?>
	        <a href="<?= base_url() . 'admin/categories';?>" class="btn btn-default">Back to Categories</a>
	      </div>
	    </div>
	    </fieldset>
	  </form>
	<?php endforeach; ?>
</div>

<script type="text/javascript">
$('#cmsForm').submit(function(e){
	var me = $(this);

	$.ajax({
		url: me.attr('action'),
		type: 'post',
		data: me.serialize(),
		dataType: 'json',
		success: function(response){
			if(response.success == true){
				// show success message, remove error class, and disable form inputs
		        $('#the-message').append('<div class="alert alert-success">Category has been successfully updated!</div>');
		        $('.form-group').removeClass('has-error')
		                .removeClass('has-success');
		        $('.text-danger').remove();
		        $("#cmsForm input").prop("disabled", true);
		        $("#cmsForm #updateBtn").prop("disabled", true);
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
