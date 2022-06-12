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
        }
    </style>
</head>
<body style="background-color: powderblue;">
<div class="dv1">
        <a href="Cus_Home.php" style="margin-left: 40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
        <a href="?sign=out" style="float:right;margin-top: 16px;font-size: 25px">Log out</a>
        <a href="Profile.php" style="float:right;margin-top: 16px;font-size: 25px">
        <?php
            include("connection.php");
            $customer=$_SESSION['ID'];
            $sql="SELECT * FROM details WHERE (ID='$customer')";
            $r=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($r);
            $id=$row['ID'];
            $name=$row['Fname'];
            $Lname=$row['Lname'];
            $City = $row['City'];
            $thana = $row['Thana'];
            $post_code=$row['Post_code'];
            $email=$row['email'];
            $mobile=$row['Mobile'];
            echo "$name |";
            ?></a>
    </div><br>
    <div style="margin-top : 50px;">
    <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
            <label style="margin-left: 30%;font-size: 25px;" for="fname">First name :</label>
            <input type="text" style="margin-bottom: 10px;" id="fname" name="smmnm1" value='<?php echo $name ?>'><br>
            <label style="margin-left: 30%;font-size: 25px" for="lname">Last name :</label>
            <input type="text" style="margin-bottom: 10px;" id="lname" name="smmnm2" value=<?php echo $Lname ?>><br>
            <label style="margin-left: 30%;font-size: 25px" for="ct">City  :</label>
            <input type="text" style="margin-bottom: 10px;" id="ct" name="ct1" value=<?php echo $City ?>><br>
            <label style="margin-left: 30%;font-size: 25px" for="tn">Thana  :</label>
            <input type="text" style="margin-bottom: 10px;" id="tn" name="tn1" value=<?php echo $thana ?>><br>
            <label style="margin-left: 30%;font-size: 25px" for="smd">Post Code  :</label>
            <input type="text" style="margin-bottom: 10px;" id="smd" name="smmd" value=<?php echo $post_code ?>><br>
            <label style="margin-left: 30%;font-size: 25px" for="emil">Change Email :</label>
            <input type="email" style="margin-bottom: 10px;" id="emil" name="emil" value=<?php echo $email ?>><br>
            <label style="margin-left: 30%;font-size: 25px" for="mbln">Change Mobile Number  :</label>
            <input type="text" style="margin-bottom: 10px;" id="mbln" name="mbln" value=<?php echo $mobile ?>><br>
            <button style="margin-left:30% ;margin-top:10px;font-size: 15px;background-color: green; width :40%; padding: 5px;" name="Button">Upload</button><br>
    </form>
    </div>
    <?php
        include("connection.php");
        if(isset($_POST['Button'])){ 
            $fname=$_POST['smmnm1'];
            $lname=$_POST['smmnm2'];
            $city=$_POST['ct1'];
            $thana=$_POST['tn1'];
            $pstcd=$_POST['smmd'];
            $emll=$_POST['emil'];
            $mbll=$_POST['mbln'];
            $fg1=true;
            if($emll!=$row['email']){
                $fg1=false;
                $cus_email_dup = "select email from details where email='$emll'";
                $email_dup_cus = $con->query($cus_email_dup); 
            }
            $fg2=true;
            if($mbll!=$row['Mobile']){
                $fg2=false;
                $cus_number_dup = "select mobile from details where mobile='$mbll'";
                $number_dup_cus = $con->query($cus_number_dup);
            }
            if($fg1){
                $emll=$row['email'];
            }
            if($fg2){
                $mbll=$row['Mobile'];
            }
            if((!$fg1 && $email_dup_cus->num_rows>0)){
                echo "This Email you enterd is already in use";
            }
            else if(!$fg2 && $number_dup_cus->num_rows>0){
                echo "This Mobile Number you enterd is already in use";
            }
            else{
            $qry="update details set Fname='$fname',Lname='$lname',City='$city',Thana='$thana',Post_code='$pstcd',email='$emll',Mobile='$mbll' where ID= $customer";
             if(mysqli_query($con,$qry)){
                echo "successfullu updated!";
             }
            else{
                echo "failed";
            }
        }
        
            
            
            
        }
    ?>
</body>
</html>