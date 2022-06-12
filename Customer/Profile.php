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
            height: 450px;
        }
        .cl{
            text-align: center;
        }
        .cl2{
            margin-top:300px;
            display:inline;
            margin-left:16%;
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
    <div style="margin-top:50px">
        <?php
include("../connection.php");
$img=$row['IMG'];
$name=$row['Fname'];
$lname=$row['Lname'];
$fullname=$name." ".$lname;
$city=$row['City'];
$thana=$row['Thana'];
        $eml=$row["email"];
        $mbl=$row["Mobile"];
        echo "<div class='d1'>
            <img src='Picture/$img' style='width:70%;height:200px;margin:10px 15% 5px;'>
            <h3 class='cl'>Customer Name : $fullname </h3>
            <h3 class='cl'>City : $city </h3>
            <h3 class='cl'>Thana : $thana </h3>
            <h3 class='cl'>Email : $eml </h3>
            <h3 class='cl'>Mobile : $mbl </h3>
            
        </div> ";
?>
    </div>
    <div class="cl2">
        <a class="b" style="font-size:20px;" href="change_pass.php">Change Password </a>
        <a class="b" style="margin-left:11%;font-size:20px;" href="Change_pic.php">Change New Profile Picture</a>
        <a class="b" style="margin-left:11%;font-size:20px;" href="Update_info.php">Update Information</a>
    </div>
    <div>
    </div>
    <P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>