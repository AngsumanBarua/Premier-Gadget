<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
        .cnt{
            background-color: white;
            display : block;
            margin:50px 25% 15px 33%;
            width: 30%;
            border: 15px solid purple;
            padding: 30px 20px;
            height: 300px;
        }
        .cnt1{
            display : block;
            margin-right: auto;
            margin-left: auto;
        }
        .cls{
            border: solid black;
            font-size:15px;
            text-align: center;
            width: 300px;
            display : block;
            margin-right: auto;
            margin-left: auto;
        }
        .cls1{
            background-color: red;
        }
        .cls2{
            background-color: gray;
        }
        .topnav-centered a {
            float: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body style="background-image: url('Back_images/img1.jpg')"> 
    <div class="dv1">
        <a href="Home.php" style="margin-left:40%;margin-top:10px;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadet</i></a>
        <a href="Signin.php" style="float:right;color:gold;margin-top: 16px;font-size: 25px">Log in</a>
        <a href="Signup.php" style="float:right;color:gold;margin-top: 16px;font-size: 25px">Sign up|</a>
    </div>
    <div class="cnt"> 
        <form  back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
            <h1 align="center" style="color:blue">Welcome Back</h1>
            <p style="float:left;">
                <hr style="margin-top: -10px;;width: 40%; text-align:center;margin-right: 30%;margin-left: 30%;"/>
            </p>
            <label class="cnt1" for="fn" align="center"><b>Email or Mobile Number</b></label>
            <input class="cnt1" style="margin:10px 30% 6px 28%;" type="text" id="fn" name="moeml" required>
            <label class="cnt1" for="pwd1" align="center"><b>Enter Password</b></label>
            <input class="cnt1" style="margin:10px 30% 6px 28%;" type="password" id="pwd1" name="password1" required>
            <br>
            <button class="cnt1" style="font-size: 15px;background-color: lightblue; width :60%; padding: 5px;" name="Button">Login</button><br>
            <a href="Signup.php" class="cnt1" style="color:blue;text-align:center">Don't have an account? Sign up</a>
        </form>
    </div>
    <P style="font-size:26px;color:green;"><a href="Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['Button'])){
    $customer=$_POST['moeml'];
    $passwrd=$_POST['password1'];
    $ad_info = "select email from admin where (email='$customer' or mobile='$customer') and passwrd='$passwrd'";
    $r=mysqli_query($con,$ad_info);
    $row=mysqli_fetch_array($r);
    if($row){
        $_SESSION['ID']=$row['email'];
        $_SESSION['admin_login_status']="Loged in";
        header('Location:Admin/admin_home.php');
    }
    else{
        $cus_info = "select * from details where (email='$customer' or Mobile='$customer') and passwrd='$passwrd'";
        $r=mysqli_query($con,$cus_info);
        $row=mysqli_fetch_array($r);

        $cus_info2 = "select * from details where (email='$customer' or Mobile='$customer')";
        $r2=mysqli_query($con,$cus_info2);
        $row2=mysqli_fetch_array($r2);

        $cus_info3 = "select * from details where (email='$customer' or Mobile='$customer') and passwrd is NULL";
        $r3=mysqli_query($con,$cus_info3);
        $row3=mysqli_fetch_array($r3);
        if($row){
            $_SESSION['ID']=$row['ID'];
            $_SESSION['customer_login_status']="Loged in";
            header('Location:Customer/Cus_Home.php');
        }
        else if($row3){
            echo "<p style='color:gold;font-size:60px;''>Sorry ! You are blocked from this website</p>";
        }
        else if($row2 && !$row){
            echo "<p style='color:gold;font-size:50px;''>Wrong Password</p>";
        }
        else if(!$row2){
            echo "<p style='color:gold;font-size:50px;''>This email or number haven't sigend up yet !</p>";
            echo "<p style='color:gold;font-size:50px;''>Go to <a style='color:gold;' href='Signup.php'>Sign Up</a> for open an account</p>";
        }
        
    }
    
}
?>