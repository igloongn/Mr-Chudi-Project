<!DOCTYPE html>
<?php
session_start();
// print_r($_SESSION);
if (isset($_SESSION['google_auth'])) {
    header('location: ../dashboard.php');
} else {
    ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
    ></script>
    <title>Sign in & Sign up Form</title>
    <style>
      .radio-part{
        margin: 25px;
        size: 10px;
      }
    </style>
  </head>
  <body>
    <div class="containerr">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="inc/signin.login.php" method='POST' class="sign-up-form justify-content-start">
            <h2 class="title">Sign In</h2>
            <?php
            if (isset($_GET['login_php'])) {
              echo '<div class="alert alert-warning w-100">'.$_GET['login_php'].'</div>';
            }?>            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email Here" name="login_email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password Here" name="login_password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          <form action="inc/signin.login.php" method="POST" class="sign-in-form" id="thaform">
            <h2 class="title">Sign up</h2>
            <?php
            if (isset($_GET['msg_php'])) {
              echo '<div class="alert alert-warning w-100">'.$_GET['msg_php'].'</div>';
            }?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="reg_username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="reg_email" required/>
            </div>
            <!-- The Role of the User -->
            <div class = 'radio-part'>
              <label for="role">Roles:</label>

              <select class="form-select form-select-lg mb-3 w-75" aria-label=".form-select-lg example" id="role" name="role" required>
                <option value="" selected>Choose Role</option>
                <option value="admin">Admin (Super)</option>
                <option value="user">User(Normal)</option>
                <option value="readonly">User(Read-Only)</option>
              </select>
            </div>
            <!-- End of Role -->

            <div id='notmatch' class="w-100"></div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="reg_password" id="password" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="confirm_reg_password" required id="cpassword"/>
            </div>
            <input type="submit" class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Already Have an Account</h3>
            <p>
              Click the Button below to Login in with your verified Account
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Login
            </button>
          </div>
          <img src="assets/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Sign up</h3>
            <p>
              You can Sign Up if you dont have an Account with us
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="assets/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/custom-jquery.js"></script>
  </body>
</html>

<?php
}
?>
