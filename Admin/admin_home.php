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
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {background-color: blue}
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .glow {
            font-size: 80px;
            color: #fff;
            text-align: center;
            animation: glow 1s ease-in-out infinite alternate;
        }
        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
            }           
            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
            }
        }
    </style>
</head>
<body style="background-image: url('Back_images/img1.jpg')">
    <div class="dv1">
        <a href="admin_home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;color:gold;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="float:right;color:gold;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div><br>
    <div class="dropdown" style="margin:50px 5% 0;float: left;background-image: url('Back_images/phone.jpg');background-size: 100% 100%;">
        <ul>
            <li><h1 class="glow" style="padding-left:105%;padding-top:30%;font-size: 50px;color:green;">Mobile</h1>
                <ul class="dropdown-content">
                    <li>
                    <?php
                        include("connection.php");
                        $query="SELECT * FROM mobile_brand";
                        $rw=mysqli_query($con,$query);
                        while ($row = mysqli_fetch_array($rw)) {
                            $id=$row['brand_name']
                            ?><a href="Admin_device.php?id=<?php echo $row['brand_name'] ?>">
                            <?php
                                    echo $id;
                                ?>
                            </a>
                            <?php
                        }
                        ?><a href="Upload_mobile_brand.php">Upload New Brand</a><?php
                    ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="dropdown" style="margin-top:50px;margin-right: 5%;float: right;background-image: url('Back_images/download.jpg');background-size: 100% 100%;">
        <ul>
            <li><h1 class="glow" style="padding-left:95%;padding-top:30%;font-size: 50px;color:green;">Laptops</h1>
                <ul  class="dropdown-content">
                <li>
                <?php
                    include("connection.php");
                    $query="SELECT * FROM laptop_brand";
                    $rw=mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($rw)) {
                        $id=$row['brand_name']
                        ?><a href="laptop.php?id=<?php echo $row['brand_name'] ?>">
                        <?php
                            echo $id;
                        ?>
                        </a>
                        <?php
                    }
                    ?><a href="Upload_laptop_brand.php">Upload New Brand</a><?php
                    ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="dropdown" style="margin-left: 5%;margin-right: 5%;float: left;background-image: url('Back_images/desktop.jpg');background-size: 100% 100%;">
        <ul>
            <li><h1 class="glow" style="padding-left:80%;padding-top:25%;font-size: 50px;color:green;">Desktops</h1>
                <ul class="dropdown-content">
                <li>
                <?php
                    include("connection.php");
                    $query="SELECT * FROM desktop_brand";
                    $rw=mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($rw)) {
                        $id=$row['brand_name']
                        ?><a href="desktop.php?id=<?php echo $row['brand_name'] ?>">
                        <?php
                            echo $id;
                        ?>
                        </a>
                        <?php
                    }
                    ?><a href="Upload_desktop_brand.php">Upload New Brand</a><?php
                    ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="dropdown" style="margin-right: 5%;float: right;background-image: url('Back_images/headphone.jpg');background-size: 100% 100%;">
        <ul>
            <li><h1 class="glow" style="margin-top:70px;font-size: 50px;color:green;">Headphones & Headsets</h1>
                <ul class="dropdown-content">
                    <li>
                    <?php
                        include("connection.php");
                        $query="SELECT * FROM headphn_brand";
                        $rw=mysqli_query($con,$query);
                        while ($row = mysqli_fetch_array($rw)) {
                            $id=$row['brand_name']
                            ?><a href="Headphone.php?id=<?php echo $row['brand_name'] ?>">
                            <?php
                                    echo $id;
                                ?>
                            </a>
                            <?php
                        }
                        ?><a href="Upload_HEADPHONE_brand.php">Upload New Brand</a><?php
                    ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="dropdown" style="margin-left: 5%;margin-right: 50%;float: left;background-image: url('Back_images/printer.jpg');background-size: 100% 100%;">
        <ul>
            <li><h1 class="glow" style="padding-left:95%;padding-top:30%;font-size: 50px;color:green;">Printers</h1>
                <ul  class="dropdown-content">
                <li>
                <?php
                    include("connection.php");
                    $query="SELECT * FROM printer_brand";
                    $rw=mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($rw)) {
                        $id=$row['brand_name']
                        ?><a href="printer.php?id=<?php echo $row['brand_name'] ?>">
                        <?php
                            echo $id;
                        ?>
                        </a>
                        <?php
                    }
                    ?><a href="Upload_PRINTER_brand.php">Upload New Brand</a><?php
                    ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <P style="font-size:26px;;color:green;"><a href="admin_home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>