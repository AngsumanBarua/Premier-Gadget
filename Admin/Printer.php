<?php
    session_start();
    $a=$_REQUEST['id'];
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
            width:40%;
            border: 2px solid;
            margin-bottom: 20px;
            margin-left: 30%;
            height: 660px;
        }
        .d2{
            height :100px;
            width : 30%;
            margin-left: 35%;
            background-color: white;
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
        h3{
            display:inline;
        }
    </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="admin_home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div><br>
    <?php echo "<h1 style='margin-top:40px;text-align:center;'> Product's of  $a</h1>" ?>
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
    <button style="margin-left:40%; margin-top:50px;margin-bottom:20px;font-size: 15px;background-color: blue; width :20%; padding: 5px;" name="Button1">ADD NEW DEVICE</button><br>
    <?php
        if(isset($_POST['Button1'])){
            header('Location:Upload_PRINTEr.php?dev='.$a);
        }
    ?>
    </form>
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
    <?php
include("connection.php");
    $query="SELECT * FROM printer WHERE brand_name='$a'";
    $r = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($r)) {
            $nm=$row["mo_name"];
            $img=$row["img"];
            $speed=$row["print_speed"];
            $resolution=$row["resolution"];
            $connet=$row["connectivity"];
            $sheet=$row["standard_sheet"];
            $war=$row["waranty"];
            $des=$row["description"];
            $price=$row["price"];
            $quan=$row["quantity"];
            echo "<div class='d1'>
                <img src='../Devices_img/$img' style='width:70%;height:180px;margin:10px 15% 5px;'>
                <h3 style='padding-left: 4%;color:green;'>Model Name : <h3 style='color:blue;'>$nm </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Print Speed : <h3 style='color:blue;'>$speed</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Resolution : <h3 style='color:blue;'>$resolution</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Connectivity : <h3 style='color:blue;'>$connet</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Standard Sheet : <h3 style='color:blue;'>$sheet</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Description : <h3 style='color:blue;'>$des </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>WARRANTY : <h3 style='color:blue;'>$war </h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>Price : <h3 style='color:blue;'>$price</h3></h3><br><br>
                <h3 style='padding-left: 4%;color:green;'>In Stock : <h3 style='color:blue;'>$quan</h3></h3><br><br>
            </div> ";
            ?><a class="updt" href="update_printer_info.php?id=<?php echo $nm ?>">UPDATE</a><?php
        }
?> 
</form>
</body>
</html>