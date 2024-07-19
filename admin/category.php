<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class = "container">
    <div class = "row">
        <div class ="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Categories</h4>  
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>STATUS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $category=getAll("categories");
                        if(mysqli_num_rows($category)>0)
                        {
                            foreach($category as $items)
                            {
                                ?>
                                <tr>

                                    <td><?= $items['id'];?></td>
                                    <td><?= $items['name'];?></td>
                                    <td>
                                        <img src="../uploads/<?= $items['image'];?>" alt="<?= $items['name'];?>" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td><?= $items['status']=='0' ?"visible":"Not visible"?></td>
                                    <td><a href="edit-category.php?id=<?=$items['id'];?>" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="category_id" value="<?= $items['id'];?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="delete_category_btn">Delete</button>                                
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