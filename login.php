<?php 
session_start();

if($_POST['user']=="mlaz" && $_POST['pass']=="1234"){
    $_SESSION['user']="admin";
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Wrong Login'); location='index.php';</script>";
}
?>
