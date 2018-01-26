<div class="container">
  <div align="center">
    <h1>Featured Brands</h1>
  </div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="https://demo.opencart.com/image/cache/catalog/demo/banners/MacBookAir-1140x380.jpg" alt="Chania" id="carouselimg">
      
    </div>

    <div class="item">
      <img src="https://demo.opencart.com/image/cache/catalog/demo/banners/iPhone6-1140x380.jpg" alt="Chania" id="carouselimg">

    </div>

    <div class="item">
      <img src="https://demo.opencart.com/image/cache/catalog/demo/banners/MacBookAir-1140x380.jpg" alt="Flower" id="carouselimg">

    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  
</div>
<p></p>
<div class="container">
  <div align="center">
    <h1>Our Latest Products</h1>
  </div>
  <!-- display featured -->
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
            <p><strong>P <?= $row->product_price; ?></strong></p>
          </div>
          <p>
            <a href="<?= base_url() . 'shop/product/' . $row->product_id; ?>" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> More Info</a>
          </p>
        </div>
      </div>
  <?php endforeach; ?>
  </div>
</div>