<?php
//connect to database
$connection=mysqli_connect("localhost","root","","zomato");

$name=$_POST['user_ka_name'];
$email=$_POST['user_ka_email'];
$password=$_POST['user_ka_password'];
$phone=$_POST['user_ka_phone'];

$query1="SELECT * FROM `users` WHERE `email` LIKE '$email'";

$result=mysqli_query($connection,$query1);

$result=mysqli_fetch_assoc($result);

//msg1=loginfailed
//msg2=registration failed
//msg3=email already exist


if (count($result)==5){
    header('Location:index.php?msg=3');
}else{
    $query="INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`) VALUES (NULL, '$name', '$email', '$password', '$phone')";
    if(mysqli_query($connection,$query)){
        echo "Registered";
    }else{
        //echo "Some error occured";
        header('Location:index.php?msg=2');
    }
}

?>