<?php
session_start();

include('includes/header.php');
include('functions/userfunctions.php');
if(isset($_GET['category']))
{
$category_slug=$_GET['category'];

$category_data = getslugActive("categories",$category_slug);
$category=mysqli_fetch_array($category_data);

if($category)
{


$c_id=$category['id'];

?>
<div class="py-3 bg-secondary">
    <div class="container">
        <div class="text-white">
        <a  class ="text-white" href="index.php">
            Home/</a>
        <a class ="text-white"  href="categories.php">    
        Collections/</a><?=$category['name'];?></div>
    </div>
</div>

<div class="py-3">
    <div class="container">
        <div class="col-md-12">
        <h1><?=$category['name'];?></h1>
        <hr>
        <div class="row">

        
        <?php 
          $products=getProductsCategory($c_id);

          if(mysqli_num_rows($products)>0)
          {
                foreach($products as $items)
                {
                    ?>

                    <div class="col-md-3 mb-2">
                        <a href="products-view.php?product=<?=$items['slug'];?>">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="uploads/<?=$items['image'];?>" alt="Product Image" class="w-100">
                            <h4 class="text-center"><?=$items['name'];?></h4>
                            </div>
                        </div>
                      </a>

                    </div>
                        

                  <?php
                }
          }
          else{
            echo "No data Available";
          }
        ?>
    </div>
        </div>
    </div>
</div>
    
               
        

    <?php
}
else
{
    echo "Something wrong";
}
}
else
{
    echo "Something wrong";
}
include('includes/footer.php');?>
