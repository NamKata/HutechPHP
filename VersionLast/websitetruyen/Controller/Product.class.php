<?php
require_once("Config/db.class.php");
class Product{
    public static function DanhsachProduct()
    {
        $db = new Db();
        $sql = "SELECT * FROM product ORDER BY NgayTao DESC";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function ThongtinProduct($IdProduct)
    {
        $db = new Db();
        $sql = "SELECT * FROM product WHERE ProductId = '$IdProduct'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}

?>