<?php $this->view('includes/header');?>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <div class="navbar-brand d-flex">Add new Product</div>
 

  </div>
</nav>
<div class="container-fluid">
  <?php if(count($errors)>0): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
  <div>
  
  <h6>
    <?php foreach ($errors as $error):?>
      <br><?=$error?>
    <?php endforeach;?>
  </h6>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif;?>
  
<form method="POST" id="product_form" class="form-control row">
  <div class="mb-col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
    <label class="form-label">SKU</label>
    <input type="text" name="SKU" class="form-control" id="SKU">
  </div>
  <div class="mb-col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="mb-col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
    <label class="form-label">Price</label>
    <input type="number"  name="price"  class="form-control" id="price">
  </div>
  
  <div class="mb-col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
    <label class="form-label">Product Type</label>
    <select id="productType"  onchange="productSwitcher(event);" class="form-select">
      <option value="">Choose a product type</option>
      <option value="DVD" name="DVD" >DVD</option>
      <option value="book" name="book">Book</option>
      <option value="furniture" name="furniture">Furniture</option>
      
    </select>
  </div>

  <div id="inputSelect" class="">

  </div>
  
  <div class="col-sm-10 col-md-4 col-lg-6 m-auto mb-2">
  <button type="submit" class="btn btn-success">Add</button>
  <a href="<?=ROOT?>">
      <button type="button" class="btn btn-danger">Cancel</button>
    </a>

  </div>
</form>
</div>
<script>

    function productSwitcher(){
        let product=document.getElementById('productType').value;
        let selectedProduct=document.getElementById('inputSelect');
        console.log(product);

        if(product=='DVD'){
            selectedProduct.innerHTML=`
            <div class="col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
                <label class="form-label">Size (MB)</label>
                <input type="number"  name="size" class="form-control" id="size">
                <p class="p-2">Please provide size.</p>
            </div>`
        }else if(product=='furniture'){
            selectedProduct.innerHTML=`
            <div class="col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
                <label class="form-label">Height (CM)</label>
                <input type="number"  name="height" class="form-control" id="height">
            </div>
            
            <div class="col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
                <label class="form-label">Width (CM)</label>
                <input type="number"  name="width" class="form-control" id="width">
            </div>
            
            <div class="col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
                <label class="form-label">Length (CM)</label>
                <input type="number"  name="length" class="form-control" id="length">
                <p class="p-2">Please provide dimension in HxWxL format.</p>
            </div>`
        }else if(product=='book'){
            selectedProduct.innerHTML=`
            <div class="col-sm-10 col-md-6 col-lg-6 m-auto mb-2">
                <label class="form-label">Weight (KG)</label>
                <input type="number"  name="weight" class="form-control" id="weight">
                <p class="p-2">Please provide weight.</p>
            </div>`;
            
        }


    }
</script>
    
<?php $this->view('includes/footer');?>