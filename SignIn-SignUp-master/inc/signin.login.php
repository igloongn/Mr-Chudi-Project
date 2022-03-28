<?php
session_start();
include '../config/db.php';

// This is for SIgnUp
if (isset($_POST['reg_username'])) {
    $username = $_POST['reg_username'];
    $email = $_POST['reg_email'];
    $password = $_POST['reg_password'];
    $role = $_POST['role'];

    date_default_timezone_set('Europe/London');
    $datestamp = date('m/d/Y h:i:s a', time());
    
    
    // $datestamp = date("Y-m-d H:i:s");


    $sql = "SELECT * FROM users  WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        mysqli_error($conn);
    }
    // This Occurs when the Query is a success
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        header('location: ../index.php?msg_php=Email already in use');
    } else {
        // This is where the creation of the New User Occurs


        // This is the command that hash the password
        $enc_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "insert into users (role, username, email, password, created) values ('$role', '$username', '$email', '$enc_password', '$datestamp')";
        $query = mysqli_query($conn, $query);
        if (!$query) {
            die (mysqli_error($conn));
        } else {
            // This is Where we make use of the Email Sender

            // This is the first Level of Authentication
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
            $_SESSION['date'] = $datestamp;

            require "../email/Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            // This is for the Sender
            $mail->Username = 'kingpeace12345@gmail.com';
            $mail->Password = 'Temitope1234';

            // This is for the Client/Reciever
            $mail->setFrom('email account', 'OTP Verification');
            $mail->addAddress($_POST["reg_email"]);

            $mail->isHTML(true);
            $mail->Subject = "Your verification code";
            $mail->Body = "Dear user, We received your request for a verification code</p>
            <h3>Your verify OTP code is $otp <br></h3>
            <br><br>
            <p>With regrads,</p>
            <b>...................</b>";
            if (!$mail->send()) {
                header('location: ../index.php?msg_php=Please use a Valid Email');

            } else {
                // echo $email . " Check your Email for the OTP code";
                $_SESSION['status'] = 2;
                $_SESSION['session_title']='Dummy_TExt';
                header("location: ../email/verification.php");
            }
        }
    }
}


// This is for the Login
if (isset($_POST['login_email'])) {
    $email = $_POST['login_email'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = $_POST['login_password'];
    $password = mysqli_real_escape_string($conn, $password);

     // Check if user  exist in the database
     $query = "SELECT * FROM `users` WHERE email='$email'";

     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("Error in query" . mysqli_error($conn));
     }
     $verification = mysqli_num_rows($result);
     // Converts $query to boolean
 
     if ($verification !== 1) {
        header('location: ../index.php?login_php=User Does Not Exist');

     } else {
         if ($row = mysqli_fetch_assoc($result)) {
             $hashedPwdCheck = password_verify($password, $row['password']);
             if ($hashedPwdCheck == false) {
                 header('location: ../index.php?login_php=Invalid Password');
             } elseif ($hashedPwdCheck == true) {
                 //Logs the user in
                 $_SESSION['id'] = $row['id'];
                 $_SESSION['username'] = $row['username'];
                 $_SESSION['email'] = $row['email'];
                 // $_SESSION['password'] = $row['password'];
                 $_SESSION['status'] = $row['status'];
                 $_SESSION['google_auth'] = 0;
                 $_SESSION['role'] = $row['role'];
 
                //  Login Successful
                header('location: ../../2factor/index.php');
 
             }
         }
     }


}
