<?php
session_start();

include('includes/header.php');
include('functions/userfunctions.php');
if(isset($_GET['product']))
{
    
    $product_slug = $_GET['product'];
    $product_data = getslugActive("products",$product_slug);
    $product=mysqli_fetch_array($product_data);  
    
    if($product)
    {
        ?>
        <div class="py-3 bg-muted>

       <div class="container mt-3">
        <div class="text-dark">
        <a  class ="text-dark" href="index.php">
            Home/</a>
        <a class ="text-dark"  href="categories.php">    
        Collections/</a><?=$product['name'];?></div>
    </div>
</div>
        <div class="bg-light py-4">

       

        <div class="container product_data mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">

                        <img src="uploads/<?= $product['image'];?>" alt="Product Image" class="w-100">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 class="fw-bold"> <?= $product['name'];?>
                <span class="float-end text-danger">
                    <?php if($product['trending']){echo "Trending";}?>
                </span>
                
                </h4>
                    <hr>
                    <p> <?= $product['small_description'];?></p>
                    <div class="row">
                        <div class="col-md-4">
                        <h5> Rs<span class="text-success fw-bold"><?= $product['selling_price'];?></span></h5>
                        </div>
                        
                        <div class="col-md-2">
                        <h5> Rs<s class="text-danger"> <?= $product['original_price'];?></s></h5>
                        </div>
                    </div>
                       <div class="row mt-3">
                        <div class="col-md-4">
                           <div class="input-group mb-3" style="width:130px">
                           <button class="input-group-text decrement-btn">-</button>
                           <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                           <button class="input-group-text increment-btn">+</button>


                           </div>
                        </div>
                       </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                               <button class="btn btn-primary px-4 addtocart" value="<?= $product['id'];?>"><i class="fa fa-shopping-cart me-2 "></i>Add to Cart</button>
                            </div>
                            <div class="col-md-6">
                               <button class="btn btn-danger px-4"><i class="fa fa-heart me-2 "></i>Add to Wishlist</button>
                            </div>
                        </div>

                    <hr>
                    <h6>Product Description:</h6>
                    <p> <?= $product['description'];?></p>
                </div>
            </div>
        
        </div>
        </div>
        <?php
    }
    else
    {
        echo "Product not Found";
    }

}
else
{
    echo "Something wrong";
}
include('includes/footer.php');?>