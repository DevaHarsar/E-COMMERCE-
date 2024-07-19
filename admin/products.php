<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class = "container">
    <div class = "row">
        <div class ="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Products</h4>  
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products=getAll("Products");
                        if(mysqli_num_rows($products)>0)
                        {
                            foreach($products as $items)
                            {
                                ?>
                                <tr>

                                    <td><?= $items['id'];?></td>
                                    <td><?= $items['name'];?></td>
                                    <td>
                                        <img src="../uploads/<?= $items['image'];?>" alt="<?= $items['name'];?>" style="max-width: 50px; max-height: 50px;">
                                    </td>
                                    <td><?= $items['status']=='0' ?"visible":"Not visible"?></td>
                                    <td><a href="edit-products.php?id=<?=$items['id'];?>" class="btn btn-primary btn-sm">Edit</a>
                                   
                                    </td>
                                    <td>
                                    
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?= $items['id'];?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete_product_btn">Delete</button>                                
                                        </form>                                
                                        
                                    </td>
                                    
                                </tr>

                            <?php
                            }
                        }
                        else{
                            echo "No record Found";
                        }

                        ?>
                    
                    </tbody>
                </table>
            </div>
          </div>  
</div>   
</div>
</div>
<?php
include('includes/footer.php');
?>