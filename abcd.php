<?php
    session_start();
    if($_SESSION['customer_login_status']!="Loged in" and (!isset($_SESSION['email']) and !isset($_SESSION['Mobile']))){
        header('Location:../Home.php');
    }
    if(isset($_GET['sign']) and $_GET['sign']=="out"){
        $_SESSION['customer_login_status']="Loged out";
        unset($_SESSION['email']);
        unset($_SESSION['Mobile']);
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
            height: 500px;
        }
    </style>
</head>
<body >
    <div class="dv1">
        <a href="Cus_home.php" style="background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="#" style="float:right;margin-top: 16px;font-size: 25px">
        <?php
            include("../connection.php");
            $cuss=$_SESSION['Mobile'];
            $sql="SELECT Fname FROM details WHERE (email='$cuss' or Mobile='$cuss')";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($r);
            $name=$row['Fname'];
            echo "$name |";
        ?></a>
    </div><br>
    <?php echo "<h1 style='text-align:center;color:gold;'> Product's of  $a</h1>" ?>
<?php
include("../connection.php");
    $query="SELECT * FROM mobile WHERE brand_name='$a'";
    $r = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($r)) {
        $nm=$row["mo_name"];
        $img=$row["img"];
        $f_cam=$row["f_camera"];
        $b_cam=$row["b_camera"];
        $dis=$row["display"];
        $des=$row["description"];
        $ram=$row["ram"];
        $price=$row["price"];
        echo "<div class='d1'>
            <img src='../Devices_img/$img' style='width:70%;height:180px;margin:10px 15% 5px;'>
            <h3>Model Name : $nm </h3>
            <h3>Front Camera : $f_cam </h3>
            <h3>Back Camera : $b_cam </h3>
            <h3>Display : $dis </h3>
            <h3>Ram : $ram</h3>
            <h3>Description : $des </h3>
            <h3>Price : $price</h3>
        </div> ";
    }
?>
<P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>