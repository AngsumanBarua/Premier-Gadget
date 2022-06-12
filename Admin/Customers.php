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
            margin-left: 10%;
            background-color:white;
        }
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="admin_home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div><br>
    <p style="text-align:center;font-size:40px;color:black">Customer Lists</p>
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
    <table class="dd">
        <tr>
            <th>Customer ID</th>
            <th>Customer Full Name</th>
            <th>Customer Thana</th>
            <th>Customer Post Code</th>
            <th>Customer City</th>
            <th>Customer Email</th>
            <th>Customer Mobile</th>
            <th>BLOCK</th>
        </tr>
            <?php
                include("connection.php");
                $query="SELECT * FROM details order by ID";
                $rw=mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($rw)) {
                    $pass=$row['passwrd'];
                    if($pass==null){
                        continue;
                    }
                    $id=$row['ID'];
                    $fname=$row['Fname'];
                    $lname=$row['Lname'];
                    $city=$row['City'];
                    $thana=$row['Thana'];
                    $pst_cd=$row['Post_code'];
                    $eml=$row['email'];
                    $mbl=$row['Mobile'];
                    echo "<tr>
                        <td>$id</td> 
                        <td>$fname.$lname</td>
                        <td>$thana</td>
                        <td>$pst_cd</td>
                        <td>$city</td>
                        <td>$eml</td>
                        <td>$mbl</td>
                        <td><b><a style='color:black' href='Block.php?id=$id'> Block</a></b></td>
                    </tr>";
                }
            ?>
    </table>
    </form>
    <P style="font-size:26px;;color:green;"><a href="admin_home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>