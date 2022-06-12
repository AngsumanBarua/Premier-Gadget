<?php
    session_start();
    if($_SESSION['admin_login_status']!="Loged in" and (!isset($_SESSION['email']) and !isset($_SESSION['mobile']))){
        header('Location:../Home.php');
    }
    if(isset($_GET['sign']) and $_GET['sign']=="out"){
        $_SESSION['admin_login_status']="Loged out";
        unset($_SESSION['email']);
        unset($_SESSION['mobile']);
        header('Location:../Home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        .dv1{
            display: inline;;
            height:30px;
            font-size: 40px;
        }
        .dv1 a:hover{
            background-color: #ddd;
            color: black;
        }
        ul{
            padding: 0;
            list-style: none;
            /* background: #f2f2f2; */
        }
        ul li{
            display: inline-block;
            position: relative;
            line-height: 21px;
            text-align: left;
        }
        ul li a{
            display: block;
            padding: 8px 25px;
            color: #333;
            text-decoration: none;
            font-size: 30px;
        }
        ul li a:hover{
            color: rgb(255, 255, 255);
            background: #939393;
        }
        .dropdown {
            margin-top: 20px;
            background: rgb(242, 242, 242);
            width: 40%;
            height: 200px;
            border: 1px solid black;
            position: relative;
        }
        .dd{
            float : left;
            width:80%;
            margin: 0px 0 30px 10%;
            background-color:white;
        }
        table, th, td {
            border:1px solid black;
        }
        .buy{
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            float: left;
            margin : 40px 0 300px 44%;
        }
    </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="admin_home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="color:green;float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="color:green;float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div><br>
    <p style="text-align:center;font-size:40px;color:black">Pending Order Lists</p>
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
    <table class="dd">
        <tr>
            <th>Order No</th>
            <th>Customer Id</th>
            <th>Product's Model</th>
            <th>Time</th>
            <th>Date</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Confirm</th>
        </tr>
            <?php
                include("connection.php");
                $query="SELECT * FROM ordr";
                $rw=mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($rw)) {
                    $cnfm=$row['CONFIRM'];
                    if($cnfm==1){
                        continue;
                    }
                    $no=$row['ordr_no'];
                    $id=$row['cus_id'];
                    $model=$row['pr_model'];
                    $somoi=$row['somoi'];
                    $tarik=$row['tarik'];
                    $qntt=$row['quantity'];
                    $to_price=$row['price'];
                    echo "<tr>
                        <td>$no</td>
                        <td>$id</td> 
                        <td>$model</td>
                        <td>$somoi</td>
                        <td>$tarik</td>
                        <td>$qntt</td>
                        <td>$to_price</td>
                        <td><a href='Confirm_order.php?id=$no'> Confirm</a></td>
                    </tr>";
                }
            ?>
    </table>
    </form>
    <a class="buy" href="Customers.php">Customer's List</a><br>
</body>
</html>
