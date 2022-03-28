<?php
    session_start();
    if(isset($_POST["reset"])){
        include "../../include/db.inc.php";
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];
        
        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connection, "SELECT * FROM `signup` WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            $ifsql = mysqli_query($connection, "UPDATE `signup` SET password='$new_pass' WHERE email='$Email'");
            if (!$ifsql) {
                die("error on connection ".mysqli_error($connection));
            }

            // echo 'Password Reset';
            ?>
            
            <script>
                window.location.replace("../../passwordpass.php");
                alert("<?php echo "Your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            echo 'Please try again';
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>