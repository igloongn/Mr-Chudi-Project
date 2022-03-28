
<?php 
    session_start();
    if(isset($_POST["email"])){
    include('../../include/db.inc.php');
        $email = $_POST["email"];

        $sql = mysqli_query($connection, "SELECT * FROM `signup` WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
        //  echo $email.' not found';
         echo 1;
        }else if($fetch["status"] == 0){
            // echo $email.' Not Verified';
            echo 2;
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "../Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='kingpeace12345@gmail.com';
            $mail->Password='Temitope1234';

            // send by h-hotel email
            $mail->setFrom('kingpeace12345@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);


            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/justphp/Andrew's%20Blog/email/reset_psw.php
            <br><br>";

            if(!$mail->send()){
            //    echo 'Invalid Email';
               echo 3;
            }else{
                // echo "Success";
                echo 4;
                // echo $token;
           
            }
        }
    }


?>
