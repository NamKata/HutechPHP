<?php session_start(); 
if (isset($_SESSION['master'])){
    unset($_SESSION['master']); // xóa session login
    header("Location: index.php");
}
?>