<div class="table-responsive">
<table id="tableView" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <td>Product Name</td>
      <td>Category</td>
      <td>Brand</td>
      <td>Product Code</td>
      <td>Image</td>
      <td>Price</td>
      <td>Quantity</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($query as $row): ?>
    <tr>
      <td>
        <a href="<?= base_url() . 'admin/product/' . $row->product_id;?>" data-toggle="tooltip" data-placement="right" title="View Product Details"><?= $row->product_name; ?></a>
      </td>
      <td>
        <a href="" data-toggle="tooltip" data-placement="right" title="View Product in this Category"><?= $row->category_name; ?></a>
      </td>
      <td>
        <a href="" data-toggle="tooltip" data-placement="right" title="View Product in this Brand"><?= $row->brand_name; ?></a>
      </td>
      <td><?= $row->product_code; ?></td>
      <td>
      	<?php if($row->product_image!=""): ?>
      		<img src="<?= '../' .$row->product_image; ?>" class="img-thumbnail img-responsive">
      	<?php else: ?>
      		<i class="fa fa-picture-o" aria-hidden="true"></i> No Image
      	<?php endif; ?>
      </td>
      <td><strong>&#x20B1; <?= $row->product_price; ?></strong></td>
      <td>
      	<?php if($row->product_quantity < $crit_level->i_description): ?>
      		<p class="text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?= $row->product_quantity; ?></p>
      	<?php else: ?>
      		<?= $row->product_quantity; ?>
      	<?php endif; ?>
      </td>
      <td>
      <?php if($su == 1): ?>
        <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row->product_id; ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete</a>
      <?php else: ?>
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Can't Delete
      <?php endif; ?>
      </td>
    </tr>

    <!-- Confirmation modal-->
<div id="myModal<?php echo $row->product_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Product</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this product? </p>
      </div>
      <div class="modal-footer">
          <a href="<?= base_url('admin/delete_product').'/'.$row->product_id; ?>" class="btn btn-danger btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</a>
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
<a href="<?= base_url() . 'admin/add_product';?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Product</a>
<?php else: ?>
<p class="text-warning">Can't Add Product</p>
<?php endif; ?>
<a href="#" onclick='location.reload(true); return false;' class="btn btn-lg btn-default"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh List</a>
