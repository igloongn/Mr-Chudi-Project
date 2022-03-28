<?php 
    session_start();
    if ($_SESSION['google_auth']==0) {
        header('Location: 2factor/index.php');
    }else{
        header('Location: forum/index.php');
    }

?>

