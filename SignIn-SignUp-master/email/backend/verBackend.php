<?php 
session_start();

    include('../../config/db.php');
    if(isset($_POST["otp_code"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['email'];
        $otp_code = $_POST['otp_code'];
        // $_SESSION['otp_test'] = $_POST['otp_code'];

        if($otp != $otp_code){

              echo "Invalid OTP code";
            header('location: ../verification.php?msg=Invalid OTP code');


        }else{
            mysqli_query($conn, "UPDATE users SET status = 1 WHERE email = '$email'");
                $_SESSION['otp']='';
                // echo "Verfiy account done, you may sign in now";
                $_SESSION['status'] = 1;
                header('location: ../../index.php?msg=Verlidation Success');
        }

    }
?>
