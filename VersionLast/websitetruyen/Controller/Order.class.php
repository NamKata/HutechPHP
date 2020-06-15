<?php
require_once("Config/db.class.php");
class Order{
    public static function TaoMoiHoaDon($UserId,$PhuongThucThanhToan,$Status, $SoTien){
        $db = new Db();
        $sql = "INSERT INTO `order`(`UserId`, `Phuongthucthanhtoan`,`Status`, `Sotien`) VALUES ('$UserId','$PhuongThucThanhToan','$Status','$SoTien')";
        $result = $db->insert_id($sql);
        return $result;
    }
}
?>