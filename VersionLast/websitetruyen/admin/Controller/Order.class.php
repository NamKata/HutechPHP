<?php 
require_once("Config/db.class.php");
class OrderMaster{
    public static function Danhsach()
    {
        $db =new Db();
        $sql ="SELECT * FROM `order`";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function Tong()
    {
        $db =new Db();
        $sql ="SELECT count(*) as `Tong` FROM `order`";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Xoa($id)
    {
        $db =new Db();
        $sql = "DELETE FROM `orderdetail` WHERE `OrderId` = '$id'";
        $result = $db->query_execute($sql);
        if($result == true)
        {
            $sql1 ="DELETE FROM `order` WHERE OrderId ='$id'";
            $result1 = $db->query_execute($sql1);
            return $result1;
        }
        return false;
    }
}
?>