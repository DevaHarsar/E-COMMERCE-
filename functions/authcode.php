<?php
session_start();
include('../admin/config/dbcon.php');
include('../functions/myfunctions.php');
if(isset($_POST['reg_btn']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
    if($password==$cpassword)
    {
        
        $check_email_query="SELECT email FROM users WHERE email='$email'";
        $check_email_query_run=mysqli_query($con,$check_email_query);
        if(mysqli_num_rows($check_email_query_run)>0) 
        {
            $_SESSION['message']="Email id is Already Registered";
            header('Location: ../register.php');
        }
        else
        {
                $insert_query="INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password') ";
                $insert_query_run=mysqli_query($con,$insert_query);
            if($insert_query_run)
            {
                $_SESSION['message']="Registered Successfully";
                header('Location: ../login.php');
            }
            else
            {
                $_SESSION['message']="Something Went Wrong";
                header('Location: ../register.php');
            }
              }
            }
    else{
        $_SESSION['message']="Password did not match";
        header('Location: ..//register.php');
    }
}
elseif(isset($_POST['login_btn']))
{
    $email= mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $login_query ="SELECT * FROM users WHERE email='$email' and password='$password'";
    $login_query_run=mysqli_query($con,$login_query);
    if(mysqli_num_rows($login_query_run)>0)
    {
        $userdata=mysqli_fetch_array($login_query_run);
        $userid=$userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as=$userdata['role_as'];
        $_SESSION['auth']=true;
             $_SESSION['auth_user']=[
                'user_id'=>$userid,
                'name'=>$username,
                'email'=>$useremail
             ]; 
             $_SESSION['role_as']=$role_as;
            if($role_as == 1)
            {
                redirect("../admin/category.php","Welcome to DashBoard");
              
            }
             else{
                redirect("../index.php","Logged in Successfully");
                 
             }
    }            
    else      

    {
        redirect("../login.php","Invalid Credentials");
    }
}
?>