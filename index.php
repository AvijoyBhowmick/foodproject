<?php
session_start();
if (!empty($_SESSION)){
    header('Location:profile.php');
}
if(!empty($_GET)){
    $error=1;
//echo $error;
}else{
    $error=0;
}
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Homie Food Login</title>
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

<script type="text/javascript">
    $(document).ready(function () {
        var error='<?php echo $error ?>';
        if(error==1){
            var errorCode='<?php echo $_GET['msg'] ?>';
            if(errorCode==1){
                $('#errorMsg').html('<p style="color: red">Incorrect email/password</p>');
            }else if(errorCode==2){
                $('#regError').html('<p style="color: red">Some error occured. Try again</p>');
                $('#myModal').modal('show');
            }else{
                $('#regError').html('<p style="color: red">This email id already exists.</p>');
                $('#myModal').modal('show');
            }

        }


    })


</script>

<body style="background: #E9EBEE; height: 100%;">

<nav class="navbar" style="background: #003087; height: 50px;">
    <img src="images/Untitled-1.png" style="width: 260px;
    height: 220px; margin-top: -32px; margin-left: -50px;">

</nav>
<div style="height: 100%; margin-top: -10%">

    <video autoplay muted loop style="opacity: 10%">
        <source src="videos/food.mp4" type="video/mp4">
    </video>
    
</div>


<div class="container" style="margin-top: -400px">
    <div class="row mt-50">
        <div class="col-8">
            <h1 class=" display-4 text-center text-light" style="color:white;font-size: 70px;font-family: San Francisco">Welcome to the delicious world of Indian cuisines!</h1>
            <h2 class=" text-center lead text-light" style="color: white; font-size: 30px;font-family: San Francisco"><b>The official food partner of Cricket World Cup 2015</b></h2>
        </div>
        <div class="col-4">
            <div class="card" style="background-color: transparent">
                <div class="card-body">
                    <form class="form" action="login_validator.php" method="post">
                        <div id="errorMsg"></div>
                        <label style="color: white; font-size: 20px">Email</label><br>
                        <input type="email" class="form-control" name="user_ka_email" required="required"><br>
                        <label style="color: white; font-size: 20px">Password</label><br>
                        <input type="password" class="form-control" name="user_ka_password" required="required"><br>

                        <input type="submit" value="Login" class="btn btn-block bg-nav btn-success">
                    </form>
                </div>
            </div>
            <p class="text-center text-light" style="color: white"><a href="#" data-toggle="modal" data-target="#myModal" style="color: white">Not a member? Sign Up</a></p>
        </div>
    </div>
</div>

<div class="jumbotron" style="margin-top: -10px; background-color: #F5F6F7;height: 600px;width: 100%;padding-left: 0px;padding-right: 0px" >
    <div class="row"style="width: 100%; margin-right: 0px;margin-left: 0px;padding-right: 0px;padding-left: 0px">
        <div class="col-12" style="width: 100%;margin-right: 0px;margin-left: 0px;padding-right: 0px;padding-left: 0px">
    <div class="jumbotron" style="background-color: #F5F6F7;height: 10px;width: 5000px;margin-top:-75px;margin-left:0px;margin-right: 0px;">
    <img src="images/Untitled-1.png" style="position: center; width: 600px;height: 550px;margin-left: 380px;margin-top: -120px";>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 300px;height: 400px; margin-left: 100px">
                <div class="card-body" style="background-color: #F5F6F7">
            <img src="images/delivery.png" style="width: 380px;height: 350px;margin-top: 10px;margin-left: -35px">
                </div>
            </div>
        </div>
        <div class="col-4" style="margin-left: -100px;">
            <div class="card"style="width: 300px;height: 400px; margin-left: 150px; background-color: #F5F6F7">
                <div class="card-body">
            <img src="images/anytime.png" style="width: 500px;height: 500px;margin-top: -80px;margin-left: -175px";></div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 300px;height: 400px; margin-left: 100px; background-color: #F5F6F7">
                <div class="card-body">
            <img src="images/order2.png" style="width: 500px;height: 550px;margin-top: -100px;margin-left: -100px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="width: 1000px;height: 1000px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Register Here</h4>
            </div>
            <div class="modal-body">
                <div id="regError"></div>
                <form class="form" action="reg_validation.php" method="post">
                    <label>Name</label><br>
                    <input type="text" class="form-control" name="user_ka_name" required="required"><br>

                    <label>Email</label><br>
                    <input type="email" class="form-control" name="user_ka_email" required="required"><br>

                    <label>Password</label><br>
                    <input type="password" class="form-control" name="user_ka_password" required="required"><br>

                    <label>Phone</label><br>
                    <input type="number" class="form-control" name="user_ka_phone" required="required"><br><br>

                    <input type="submit" value="Register" class="btn btn-primary btn-block">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>
</body>
</html>