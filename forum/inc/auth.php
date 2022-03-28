<?php
    if ($_SESSION['google_auth'] == 0) {
        header('Location: ../2factor/index.php');
    }
    if (!isset($_SESSION['google_auth'])) {
        header('Location: ../SignIn-SignUp-master/index.php');
    }

?>
