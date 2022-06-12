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
        }.dv2{
            margin-top:30px;
            margin-left:20%;
            background-color:white;
            width:60%;
            height:140px;
            padding-top:20px;
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
    </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="Cus_Home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
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
    <div class="dv2">
    <form back-ground-color:"gray" method="post" enctype="multipart/form-data">
        <label style="margin-left: 30%;" for="smname">Old Password :</label>
        <input type="password" style="margin-bottom: 10px;" id="smname" name="smmnm" required><br>
        <label style="margin-left: 30%;" for="quan"> New Password :</label>
        <input type="password" style="margin-bottom: 10px;" id="quan" name="quan"><br>
        <label style="margin-left: 30%;" for="prce">Confirm Password :</label>
        <input type="password" style="margin-bottom: 10px;" id="prce" name="prce"><br>
        <button class="cnt1" style="font-size: 15px;background-color: green; width :60%; padding: 5px;" name="Button">Change Password</button><br>
    </form>
    </div>
    <P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
    <?php
        include("connection.php");
        if(isset($_POST['Button'])){
            $old=$_POST['smmnm'];
            $confirm=$_POST['prce'];
            $new=$_POST['quan'];
            if($new==$confirm){
                $sql="select passwrd from details where passwrd='$old' and ID='$cuss'";
                $r=mysqli_query($con,$sql);
                if(mysqli_num_rows($r)>0){
                    $sql1="update details set passwrd='$new' where ID='$cuss'";
                    if(mysqli_query($con,$sql1)){
                        header('Location:Profile.php');
                    }
                }
                else{
                    echo "<p style='Font-size:25px;color:green;'>Password is wrong </p>";
                }
            }
            else{
                echo "<p style='Font-size:25px;color:green;'>Confirm Password and New password doesn't match</p>";
            }
        }
    ?>
</body>
</html>
