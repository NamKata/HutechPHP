<?php
require_once("Config/db.class.php");
class OrderDetail{
    public static function TaoMoiChiTietHoaDon($OrderId,$ProductId,$Quantity){
        $db = new Db();
        $sql = "INSERT INTO `orderdetail`(`OrderId`, `ProductId`, `Quantity`) VALUES ('$OrderId','$ProductId','$Quantity')";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>