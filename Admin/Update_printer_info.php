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
<?php
    $a=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobkichu</title>
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
            margin: 40px 30% 0px 30%;
            width: 40%;
            border: 2px solid black;
            height:200px;
            padding-top: 40px;
        }
    </style>
</head>
<body  style="background-color: powderblue;">
    <div class="dv1">
        <a href="admin_home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div><br>
    <div class="dv2">
        <?php 
            echo "<h2 style='margin-left: 29%;'> Update Information</h2>";
        ?>
        <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
            <label style="margin-left: 30%;" for="quan"> Quantity :</label>
            <input type="text" style="margin-bottom: 10px;" id="quan" name="quan"><br>
            <label style="margin-left: 30%;" for="prce">Price :</label>
            <input type="text" style="margin-bottom: 10px;" id="prce" name="prce"><br>
            <button style="margin-left:30% ;font-size: 15px;background-color: lightblue; width :40%; padding: 5px;" name="Button">Upload</button><br>
        </form>
    </div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['Button'])){
    $price=$_POST['prce'];
    $quan=$_POST['quan'];
    if($price==NULL){
        $price=0;
    }
    if($quan==NULL){
        $quan=0;
    }
    $query1="SELECT * FROM printer WHERE mo_name='$a'";
    $r1 = mysqli_query($con,$query1);
    if($r1->num_rows>0){
        $row = mysqli_fetch_array($r1);
        $prev_prc=$row["price"];
        $brand_name=$row["brand_name"];
        $price=$price+$prev_prc;
        $prev_quan=$row["quantity"];
        $quan=$quan+$prev_quan;
        if($price<0){
            echo "<p style='font-size:20px'>Price Cannot be Less Than ZERO </p>";
        }
        else{
            $query2 = "update printer set price =$price,quantity=$quan where mo_name='$a'";
            if(mysqli_query($con,$query2)){
                echo "<p style='color: green;'> Updated";
                header("Location:printer.php?id=$brand_name");
            }
        }
    }
    if($r1->num_rows==0){
        echo "<h1>No Device foumd </h1>";
    }
}
?>
</body>
</html>