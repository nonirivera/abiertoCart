<div class="container">
	<?php foreach($query as $row): ?>
	  <form class="form-horizontal" id="cmsForm" action="<?= base_url() . 'admin/update_form_message'; ?>" method="post">
	    <fieldset>
	    <div id="the-message"></div>
	    <input type="hidden" name="cm_id" value="<?= $row->cm_id; ?>">
	    <div class="form-group">
	      <label for="i_title" class="col-lg-2 control-label">From</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="i_title" name="i_title" value="<?= $row->cm_name; ?>" readonly>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="i_title" class="col-lg-2 control-label">Email Address</label>
	      <div class="col-lg-10">
	       <a href="mailto:<?=$row->cm_email_address; ?>"><strong><?= $row->cm_email_address; ?></strong> <i class="fa fa-envelope" aria-hidden="true"></i> Contact via Email</a>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="i_description" class="col-lg-2 control-label">Message</label>
	      <div class="well col-lg-10">
	        <?= $row->cm_message; ?>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <?php if($row->has_read == 0): ?>
	        	<input type="radio" name="cm_has_read" id="cm_has_read" value="1" checked="">Mark as Read &nbsp;
	        	<input type="radio" name="cm_has_read" id="cm_has_read" value="0">Ignore &nbsp;
		        <button type="submit" class="btn btn-primary" id="updateBtn">Save Change</button>
		    <?php else: ?>
		    	&nbsp;
		    <?php endif; ?>
	        <a href="<?= base_url() . 'admin/messages';?>" class="btn btn-default">Back to Messages</a>
	      </div>
	    </div>
	    </fieldset>
	  </form>
	<?php endforeach; ?>
</div>