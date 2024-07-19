<?php

$host ="localhost";
$username="root";
$password="";
$database="jewelery";

$con = mysqli_connect($host,$username,$password,$database);

if(!$con)
{
    die("connection failed :".mysqli_connect_error());

}
// else{
//     echo ("Connected successfully");
// }
?>