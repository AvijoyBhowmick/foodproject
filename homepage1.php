<?php
session_start();
if(empty($_SESSION)){
    header('Location:index.php');
}
?>
<html>

<head>
    <title>Homiefood Home</title>
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

<body style="background: #F3F3F3">

<?php include "includes/header.php"; ?>

<div class="container;">
    <div class="row" style="margin-left: 60px">
        <div class="col-10">
    <h1 style="font-family: 'San Francisco'; color: #4267B2; margin-left: 200px">OUR RESTAURANTS</h1>
    <p style="color: #000000; font-size: 20px; font-family: San Francisco;margin-left: 250px">Order your food now!!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-9">
                    <div class="row" style="margin-top: -80px">
                        <div class="col-12">
                            <div class="card" style="background-color: #F5F6F7 ">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $connection=mysqli_connect("localhost","root","","zomato");
                                        $query="SELECT * FROM `restaurant`";
                                        $result=mysqli_query($connection,$query);

                                        while ($row=mysqli_fetch_assoc($result)){
                                            echo ' <div class="col-4">
                                            <div class="card" style="background-color: #ffffff">
                                                <img src="imagesuploadedf/'.$row['r_bg'].'" class="card-img-top">
                                                <div class="card-body">
                                                    <h4 class="card-title">'.$row['r_name'].'</h4>
                                                    <div class="btn btn-success btn-block" style="color:white;width: 50px; font-family: San Francisco">'.$row['r_rating'].'</div> 
                                                    <p class="card-text text-grey">
                                                        '.$row['r_cuisine'].'
                                                    </p>
                                                    <a href="menu2.php?id='.$row['r_id'].'" class="btn  btn-block" style="color: #4267B2; font-family: San Francisco">View Menu</a>
                                                </div>
                                            </div>
                                        </div>';
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                   <div class="col-3" style="margin-top: -60px">
                       <div class="card">
                           <div class="card-body" style="background-color: #F5F6F7">
                       <h4 class="card-title text-center" style="font-family: San Francisco;color: #4267B2"><b>UPLOAD YOUR OWN RESTAURANT!</b></h4><hr>
                               <p style="color: #000000">Register your restaurant here and make your profit double!!</p>
                               <a href="restaurant4.php" class="btn btn-block btn-success">REGISTER!</a>
                           </div>
                       </div><br><br>
                       <div class="card">
                           <div class="card-body" style="background-color: #F5F6F7">
                               <h4 class="card-title text-center" style="font-family: San Francisco;color: #4267B2"><b>UPLOAD YOUR  RESTAURANT's MENU!</b></h4><hr>
                               <p style="color: #000000">Add or edit menu of your restaurant!!</p>
                               <a href="addmenu2.php" class="btn btn-block btn-success">ADD MENU!</a>
                           </div>
                       </div>
                   </div>
               </div>
             </div>
    </div>
</div>


</body>


</html>
