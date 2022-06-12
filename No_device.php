<?php
    session_start();
    if($_SESSION['customer_login_status']!="Loged in" and (!isset($_SESSION['email']) and !isset($_SESSION['Mobile']))){
        header('Location:Home.php');
    }
    if(isset($_GET['sign']) and $_GET['sign']=="out"){
        $_SESSION['customer_login_status']="Loged out";
        unset($_SESSION['email']);
        unset($_SESSION['Mobile']);
        header('Location:Home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NO Device</title>
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
            margin-top: 96px;
            width:100%;
            height : 370px;
        }
        .dv2 h2{
            text-align: center;
            /* margin-left: auto;
            margin-right:auto; */
        }
    </style>
</head>
<body  style="background-color: powderblue;">
    <div class="dv1">
        <a href="Home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="signin.php" style="float:right;margin-top: 16px;font-size: 25px">Log in</a>
        <a href="signup.php" style="float:right;margin-top: 16px;font-size: 25px">Sign up|</a>
    </div><br>
    <h1 style="margin-top:120px;margin-left:30%;">You must <a href="signup.php">Sign Up </a> or <a href="signin.php">Sign in</a> to see our products</h1>
    <P style="font-size:26px;color:green;"><a href="Cus_Home.php" style="display:inline-block;margin: 260px 0 40px 29%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>