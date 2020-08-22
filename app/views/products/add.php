<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
.reveal-if-active {
  display: none;
  max-height: 100px;
  overflow: hidden;
}

input[type="radio"]:checked ~ .reveal-if-active {
  display: block;
  max-height: 100px;
  overflow: visible;
}

</style>

<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <h2>Add Product</h2>
        <p>Create a product with this form</p>
        <form action="<?php echo URLROOT; ?>/products/add" method="post">
          <div class="form-group">
              <label>Name:<sup>*</sup></label>
              <input type="text" name="Name" class="form-control form-control-lg <?php echo (!empty($data['Name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Name']; ?>" placeholder="Add a Name...">
              <span class="invalid-feedback"><?php echo $data['Name_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Price:<sup>*</sup></label>
              <input type="text" name="Price" class="form-control form-control-lg <?php echo (!empty($data['Price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Price']; ?>" placeholder="Add a Price...">
              <span class="invalid-feedback"><?php echo $data['Price_err']; ?></span>
          </div>  
          <div class="form-group">
              <label>SKU:<sup>*</sup></label>
              <input type="text" name="SKU" class="form-control form-control-lg <?php echo (!empty($data['SKU_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['SKU']; ?>" placeholder="Add a SKU...">
              <span class="invalid-feedback"><?php echo $data['SKU_err']; ?></span>
          </div>  
      <div>
          <h2>Choose product type</h2>
          <input id="book" type="radio" name="Producttype" value="1" required>
          <label for="choice-product-type">Book</label>
          <div class="reveal-if-active">
            <input id="choice" class="text-input" type="text" name="typeval" placeholder="Ex. 250 g" class="require-if-active" data-require-pair="#choice-product-type">
          </div>
      <div>
          <input type="radio" name="Producttype" value="2" required>
          <label for="choice-product-type">CD/DVD</label>
          <div class="reveal-if-active form-group">
            <input id="choice" class="text-input " type="text" name="typeval" placeholder="Ex. 500 mb" class="require-if-active" data-require-pair="#choice-product-type">
          </div>
      </div>
      <div>
          <input type="radio" name="Producttype" value="3" required>
          <label for="choice-product-type">Furniture</label>
          <div class="reveal-if-active">
            <input id="choice" class="text-input" type="text" name="typeval" placeholder="Ex. 250x100x50 cm" class="require-if-active" data-require-pair="#choice-product-type">
          </div>
      </div>
          
          <input type="submit" class="btn btn-success" value="Submit">
        </form>

        
      </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
