<?php 
require_once("Config/db.class.php");
class OrderDetail{
    public static function XemChiTiet($Order)
    {
        $db =new Db();
        $sql ="SELECT * FROM `orderdetail` WHERE OrderId='$Order'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>