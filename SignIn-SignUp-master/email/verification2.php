
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/styleNEW.css">

    <script src="scripts.js" defer></script>
</head>
<body>

    <form action="backend/verBackend.php" method="POST" name="verifyForm" id="vform">
        <div class="">
            <div class="card center spacer">
                <h1 class="title text-center">Check Your Email</h1>
                <div class="mute-paragraph text-center">
                    We have sent you a password recover instructions to your email.
                </div>
                <div id="valertS" class=" " style="font-size: large; font-weight: 700;"></div>
                <div id="valertW" class=" " style="font-size: large; font-weight: 700;"></div>
                    <div class="form-group row">
                                    <label for="email_address" class="col-md-6 col-form-label text-md-right">OTP Code</label>
                                    <br>
                                    <div class="col-md-6">
                                        <input type="text" id="otp" maxlength="6" minlength="6" class="form-control" name="otp_code" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="verify" class="btn btn-primary verifysubmit">Verify</button>
                    </div>


            </div>


        </div>

        <div class="redirect">
            Did not receive the email? Check your spam filter, or &nbsp;
            <a href="forgot-password.html" class="link">try another email address</a>
        </div>
    </form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


</body>
</html>
