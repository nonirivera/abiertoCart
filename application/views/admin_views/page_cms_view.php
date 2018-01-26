<div class="container">
	<?php foreach($query as $row): ?>
	  <form class="form-horizontal" id="cmsForm" action="<?= base_url() . 'settings/cms_update'; ?>" method="post">
	    <fieldset>
	    <div id="the-message"></div>
	    <input type="hidden" name="i_id" value="<?= $row->i_id; ?>">
	    <div class="form-group">
	      <label for="i_title" class="col-lg-2 control-label">Title</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="i_title" name="i_title" value="<?= $row->i_title; ?>">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="i_description" class="col-lg-2 control-label">Description / Content</label>
	      <div class="col-lg-10">
	        <textarea id="i_description" name="i_description"><?= $row->i_description; ?></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="submit" class="btn btn-primary" id="updateBtn">Update Page</button>
	        <a href="<?= base_url() . 'admin/';?>" class="btn btn-default">Back to Dashboard</a>
	      </div>
	    </div>
	    </fieldset>
	  </form>
	<?php endforeach; ?>
</div>

<script type="text/javascript">
$('#cmsForm').submit(function(e) {
	var me = $(this);

	$.ajax({
		url: me.attr('action'),
		type: 'post',
		data: me.serialize(),
		dataType: 'json',
		success: function(response){
			if(response.success == true){
				$('#the-message').append('<div class="alert alert-success">Content has been successfully updated!</div>');
		        $('.form-group').removeClass('has-error')
		                .removeClass('has-success');
		        $('.text-danger').remove();
		        $('#updateBtn').prop("disabled", true);
			}
			else{
				$.each(response.messages, function(key, value){
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