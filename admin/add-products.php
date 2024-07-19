<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<div class = "container">
    <div class = "row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Products</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Select Category id</label>
                        <select name="category_id" class="form-select mb=2">
                        <option selected>Select category id</option>
                            <?php

                                $categories=getAll("categories");

                                if(mysqli_num_rows($categories)>0)
                                {
                                    foreach($categories as $item)
                                    {
                                        ?>
                                        <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Categories";
                                }
                                
                            ?> 
                            </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <Input type="text" name="name" placeholder="Enter Name"class="form-control mb=2">
                    </div>
                    <div class="col-md-6">
                         <label for="">Slug</label>
                        <Input type="text" name = "slug" placeholder="Enter Slug" class="form-control mb=2">
                    </div>
                    <div class="col-md-12">
                        <label for="">Small Description</label>
                        <textarea rows="3" name = "small description" placeholder="Enter small Description" class="form-control mb=2"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea rows="3" name = "description" placeholder="Enter Description" class="form-control mb=2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original_price</label>
                        <Input type="text" name="original_price" placeholder="Enter Original Price"class="form-control mb=2">
                    </div>
                    <div class="col-md-6">
                         <label for="">Selling_Price</label>
                        <Input type="text" name = "selling_price" placeholder="Enter Selling Price" class="form-control mb=2">
                    </div>
                    <div class="col-md-12">
                         <label for="">Upload Image</label>
                         <Input type="file" name = "image" class="form-control mb=2">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                         <label for="">Quantity</label>
                        <Input type="number" name = "qty" placeholder="Enter qty" class="form-control mb=12">
                    </div>

                    <div class="col-md-3">
                    <label for="">Status</label><br>
                        <input type ="checkbox" name="status">
                    </div>
                    <div class="col-md-3">
                        <label for="">Trending</label><br>
                        <input type ="checkbox" name="trending">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta-Title</label>
                        <Input type="text" name = "meta_title" placeholder="Enter Meta_Title" class="form-control mb=2">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta-Description</label>
                        <textarea rows="3" name = "meta_description" placeholder="Enter Meta_Description" class="form-control mb=2"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta-Keywords</label><br>
                        <textarea rows="3" name = "meta_keywords" placeholder="Enter Meta_Keywords" class="form-control mb=2"></textarea><br>
                    </div>
                 
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" name ="add_product_btn">Add Product</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
      </div>
</div>
</div>
<?php
include('includes/footer.php');
?>