<?php
require_once("Config/db.class.php");
class GroupMaster
{ 
    public static function DanhsachNhom()
    {
        $db = new Db();
        $sql = "SELECT * FROM `usergroup` ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Taomoi($Nhom)
    {
        $db = new Db();
        $sql = "INSERT INTO `usergroup`(`TenGroup`) VALUES ('$Nhom')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function ThongTinNhom($Id)
    {
        $db = new Db();
        $sql = "SELECT * FROM `usergroup` WHERE `usergroup`.`Id` = '$Id' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function CapnhapNhom($Id,$Nhom,$Ngaytao)
    {
        $db = new Db();
        $sql = "UPDATE `usergroup` SET `TenGroup`='$Nhom',`NgayTaoGroup`='$Ngaytao' WHERE `Id`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function XoaNhom($Id)
    {
        $db = new Db();
        $sql = "DELETE FROM `usergroup` WHERE `Id`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function KiemTraDuocXoa($Id)
    {
        $db = new Db();
        $sql = "SELECT * FROM `usergroup`,`user` WHERE `usergroup`.`Id`=`user`.`UserGroup` and `usergroup`.`Id`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>