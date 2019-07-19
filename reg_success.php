<?php
session_start();
if(empty($_SESSION)){
    header('Location:index.php');
}
?>

<html>
<head>
    <title>Restaurant Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/style1.css">
    <link rel="stylesheet" type="text/css" href="CSS/bootstap.css">


    <!--Bootstrap CDNs-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<?php include "includes/header.php"; ?>
<?php

//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.
$connection= mysqli_connect("localhost", "root", "", "zomato");

//if button with the name uploadfilesub has been clicked
if (isset($_POST['uploadfilesub'])) {
//declaring variables
    $name = $_POST['restaurant_ka_name'];
    $rating = $_POST['restaurant_ka_rating'];
    $cuisines = $_POST['restaurant_ka_cuisines'];
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
//folder where images will be uploaded
    $folder = 'imagesuploadedf/';
//function for saving the uploaded images in a specific folder
    move_uploaded_file($filetmpname, $folder . $filename);
//inserting image details (ie image name) in the database
    $sql = "INSERT INTO `restaurant` (`r_id`, `r_name`, `r_rating`, `r_cuisine`, `r_bg`) VALUES (NULL, '$name', '$rating', '$cuisines', '$filename');";
}
?>
<div class="jumbotron" style="background-color: #E9EBEE" ">
    <h1 class="text-center" style="color: #491217; font-family: Gotham">YOUR RESTAURANT IS SUCCESSFULLY REGISTERED!</h1><br>
    <h2 class="text-center" style="font-family: Gotham;color: #721c24">YOUR RESTAURANT ID is :<?php  if($connection -> query($sql)===TRUE)
    {
        echo " ".$connection-> insert_id;
    }else{
        echo "Not Inserter";
    }

 ?></h2>
    <p class="text-center" style="color: #4267B2;font-size: 25px"> Please don't click back and don't reload the page</p>
</div>
<div class="jumbotron" style="margin-top: -30px">
    <h3 class="text-center">CLICK HERE TO ADD MENU!</h3><br>
   <a href="addmenu2.php" class="btn btn-success btn-block text-center" style="width: 200px; margin-left: 550px">ADD MENU</a>
</div>

</body>
</html>
