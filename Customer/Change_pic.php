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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .dv2{
            margin-top:30px;
            margin-left:20%;
            background-color:white;
            width:60%;
            height:100px;
        }
        .cnt1{
            display : block;
            margin-right: auto;
            margin-left: auto;
        }
        .im{
            /* border:2px solid black;
            border-radius: 8px;
            float:left;
            width :30%; */
            margin-left:50%;
            /* height :100px; */
        }
        .d1{
            background-color:white;
            float: left;
            width:40%;
            margin-bottom: 50px;
            margin-left: 30%;
            margin-right: 30%;
            height: 430px;
        }
        .cl{
            width:40%;
            margin-left:30%;
            margin-top:70px;
            margin-bottom:30px;
        }
        .b{
            margin-top:35px;
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>
<body style="background-color: powderblue;">
<div class="dv1">
        <a href="Cus_Home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;color:black;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Profile.php" style="float:right;color:black;margin-top: 16px;font-size: 25px">
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
    <div class='cl'> 
    <?php
        include("connection.php");
        $customer=$_SESSION['ID'];
        $sql="SELECT * FROM details WHERE ID='$customer'";
        $r=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($r);
        $img=$row['IMG'];
        echo "<img src='Picture/$img' style='width:70%;height:210px;margin:10px 15% 5px;'>";
    ?>
    </div>
    <form back-ground-color:"gray" method="post" enctype="multipart/form-data" >
    <label style="margin-left: 36%;margin-top:300px;font-size:20px;" for="pic">Upload New Profile Picture  :</label>
    <input type="file" style="margin-bottom: 10px;" id="pic" name="pic1" required><br>
    <button class="cnt1" style="font-size: 15px;background-color: green; width :30%; padding: 5px;" name="Button">Upload</button><br>
</form>
    <P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright (c) Angsuman Barua Pritom</P>
    <?php
        include("connection.php");
        $customer=$_SESSION['ID'];
        if(isset($_POST['Button'])){
            $ext=explode(".",$_FILES['pic1']['name']);
            $c=count($ext);
            $ext=$ext[$c-1];
            $dt=date("d/m/Y");
            $tm=date("h:i:s");
            $img_name=md5($dt.$tm.$customer);
            $img=$img_name.".".$ext;
            $qry="update details set IMG='$img' where ID= '$customer'";
            move_uploaded_file($_FILES['pic1']['tmp_name'],"Picture/$img");
            if(mysqli_query($con,$qry)){
                header('Location:Profile.php');
            }
        }
    ?>
</body>
</html>