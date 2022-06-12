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
    <title>Deplkgbvvmrtbhmtmbh</title>
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
            border: 1px solid;
            /* margin-bottom: 20px; */
            margin-left: 30%;
            height: 550px;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
    include("connection.php");
    $sql="SELECT * FROM ordr WHERE ordr_no='$a'";
    $r=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($r);
    $name=$row['pr_model'];
    $quan=$row['quantity'];
    $query2 = "update ordr set CONFIRM =1 where ordr_no=$a";
    if(mysqli_query($con,$query2)){
        $mbl = "select * from mobile where mo_name='$name'";
        $r1 = mysqli_query($con,$mbl);
        if($row1 = mysqli_fetch_array($r1)){
            $pre_quan=$row1['quantity'];
            $pre_quan-=$quan;
            $query3 = "update mobile set quantity=$pre_quan where mo_name='$name'";
            mysqli_query($con,$query3);
            header("Location:Admin_profile.php");
        }
        $lptop = "select * from laptop where mo_name='$name'";
        $r1 = mysqli_query($con,$lptop);
        if($row1 = mysqli_fetch_array($r1)){
            $pre_quan=$row1['quantity'];
            $pre_quan-=$quan;
            $query3 = "update laptop set quantity=$pre_quan where mo_name='$name'";
            mysqli_query($con,$query3);
            header("Location:Admin_profile.php");
        }
        $dstop = "select * from desktop where mo_name='$name'";
        $r1 = mysqli_query($con,$dstop);
        if($row1 = mysqli_fetch_array($r1)){
            $pre_quan=$row1['quantity'];
            $pre_quan-=$quan;
            $query3 = "update desktop set quantity=$pre_quan where mo_name='$name'";
            mysqli_query($con,$query3);
            header("Location:Admin_profile.php");
        }
        $prntr = "select * from printer where mo_name='$name'";
        $r1 = mysqli_query($con,$prntr);
        if($row1 = mysqli_fetch_array($r1)){
            $pre_quan=$row1['quantity'];
            $pre_quan-=$quan;
            $query3 = "update printer set quantity=$pre_quan where mo_name='$name'";
            mysqli_query($con,$query3);
            header("Location:Admin_profile.php");
        }
        $headphn= "select * from  headphn where mo_name='$name'";
        $r1 = mysqli_query($con,$headphn);
        if($row1 = mysqli_fetch_array($r1)){
            $pre_quan=$row1['quantity'];
            $pre_quan-=$quan;
            $query3 = "update headphn set quantity=$pre_quan where mo_name='$name'";
            mysqli_query($con,$query3);
            header("Location:Admin_profile.php");
        }
    }
?>