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
    $a=$_GET['dev'];
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
                height:530px;
            }
        </style>
</head>
<body style="background-color: powderblue;">
    <div class="dv1">
        <a href="Home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Admin_profile.php" style="float:right;margin-top: 16px;font-size: 25px">ADMIN|</a>
    </div>
    <div class="dv2">
        <?php 
            echo "<h2 style='margin-left: 33%;'> Upload $a's new device</h2>";
        ?>
        <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
            <label style="margin-left: 30%;" for="smname">Model Name :</label>
            <input type="text" style="margin-bottom: 10px;" id="smname" name="smmnm" required><br>
            <label style="margin-left: 30%;" for="sm">Upload Image  :</label>
            <input type="file" style="margin-bottom: 10px;" id="sm" name="smmbl" required><br>
            <label style="margin-left: 30%;" for="smfc">Processor  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smfc" name="smmfc" required><br>
            <label style="margin-left: 30%;" for="smbc">Motherboard  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smbc" name="smmbc" required><br>
            <label style="margin-left: 30%;" for="smd">Graphics Card  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smd" name="smmd" required><br>
            <label style="margin-left: 30%;" for="smr">Ram  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smr" name="smmr" required><br>
            <label style="margin-left: 30%;" for="ims">Mouse  :</label>
            <input type="text" style="margin-bottom: 10px;" id="ims" name="ms" required><br>
            <label style="margin-left: 30%;" for="imkbd">Keyboard  :</label>
            <input type="text" style="margin-bottom: 10px;" id="imkbd" name="kbd" required><br>
            <label style="margin-left: 30%;" for="imtr">Monitor  :</label>
            <input type="text" style="margin-bottom: 10px;" id="imtr" name="mntr" required><br>
            <label style="margin-left: 30%;" for="spr">Price  :</label>
            <input type="text" style="margin-bottom: 10px;" id="spr" name="smpr" required><br>
            <label style="margin-left: 30%;" for="sq">Quantity  :</label>
            <input type="text" style="margin-bottom: 10px;" id="sq" name="smq" required><br>
            <label style="margin-left: 30%;" for="smdes">Warranty  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smdes" name="smmwar" required><br>
            <button style="margin-left:30% ;font-size: 15px;background-color: lightblue; width :40%; padding: 5px;" name="Button">Upload</button><br>
        </form>
    </div>
</body>
</html>
<?php
include("connection.php");
if(isset($_POST['Button'])){
    $name=$_POST['smmnm'];
    $pro=$_POST['smmfc'];
    $mtrbrd=$_POST['smmbc'];
    $graprd=$_POST['smmd'];
    $mse=$_POST['ms'];
    $keybrd=$_POST['kbd'];
    $mntr=$_POST['mntr'];
    $ram=$_POST['smmr'];
    $price=$_POST['smpr'];
    $quan=$_POST['smq'];
    $war=$_POST['smmwar'];
    $ext=explode(".",$_FILES['smmbl']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];
    $img=$name.".".$ext;
    $query="INSERT INTO desktop(brand_name,mo_name,processor,mother_board,graphicsCard,ram,mouse,kbrd,mntr,img,waranty,price,quantity) VALUES('$a','$name','$pro','$mtrbrd','$graprd','$ram','$mse','$keybrd','$mntr','$img',' $war','$price','$quan')";
    if(mysqli_query($con,$query)){
        move_uploaded_file($_FILES['smmbl']['tmp_name'],"../Devices_img/$img");
        echo "Succesfully inserted";
    }
    else{
        echo "Error";
    }
}
?>