<?php 
declare(strict_types=1);
session_start();
if ($_SESSION['status']==0) {
    header('location: ../SignIn-SignUp-master/email/verification.php?msg=Please do well to Verify your Account with OTP sent to Your Email');    
}if ($_SESSION['google_auth']==1) {
    header('location: ../dashboard.php');    
}
// include '../assets/layouts/header.php';

include '../SignIn-SignUp-master/config/db.php';
include 'vendor/autoload.php';
    // print_r($_SESSION);
    $secret = 'XVQ2UIGO75XRUKJO';
    
    $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
    // echo 'Current Code is  ::  ';
    $g->getCode($secret);
    
    
    // if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $pass_code = $_POST['passcode'];
        // echo $pass_code;
        // echo '<br>';
        // echo '<br>';
        // echo "Check if $pass_code is valid: ";
        
        echo '<br>';
        if ($g->checkCode($secret, $pass_code)) {
            $user_id = $_SESSION['id'] ;
            
            $sql = "UPDATE users SET google_auth = 1 where id = '$user_id'";
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                echo 'Error in Something '.mysqli_error($conn);
            } else {
                $_SESSION['google_auth']=1;
                header('Location: ../dashboard.php');
            }
        } else {

            // echo ('This is the $auth_status  '.$_SESSION['authenticated']);
            echo'No';
        }
        echo '<br>';
        
        $new_secret = $g->generateSecret();
        echo "Get a new Secret: $new_secret \n";
        echo "The QR Code for this secret (to scan with the Google Authenticator App: \n";
        
        
        
        // <?php
        // session_start();
        // session_destroy();
        // echo 'You have been logged out. <a href="/">Go back</a>';


    }
    
    

    $QR_CODE= \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('Mr Chudi\'s App', $secret, 'Google Auth');
    echo "\n";  
    echo '<br>';
    echo '<br>';
    // echo $QR_CODE;
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<title>2Factor_Auth</title>
</head>
<body class="text-center">
    
    
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
                <div class="mb-5 brand-logo text-center">
                    <img src="<?php echo $QR_CODE ?>">
                </div>
            
                <h4>Two Factor Aunthentication Using Google Authentication</h4>

                <form class="pt-3" method="post" action="index.php">
                <div class="form-group">
                    <input type="text"  name="passcode" class="form-control form-control-lg"  placeholder="Enter Code">
                </div>
                <div class="mt-3">
                    <button type="submit" name="two-factor" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SUBMIT</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>



<?php 
    // include '../assets/layouts/footer.php'

?>