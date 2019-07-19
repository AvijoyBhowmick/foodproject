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





<!--Make sure to put "enctype="multipart/form-data" inside form tag when uploading files -->
<div class="row" style="background-color: #E9EBEE;width: 100%; margin-right: 0px;margin-left: 0px;padding-right: 0px;padding-left: 0px">

    <div class="col-6" style="margin-right: -50px">
        <img src="images/restaurant-graphic.png" style="width: 600px; height: 500px;margin-top: 0px">
    </div>


    <div class="col-6" style="margin-top: 10px">
    <form  method="post" action="reg_success.php" enctype="multipart/form-data" >
        <h1 class=" text-center" style="font-family: 'Century Gothic';color: #721c24">Register your restaurant Here!</h1>
        <p class="text-center" style="color: #491217;font-family: 'Century Gothic';font-size: 20px ">MAKE YOUR BUSINESS ONLINE!</p><hr>
        <label style="font-family: Gotham; font-size: 20px">Restaurant's name:</label>
        <input type="text" class="form-control"   name="restaurant_ka_name" required="required"><br>

        <label style="font-family: Gotham;font-size: 20px">Cuisines:</label>
        <input type="text" class="form-control" name="restaurant_ka_cuisines" required="required"><br>

        <label style="font-family: Gotham;font-size: 20px">Rate your restaurant:</label>
        <input type="text" class="form-control" name="restaurant_ka_rating"><br>

        <!--input tag for file types should have a "type" attribute with value "file"-->
        <label style="font-family: Gotham;font-size: 20px">Upload your restaurant photo:</label><br>
        <input type="file"  name="uploadfile" value="Choose file" required="required"><br><br>
        <input type="submit" name="uploadfilesub" value="REGISTER" class="btn btn-primary btn-success btn-block" />
    </form>
        </div>
</div>
</body>
</html>

