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
            border: 1px solid;
            margin-bottom: 20px;
            margin-left: 30%;
            margin-right: 30%;
            height: 520px;
        }
        .buy{
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            float: left;
            margin-left: 46%;
            margin-top: -90px;
        }
        h3{
            display:inline;
        }
    </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="Cus_home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="profile.php" style="float:right;margin-top: 16px;font-size: 25px">
        <?php
            include("../connection.php");
            $cuss=$_SESSION['ID'];        
            $sql="SELECT Fname FROM details WHERE (ID='$cuss')";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
            $name=$row['Fname'];
            echo "$name |";
        ?></a>
    </div><br>
    <?php echo "<h1 style='text-align:center;color:black;'> Product's of  $a</h1>" ?>
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
<?php
include("connection.php");
$query="SELECT * FROM headphn WHERE brand_name='$a'";
$r = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($r)) {
        $nm=$row["mo_name"];
        $img=$row["img"];
        $fqn=$row["Frequency"];
        $sntvt=$row["Sensitivity"];
        $dis=$row["Distortion"];
        $optn_vltg=$row["Operating_voltage"];
        $price=$row["price"];
        echo "<div class='d1'>
            <img src='../Devices_img/$img' style='width:70%;height:180px;margin:10px 15% 5px;'>
            <h3 style='padding-left: 4%;color:green;'>Model Name : <h3 style='color:black;'>$nm </h3></h3><br><br>
            <h3 style='padding-left: 4%;color:green;'>Frequency : <h3 style='color:black;'>$fqn </h3></h3><br><br>
            <h3 style='padding-left: 4%;color:green;'>Sensitivity : <h3 style='color:black;'>$sntvt </h3></h3><br><br>
            <h3 style='padding-left: 4%;color:green;'>Distortion : <h3 style='color:black;'>$dis </h3></h3><br><br>
            <h3 style='padding-left: 4%;color:green;'>Operating_voltage: <h3 style='color:black;'>$optn_vltg</h3></h3><br><br>
            <h3 style='padding-left: 4%;color:green;'>Price : <h3 style='color:black;'>$price</h3></h3><br><br>
        </div> ";
        ?><a class="buy" href="Buy_headphn.php?id=<?php echo $nm ?>">Buy</a><?php
    }
?>
</form>
<P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>