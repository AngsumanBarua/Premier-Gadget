<?php
    session_start();
    include("connection.php");
    $customer=$_GET['momel'];
    $ad_info = "select ID from details where (email='$customer' or mobile='$customer')";
    $r=mysqli_query($con,$ad_info);
    $row=mysqli_fetch_array($r);
    $_SESSION['ID']=$row['ID'];
    $_SESSION['customer_login_status']="Loged in";
    header('Location:Customer/Cus_Home.php');
?>