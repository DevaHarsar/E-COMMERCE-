<?php
session_start();
if(isset($_SESSION['auth']))
{
  $_SESSION['message']="You are already logged In";
  header('Location: index.php');
  exit();
}
include('includes/header.php');?>

<div class="py-5">


  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['message']))
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hey!</strong> <?=$_SESSION['message'];?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <?php
          unset($_SESSION['message']);
                }
            ?>
                <div class="card">
                    <div class="card-header">
                    <h4>Registration form </h4>
                    </div>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
<form>
<div class="form-group">
    <label >NAME</label>
    <input type="TEXT" name ="name" class="form-control" id="name" placeholder="Enter your Name">
   
  </div>
<div class="form-group">
    <label >PHONE</label>
    <input type="number" name="phone" class="form-control" id="name" placeholder="Enter your phone number">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name ="password" id="CONFIRM PASSWORD" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label >CONFIRM Password</label>
    <input type="password" class="form-control" name = "cpassword"id="exampleInputPassword1" placeholder="Re-Enter Password">
  </div>
  
  <button type="submit" name= "reg_btn" class="btn btn-primary">Submit</button>
</form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <?php
include('includes/footer.php');?>