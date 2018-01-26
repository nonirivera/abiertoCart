<div class="table-responsive">
<table id="tableView" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <td>Category Name</td>
      <td>Description</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($query as $row): ?>
    <tr>
      <td><?= $row->category_name; ?></td>
      <td><?php echo $row->category_description ? : "<p class='text-warning'>No Description</p>"; ?></td>
      <td>
        <a href="<?= base_url() . 'admin/category/'. $row->category_id; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View More</a>
        <!--- NO CATEGORY DELETE YET -->
       <!--  <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row->category_id; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete</a> -->
      </td>
    </tr>

    <!-- Confirmation modal-->
<div id="myModal<?php echo $row->category_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Category</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this category? </p>
      </div>
      <div class="modal-footer">
          <a href="<?= base_url('admin/delete_category').'/'.$row->category_id; ?>" class="btn btn-danger btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</a>
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>  No</button>
      </div>
    </div>

  </div>
</div>

<?php endforeach; ?>
  </tbody>
</table>
</div>

<?php if($su == 1): ?>
<a href="<?= base_url() . 'admin/add_category';?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Category</a>
<?php else: ?>
<p class="text-warning">Can't Add Product</p>
<?php endif; ?>
<a href="#" onclick='location.reload(true); return false;' class="btn btn-lg btn-default"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh List</a>

