<?php 
include("Controller/Order.class.php");
if(isset($_GET["mahoadon"]))
{
    $id = $_GET["mahoadon"];
    $xoa = OrderMaster::Xoa($id);
    if($xoa)
    {
        header("Location: tblhoadon.php?success");
    }
    else
    {
        header("Location: tblhoadon.php?404");
    }
}
?>