<html>
    <head>
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
                display: block;
                margin-left:auto;
                margin-right: auto;
            }
            .cnt{
                background-color: white;
                display : block;
                margin-right: 30%;
                margin-left: 30%;
                margin-top: 20px;
                border:2px solid blue;
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
            .cnt1{
                display : block;
                margin: 20px 32% 0px;
            }
        </style>
    </head>
    
    <body style="background-image: url('Back_images/img1.jpg')">
        <div class="dv1">
            <a href="Home.php" style="margin-left:40%;background-Color:yellowgreen;padding-right:10px;"><i>PremierGadget</i></a>
            <a href="Signin.php" style="float:right;color:gold;margin-top: 16px;font-size: 25px">Log in</a>
            <a href="Signup.php" style="float:right;color:gold;margin-top: 16px;font-size: 25px">Sign up|</a>
        </div>
        <div class="cnt"> 
            <form back-ground-color:"gray" action="" method="post" enctype="multipart/form-data">
                <h1 align="center" style="color:blue">Welcome to PremierGadget</h1>
                <p style="float:left;">
                    <hr style="margin-top: -10px;;width: 40%; text-align:center;margin-right: 30%;margin-left: 30%;"/>
                </p>
                <label class="cnt1" for="fn" align="center"><b>Your Name</b></label>
                <input style="margin:6px 30% -2px 34%;" type="text" id="fn" name="fname" required> 
                <label class="cnt1" for="eml" align="center"><b>Email</b></label>
                <input style="margin:6px 30% -2px 34%;" type="email" id="eml" name="moeml">
                <label class="cnt1" for="eml2" align="center"><b>Mobile number</b></label>
                <input style="margin:6px 30% -2px 34%;" type="text" id="eml2" name="moeml2">
                <label class="cnt1" for="pwd1" align="center"><b>Enter Password</b></label>
                <input style="margin:6px 30% -2px 34%;" type="password" id="pwd1" name="password1" required>
                <label class="cnt1" for="pwd2" align="center"><b>Confirm Password</b></label>
                <input style="margin:6px 30% -2px 34%;" type="password" id="pwd2" name="password2" required>
                <label class="cnt1" for="tha" align="center"><b>Thana</b></label>
                <input style="margin:6px 30% -2px 34%;" type="text" id="tha" name="thana">
                <label class="cnt1" for="ct" align="center"><b>City</b></label>
                <input style="margin:6px 30% -2px 34%;" type="text" id="ct" name="city">
                <label class="cnt1" for="code" align="center"><b>Postal Code</b></label>
                <input style="margin:6px 30% 30px 34%;" type="text" id="code" name="pscode">
                <label style="margin-left: 10%;margin-top:10px;font-size:20px;" for="pic">Upload Profile Picture  :</label>
                <input type="file" style="margin-bottom: 15px;" id="pic" name="pic1"><br>
                <div style="font-size:14px; border: 3.5px solid gray;height: 30px; width: 35%;margin-left: 3%;margin-top:20px ;padding: 1%;">
                    <input type="checkbox" id="rob" name="captcha">
                    i'm not a robot         reCAPTCHA
                </div><br>
                <input type="checkbox" id="tc" name="terms" <p>By creating an account you agree to our <a href="#" style="color:blue">Terms & Privacy</a>.</p>
                <button style="font-size: 12px;background-color: lightblue; width :40%; padding: 5px;margin: 10px 30%;" name="Button">Join for free</button>
                <p style="margin-left: 30%;"><a href="Signin.php" style="color:blue">Already have an account?Login</a></p>
            </form>
        </div>
        <P style="font-size:26px;;color:green;"><a href="Home.php" style="display:inline-block;margin: 60px 0 40px 26%;">PremierGadet</a> Copyright 2022-2022 Angsuman Barua Pritom</P>
    </body>
</html>
<?php
include("connection.php");
if(isset($_POST['Button'])){
    $fname=$_POST['fname'];
    $eml=$_POST['moeml'];
    $mbl=$_POST['moeml2'];
    $police=$_POST['thana'];
    $ct=$_POST['city'];
    $pscode=$_POST['pscode'];
    $img=$_FILES['pic1']['name'];
    $email_dup_ad;
    $email_dup_cus;
    $number_dup_ad;
    $number_dup_cus;
    if($eml==NULL && $mbl==NULL){
        echo "<p style='margin-top:-850px;font-size:21.5px;color:gold'>You must Enter Email Or Mobile for Sign Up</p>";
        return;
    }
    $fg=True;
    if($img==NULL){
        $img="profile_pic.jpg";
    }
    else{
        $fg=False;
        $ext=explode(".",$_FILES['pic1']['name']);
        $c=count($ext);
        $ext=$ext[$c-1];
        $dt=date("d/m/Y");
        $tm=date("h:i:s");
        $img_name=md5($dt.$tm.$fname);
        $img=$img_name.".".$ext;
    }
    if($eml!=NULL){
        $variable=$eml;
        $ad_email_dup = "select email from admin where email='$eml'";
        $cus_email_dup = "select email from details where email='$eml'";
        $email_dup_ad = $con->query($ad_email_dup);
        $email_dup_cus = $con->query($cus_email_dup);
    }
    if($mbl!=NULL){
        $variable=$mbl;
        $ad_number_dup = "select mobile from admin where mobile='$mbl'";
        $cus_number_dup = "select mobile from details where mobile='$mbl'";
        $number_dup_ad = $con->query($ad_number_dup);
        $number_dup_cus = $con->query($cus_number_dup);
    }
    $password12=$_POST['password1'];
    $password22=$_POST['password2'];
    if($password12==$password22 && isset($_POST['terms']) && $email_dup_ad->num_rows==0 && $email_dup_cus->num_rows==0 && $number_dup_ad->num_rows==0 && $number_dup_cus->num_rows==0){

        $query="insert into details(Fname,mobile,email,passwrd,City,Thana,Post_code,IMG) values('$fname','$mbl','$eml','$password12','$ct','$police','$pscode','$img')";
        if(!$fg){
            move_uploaded_file($_FILES['pic1']['tmp_name'],"Customer/Picture/$img");
        }
        if(mysqli_query($con,$query)){
            $var = 'Signup_tool.php?momel='.$variable ;
            echo "<script>window.location.href='".$var."'</script>";
        }
        else{
            echo "Failed".  mysqli_connect_errno();
        }
    }
    elseif(!isset($_POST['terms'])){
        echo "If you want to continue in our website you have to accept our terms and condition";
    }
    elseif($email_dup_ad->num_rows>0 || $email_dup_cus->num_rows>0){
        echo "This email is currently in use.You can't create more than one account using same email address";
    }
    elseif($number_dup_ad->num_rows>0 || $number_dup_cus->num_rows>0){
        echo "You can't create more than one account using same Mobile No";
    }
    else{
        echo "Password doesn't match";
    }
}
?>