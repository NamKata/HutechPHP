<?php session_start(); 
 include("Controller/User.class.php");
if (isset($_SESSION['user'])){
    $ngaygiovietnam= new DateTimeZone('Asia/Ho_Chi_Minh');
    $ngay = new DateTime;
    $ngay->setTimezone($ngaygiovietnam);
    $ngaygio = $ngay->format('y-m-d H-i-s');
    $capnhap = User::Capnhapdangnhaplancuoi($_SESSION["user"],$ngaygio);
    unset($_SESSION['user']); // xóa session login
    header("Location: home.php");
}
?>
