<?php
session_start();
if(empty($_SESSION)){
    header('Location:index.php');
}
else{
    $id = '';
    if( isset( $_GET['id'])) {
        $id = $_GET['id'];
    }
    include "includes/dbhelper.php";
    $query1="SELECT * FROM `restaurant` WHERE `r_id` LIKE '$id'";

    $result=mysqli_query($connection,$query1);

    $result=mysqli_fetch_assoc($result);
}
?>
<?php

$connect = mysqli_connect("localhost", "root", "", "zomato");

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "menu_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            header('Location:menu2.php?id='.$row['r_id'].'');
        }
    }
    else
    {
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_quantity'		=>	$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';

            }
        }

    }
}

?>

<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="CSS/style1.css">
    <!--Bootstrap CDNs-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body style="background-color: #f2f2f2; overflow-x: hidden">
<?php include "includes/header.php"; ?>

<div class="jumbotron" style="margin-top:-65px; width:100%; margin-right: 0px;margin-left: 0px;   padding-left: 10px;padding-right: 10px;">
    <div class="row">
        <div class="col-12" style="padding-left: 0px;padding-right: 0px; background-color: blueviolet;padding-bottom: 40px;">
            <img src="imagesuploadedf/<?php echo $result['r_bg']; ?>" style="width:100%;height: 400px;margin-right: 80px ;overflow-x: hidden;overflow-y: hidden;">
            <h1 class="text-light text-center" style="z-index: 10000;margin-top: -100px;"><?php echo $result['r_name'];?></h1>
        </div><br><br>
        <div class="container text-center" style="margin-top: 20px"> <span><a href="homepage1.php" style="font-family: 'Century Gothic'">Click here to go to the homepage</a> (Don't click back)</span></div>
        <div class="col-12" style="margin-top: 10px">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $query2 ="SELECT * FROM `menu` WHERE `r_id` LIKE '$id'";
                                $result2 = mysqli_query($connect, $query2);
                                if(mysqli_num_rows($result2) > 0)
                                {
                                    while($row = mysqli_fetch_array($result2))
                                    {
                                        ?>
                                        <div class="col-md-4">
                                            <form method="post" action="menu2.php?action=add&id=<?php echo $row["r_id"]; ?>">                            <?php  if ($row['menu_type']=="Veg"){
                                                echo '<i class="fa fa-minus-circle fa-2x text-success"></i>';
                                                }else{
                                                echo '<i class="fa fa-minus-circle fa-2x text-danger"></i>';
                                                } ?>
                                                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                                    <h4 class="text-info"><?php echo $row["menu_name"]; ?></h4>

                                                    <h4 class="text-danger">Rs.<?php echo $row["menu_price"]; ?></h4>

                                                    <input type="text" name="quantity" value="1" class="form-control" />

                                                    <input type="hidden" name="hidden_name" value="<?php echo $row["menu_name"]; ?>" />

                                                    <input type="hidden" name="hidden_price" value="<?php echo $row["menu_price"]; ?>" />

                                                    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />


                                                </div>
                                            </form>
                                        </div>
                                        <?php

                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div id="cart">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <?php
                                if(!empty($_SESSION["shopping_cart"]))
                                {
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $values["item_name"]; ?></td>
                                            <td><?php echo $values["item_quantity"]; ?></td>
                                            <td>Rs. <?php echo $values["item_price"]; ?></td>
                                            <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                            <td><a href="menu2.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                        </tr>
                                        <?php
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right">Total</td>
                                        <td align="right">Rs.<?php echo number_format($total, 2); ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>