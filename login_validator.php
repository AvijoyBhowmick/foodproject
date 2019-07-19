<?php

session_start();

//connect to database
$connection=mysqli_connect("localhost","root","","zomato");

$email=$_POST['user_ka_email'];
$password=$_POST['user_ka_password'];

$query="SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

$result=mysqli_query($connection,$query);

$result=mysqli_fetch_assoc($result);

if(count($result)==5){
    $_SESSION['r_id']=$result['r_id'];
    $_SESSION['user_id']=$result['user_id'];
    $_SESSION['name']=$result['name'];
    header('Location:homepage1.php');
}else{
    header('Location:index.php?msg=1');
}

?>