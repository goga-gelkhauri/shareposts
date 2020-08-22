<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('product_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/products/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Product</a>
    </div>
  </div>
  <?php foreach($data['products'] as $product) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $product->Name; ?></h4>
      <div class="bg-light p-2 mb-3">
        SKU: <b><?php echo $product->SKU; ?></b>
      </div>
      <p class="card-text">$<?php echo $product->Price; ?></p>
     
      <form action="<?php echo URLROOT; ?>/products/delete" method="post">
        <input type="hidden" name="Id" value="<?php echo $product->Id; ?>">
        <button type="submit" class="btn btn-dark">Delete</button>
      </form>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>