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
    <title>Upload</title>
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
                background-color:white;
                margin: 40px 20% 0px 20%;
                width: 60%;
                border: 1px solid black;
                padding-top: 100px;
                height:300px;
            }
        </style>
</head>
<body style="background-image: url('Back_images/img1.jpg')">
    <div class="dv1">
        <a href="admin_home.php" style="background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="color:gold;float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="color:gold;float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div>
    <div class="dv2">
        <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
            <label style="margin-left: 30%;" for="smname">Brand Name :</label>
            <input type="text" style="margin-bottom: 10px;" id="smname" name="smmnm" required><br>
            <button style="margin-left:30% ;font-size: 15px;background-color: lightblue; width :40%; padding: 5px;" name="Button">Upload</button><br>
        </form>
    </div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['Button'])){
    $name=$_POST['smmnm'];
    $query="INSERT INTO headphn_brand(brand_name) VALUES('$name')";
    if(mysqli_query($con,$query)){
        header('Location:admin_home.php');
    }
    else{
        echo "Error";
    }
}
?>