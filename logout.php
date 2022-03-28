<?php   
session_start(); 
include 'SignIn-SignUp-master/config/db.php';
$id = $_SESSION['id'];
$sql = "UPDATE users set google_auth = 0 where id = $id";
$query = mysqli_query($conn, $sql);

session_destroy();
header("location:home.php"); 
exit();
?>