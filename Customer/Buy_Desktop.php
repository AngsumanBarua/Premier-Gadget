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
<?php
    $a=$_GET['id'];
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
        .d1{
            background-color:white;
            float: left;
            width:40%;
            border: 2px solid;
            margin : 30px 30% 20px;
            height:710px;
        }
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </style>
</head>
<body style="background-color: powderblue;">
<div class="dv1">
        <a href="Cus_home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
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
    <?php
include("../connection.php");
    $query="SELECT * FROM desktop WHERE mo_name='$a'";
    $r = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($r)) {
        $nm=$row["mo_name"];
        $img=$row["img"];
        $pro=$row["processor"];
        $mthbrd=$row["mother_board"];
        $grpscrd=$row["graphicsCard"];
        $ram=$row["ram"];
        $mse=$row["mouse"];
        $kbrd=$row["kbrd"];
        $mntr=$row["mntr"];
        $war=$row["waranty"];
        $price=$row["price"];
        $quan=$row["quantity"];
        echo "<div class='d1'>
            <img src='../Devices_img/$img' style='width:70%;height:180px;margin:10px 15% 5px;'>
            <h3 style='padding-left: 4%;'>Model Name : $nm </h3>
            <h3 style='padding-left: 4%;'>Processor : $pro </h3>
            <h3 style='padding-left: 4%;'>Motherboard : $mthbrd </h3>
            <h3 style='padding-left: 4%;'>Graphics Card : $grpscrd </h3>
            <h3 style='padding-left: 4%;'>Ram : $ram</h3>
            <h3 style='padding-left: 4%;'>Mouse : $mse</h3>
            <h3 style='padding-left: 4%;'>Key Board : $kbrd</h3>
            <h3 style='padding-left: 4%;'>Monitor : $mntr </h3>
            <h3 style='padding-left: 4%;'>WARRANTY : $war </h3>
            <h3 style='padding-left: 4%;'>Price : $price</h3>
        </div> ";
    }
?>
<form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
<label style="margin-left: 42%;font-size:25px" for="quan"> Quantity :</label>
<input id="quan" name="quan" id=demoInput type=number min=0 max=<?php echo $quan ?>>
<script>
function increment() {
    document.getElementById('demoInput').stepUp();
}
function decrement() {
    document.getElementById('demoInput').stepDown();
}
</script>
    <button style="margin-left:30%;margin-top:20px;font-size: 15px;background-color: green; width :40%; padding: 5px;" name="Button">Confirm Order</button><br>
</form>
<?php
    include("../connection.php");
    if(isset($_POST['Button'])){
        $total_quan=$_POST['quan'];
        $total_price=$total_quan*$price;
        $query="insert into ordr(cus_id,pr_model,somoi,tarik,confirm,quantity,price) values('$cuss','$a',TIME(NOW()),DATE(CURDATE()),'0','$total_quan','$total_price')";
        if(mysqli_query($con,$query)){
            echo "Your Product will be delivered Quickly";
        }
    }
?>
<P style="font-size:26px;color:red;"><a href="Cus_Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
</body>
</html>