<?php   
session_start(); 
include 'config/db.php';
$id = $_SESSION['id'];
$sql = "UPDATE users set google_auth = 0 where id = $id";
$query = mysqli_query($connection, $sql);

session_destroy();
header("location:index.php"); 
exit();
?>