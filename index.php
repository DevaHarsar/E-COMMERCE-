<?php
session_start();
include('functions/userfunctions.php');
include('includes/header.php');
?>

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
   <!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

        body {
          margin-top: 20px;
            background-color: white;
            font-family: 'poppins', sans-serif;
        }

        .navbar {
            background-color: white;
            height: 60px;
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
        }

        .navbar-left {
            padding: 5px;
        }

        .navbar-right {

        }

        .text {
            font-family: 'poppins', sans-serif;
            font-size: 15px;
            text-decoration: none;
            color: black;
        }

        .searchbox {
            font-family: 'poppins', sans-serif;
            height: 45px;
            width: 400px;
    
        }

        .image-container {
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4t_xOjo0l90m8F2ar1cjDmt9EJXRfT4x9MA&s);
            background-size: contain;
            font-family: 'poppins', sans-serif;
            height: 500px;
            width: 100%;
            margin-top: 0%;
        }

        .heading {
            font-size: 30px;
            font-family: 'poppins', sans-serif;
        }

        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: white;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .tab button {
            background-color:inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px 30px;
            transition: 0.3s;
            font-size: 17px;
            margin: 5px;
        }

        .tab button:hover {
            color: cadetblue;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .tabcontent {
          
            opacity: 0.5;
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .new-arrivals {
            padding: 0 5%;
        }
        .our-products{
            padding: 0 5%;
        }
        .transform:hover{
          transform: scale(1.03);
            transition: 0.2s;
        }

        .jewelimg {
            margin-left: 8%;
            height: auto;
            width: 200px;
            max-width: 220px;
            
        }

        .jewelimg:hover {
            transform: scale(1.09);
            transition: 0.8s;
        }

        .productcontainer {
            background-color: gainsboro;
            height: 300px;
            width: 100%;
            max-width: 250px;
        }
        .container-main{
           background-color:powderblue;
           height: 400px;
            width: 100%;
        }

        .container1{
            margin-top: 40px;
            padding: 10px;
            margin-left: 12%;
            border-radius: 20px;
            float: left;
            background-color: aliceblue;
            width: 500px;
        }
        .container1:hover{
            transform: scale(1.05);
            transition: 0.6s;
        }
        .container1-items{
            padding: 20px;
        }
        .container2{
            margin-top: 40px;
            padding: 10px;
            margin-right: 12%;
            border-radius: 20px;
            float: right;
            background-color: aliceblue;
            width: 500px;
        }
        .container2:hover{
            transform: scale(1.05);
            transition: 0.6s;
        }
        .container2-items{
            padding: 20px;
        }
        .image {
            height: 240px;
            width: 100%;
            max-width: 250px;
        }

        .productdet {
            text-decoration: none;
            color: black;
            margin-left: 10px;
            font-size: 18px;
            font-family: 'poppins', sans-serif;
        }

        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                height: auto;
            }

            .searchbox {
                margin: 2% auto;
            }

            .tab button {
                font-size: 14px;
                padding: 10px 12px;
            }

            .image-container {
                height: 200px;
            }

            .jewelimg {
                height: auto;
                width: 100%;
                max-width: 150px;
            }
        }
        .btn{
            height: 40px;
            width: 100px;
            margin-left: 40%;
            background-color: rgb(49, 174, 232);
            color: white;
            border-color:white;
            border-radius: 10px;
        }
        .btn:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        @media screen and (max-width: 1200px) {
            .searchbox {
                width: 80%;
            }
        }

        @media screen and (max-width: 992px) {
            .navbar {
                flex-direction: column;
                height: auto;
            }

            .searchbox {
                margin: 2% auto;
                width: 100%;
            }

            .tab button {
                font-size: 14px;
                padding: 10px 12px;
            }

            .image-container {
                height: 200px;
            }

            .jewelimg {
                height: auto;
                width: 100%;
                max-width: 150px;
            }
            .container1{
              margin-left: 35px;
              padding: 5px;
            }    
            .container2{
              padding: 5px;
            }        
        }

        @media screen and (max-width: 768px) {
            .heading{
                font-size: 10px;
            }
            .navbar {
                flex-direction: column;
                height: auto;
            }

            .searchbox {
                margin: 2% auto;
                width: 100%;
            }

            .tab button {
                font-size: 12px;
                padding: 8px 10px;
            }

            .image-container {
                height: 150px;
            }

            .jewelimg {
                margin-left: 23px;
                height: auto;
                width: 70%;
                max-width: 100px;
            }
            .container-main{
                height: 800px;
            }
            .container1{
                padding: 5px;
                height: 270px;
                width: 470px;
                margin-left: 9%;
            }
            .container1-items{
                font-size: 13px;
            }
            .container2{
                padding: 5px;
                height: 270px;
                width: 470px;
                margin-right: 8%;
            }
            .container2-items{
                font-size: 13px;
            }

            
        }

        @media screen and (max-width: 576px) {
            .searchbox {
                margin: 5% auto;
                width: 100%;
            }

            .tab button {
                font-size: 10px;
                padding: 6px 8px;
            }

            .image-container {
                height: 100px;
            }

            .jewelimg {
                height: auto;
                width: 100%;
                max-width: 100px;
            }

            
        }
        .container-main2{
            padding: 30px;
            height: 300px;
            background-color: bisque;
            margin-left: 0%;
            margin-right: 0%;
        }
        
        .jewels-container{
            margin-left: 5%;
            float: left;
           border-radius: 10px;
            background-color:thistle;
           height: 280px;
           width: 220px;
        }
        .jewels-container1{
            margin-right: 6%;
            float: right;
            border-radius: 10px;
            background-color:thistle;
           height: 280px;
           width: 220px;
        }
        .jewels-container2{
            margin-left: 7%;
            float: left;
           border-radius: 10px;
            background-color:thistle;
           height: 280px;
           width: 220px;
        }
        .jewels-container3{
            margin-right:7%;
            float: right;
            border-radius: 10px;
            background-color:thistle;
           height: 280px;
           width: 220px;
        }
        .jewels-img{
            
            border-radius: 10px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
           height: 190px;
           width: 220px;
        }
        .jewels-img:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        .jewel-details{
          text-align: left;
          margin-left: 10px;
          font-size: 18px;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
    
</head>

<body>
    <div class="navbar">
        <!-- <div class="navbar-left">
            <input type="search" class="fa searchbox" placeholder=" &#x1F50E;&#xFE0E;  Try Necklace, Rings by Product name ">
        </div> -->
        <div class="navbar-right">
        </div>
    </div><br>
    <!-- <div class="tab">
        <button class="tablinks transform" onclick="openCity(event, 'Gold')">Gold</button>
        <button class="tablinks transform" onclick="openCity(event, 'Silver')">Silver</button>
        <button class="tablinks transform" onclick="openCity(event, 'Platinum')">Platinum</button>
        <button class="tablinks transform" onclick="openCity(event, 'Diamond')">Diamond</button>
        <button class="tablinks transform" onclick="openCity(event, 'Gold coins')">Gold coins</button>
        <button class="tablinks transform" onclick="openCity(event, 'Gifts')">Gifts

          </div> -->
          
          <!-- <div id="Gold" class="tabcontent">
            <h3 >Gold</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>
          
          <div id="Silver" class="tabcontent">
            <h3 >Silver</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>
          
          <div id="Platinum" class="tabcontent">
            <h3 >Platinum</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>

          <div id="Diamond" class="tabcontent">
            <h3 >Diamond</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>

          <div id="Gold coins" class="tabcontent">
            <h3 >Gold coins</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>

          <div id="Gifts" class="tabcontent">
            <h3 >Gifts</h3><hr>
            <a href="#" class="text">Necklace</a><br>
            <a href="#" class="text">Rings</a><br>
            <a href="#" class="text">Ear rings</a><br>
            <a href="#" class="text">Bangles</a><br>
          </div>
           -->
          
        <div class="image-container">
        
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
    
         
        </div>

    </body>
</html>
    <?php
include('includes/footer.php');?>