<?php
session_start();

include('includes/header.php');
include('functions/userfunctions.php');?>
<div class="py-3 bg-secondary">
    <div class="container">
        <div class="text-white">Home/Collections</div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="col-md-12">
        <h1>Our Collections</h1>
        <hr>
        <div class="row">

        
        <?php 
          $categories=getAllActive("categories");

          if(mysqli_num_rows($categories)>0)
          {
                foreach($categories as $items)
                {
                    ?>

                    <div class="col-md-3 mb-2">
                        <a href="products.php?category=<?=$items['slug']?>">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="uploads/<?=$items['image'];?>" alt="Category Image" class="w-100">
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
include('includes/footer.php');?>