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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<body>
<?php include "includes/header.php"; ?>

<?php

//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.
$connect = mysqli_connect("localhost", "root", "", "zomato");

$query="SELECT `r_id` FROM `restaurant`";
$result = mysqli_query($connect, $query);
$result=mysqli_fetch_assoc($result);

//if button with the name uploadfilesub has been clicked
if (isset($_POST['upload'])) {
//declaring variables
    $name = $_POST['menu_ka_name'];
    $price = $_POST['menu_ka_price'];
    $type = $_POST['menu_ka_type'];
    $id=$_POST['res_ka_id'];
    $result = mysqli_query($connect, $query);
    $result=mysqli_fetch_assoc($result);
    $query = "INSERT INTO `menu` (`menu_id`, `r_id`, `menu_name`, `menu_price`, `menu_type`) VALUES (NULL, '$id', '$name', '$price', '$type');";
    $query = mysqli_query($connect, $query);
    if( $query) {
        header('Location:homepage1.php');

    }
}

?>

<!--Make sure to put "enctype="multipart/form-data" inside form tag when uploading files -->

<div class="row" style="background-color: #E9EBEE" ">
    <div class="col-6" style="margin-top: 10px">

            <form method="post" enctype="multipart/form-data">
                <h1 class=" text-center" style="font-family: 'Century Gothic';color: #4267B2">ADD YOUR MENU!</h1>

                <label style="font-family: Gotham; font-size: 20px">Restaurant ID:</label>
                <input type="text" class="form-control" name="res_ka_id">
                <p>Unable to find ID? You will get your RESTAURANT ID once you register your restaurant!<br> <a href="restaurant4.php">Register your restaurant now!</a></p>

                <label style="font-family: Gotham; font-size: 20px">Item Name:</label>
                <input type="text" class="form-control" name="menu_ka_name" required="required"><br>

                <label style="font-family: Gotham;font-size: 20px">Item Price:</label>
                <input type="text" class="form-control" name="menu_ka_price" required="required"><br>

                <label style="font-family: Gotham;font-size: 20px">Item Type:</label>
                <input type="radio" name="menu_ka_type" required="required" value="Veg">Veg
                <input type="radio" name="menu_ka_type" required="required" value="Non-Veg">Non-Veg


                <!--input tag for file types should have a "type" attribute with value "file"-->
                <input type="submit" name="upload" class="btn btn-primary btn-success btn-block"
                       value="Upload Now!"/>
            </form>

    </div>
    <div class="col-6" style="margin-right: -50px">
        <img src="images/cooking-clipart-chef-menu-8.png" style="width: 600px; height: 500px;margin-top: 0px">
    </div>
</div>


</body>
</html>

