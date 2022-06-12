<?php
    session_start();
    if($_SESSION['customer_login_status']!="Loged in" and (!isset($_SESSION['ID']))){
        header('Location:../Home.php');
    }
    if(isset($_GET['sign']) and $_GET['sign']=="out"){
        $_SESSION['customer_login_status']="Loged out";
        unset($_SESSION['ID']);
        header('Location:../Home.php');
    }
?>
<?php
    $a=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deplkgbvvmrtbhmtmbh</title>
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
        .d1{
            background-color:white;
            float: left;
            width:40%;
            border: 2px solid;
            margin-bottom: 20px;
            margin-left: 30%;
            margin-top:30px;
            height: 740px;
        }
        .updt{
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            float: left;
            margin-left: 46%;
            margin-top: -90px;
        }
        h2{
            display:inline;
        }
        h3{
            display:inline;
        }
    </style>
</head>
<body style="background-color: powderblue;">
<div class="dv1">
        <a href="Cus_home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;color:black;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="profile.php" style="float:right;color:black;margin-top: 16px;font-size: 25px">
        <?php
            include("connection.php");
            $customer=$_SESSION['ID'];
            $sql="SELECT * FROM details WHERE ID='$customer'";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
            $name=$row['Fname'];
            echo "$name |";
            ?></a>
    </div><br>
    <?php echo "<h1 style='text-align:center;color:black;margin-top:40px;margin-bottom:-10px;'> Product's of <b> $a</b></h1>" ?>
<?php
include("connection.php");
    $query="SELECT * FROM desktop WHERE brand_name='$a'";
    $r = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($r)) {
            $nm=$row["mo_name"];
            $img=$row["img"];
            $pro=$row["processor"];
            $mthbrd=$row["mother_board"];
            $grpscrd=$row["graphicsCard"];
            $ram=$row["ram"];
            $mse=$row["mouse"];
            $kbrd=$row["kbrd"];
            $mntr=$row["mntr"];
            $war=$row["waranty"];
            $price=$row["price"];
            $quan=$row["quantity"];
            echo "<div class='d1'>
                <img src='../Devices_img/$img' style='width:70%;height:180px;margin:10px 15% 15px;'>
                <h3 style='padding-left: 4%;color:green;'>Model Name : <h2 >$nm </h2></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Processor :<h3 >$pro </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Motherboard : <h3 >$mthbrd </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Graphics Card : <h3 >$grpscrd </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Ram : <h3 >$ram</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Mouse : <h3 >$mse</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Key Board : <h3 >$kbrd</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Monitor : <h3 >$mntr </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Warranty : <h3 >$war </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Price : <h3 >$price </h3></h3><br><br>
            </div> ";
            ?><a class="updt" href="Buy_Desktop.php?id=<?php echo $nm ?>">Buy</a><?php
        }
?>
<P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>