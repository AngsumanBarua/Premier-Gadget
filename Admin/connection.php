<?php
    $con = mysqli_connect("localhost","root","","premiergadget");
    if (mysqli_connect_errno()) {
        echo "Failed to Connect" . mysqli_connect_errno();
    }
?>