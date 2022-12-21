<?php $this->view('includes/header');?>


  <div class="container-fluid">
    <form  method="post">
    <div class="d-flex justify-content-between">
      <h3>Products</h3>
    <div class="m-2">
      <a href="<?=ROOT?>/add ">
  
      <button type="button" class="p-1 m-auto btn btn-sm btn-outline-info" >Add a new Product</button></a>
      <button type="submit" id="delete-products-btn" class=" p-1 m-auto btn btn-sm btn-outline-dark" >Delete all products</button>
      </div>
    </div>

  </div>


<div class="container-fluid">
<div class="row m-auto">
  <?php if(!empty($rows)): ?>
  <?php foreach ($rows as $row): ?>
  <div class="col-sm-10 col-md-4 col-lg-3 m-auto mb-2">
    
    <div class="card d-flex flex-row justify-content-start align-center shadow p-3 mb-5 bg-white rounded border-right-0">
    <div class="form-check m-2">
        <input class="delete-checkbox form-check-input" type="checkbox" value="" name="<?=$row->id?>" id="flexCheckDefault">
      </div>
      <div class="card-body d-flex flex-column justify-content-center align-items-center ">
      
        <h5 class="card-title">
          <?=$row->name;?>
        </h5>
        <p class="card-text">
          <?=$row->SKU;?>
        </p>
        <p class="card-text">
          <?=$row->price." $";?>
        </p>
        
           <?php if(empty($row->size)):?>
           <?= null ?>
           <?php else: ?>
            <p class="card-text">
              Size:
            <?= $row->size." MB"; ?>
            </p>
          <?php endif;?> 
        
        
           <?php if(empty($row->height) || empty($row->width) || empty($row->length) ):?>
           <?= null ?>
           <?php else: ?>
            <p class="card-text">
              Dimension:
            <?= $row->height."x".$row->width."x".$row->length; ?>
            </p>
          <?php endif;?> 
       

       
           <?php if(empty($row->weight)):?>
           <?= null ?>
           <?php else: ?>
            <p class="card-text">
              Weight:
            <?= $row->weight." kg"; ?>
           </p>
          <?php endif;?> 
    
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <?php else: ?>
    <h4 class="m-2"> No products to display. Click on Add Product to add a few.</h4>
  <?php endif; ?>


  
</div>
</form>
</div>
    
<?php $this->view('includes/footer');?>