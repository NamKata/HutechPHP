<?php
require_once("/websitetruyen/Config/db.class.php");
class UserGroup
{
    public $id;
    public $TenGroup;
    public $NgayTaoGroup;

    public function __construct($id, $TenGroup, $NgayTaoGroup)
    {
        $this->id = $id;
        $this->TenGroup = $TenGroup;
        $this->NgayTaoGroup = $NgayTaoGroup;
    }
    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO usergroup (Id, TenGroup, NgayTaoGroup) VALUES
        ('$this->id','$this->TenGroup','$this->NgayTaoGroup')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public function edit($id,$TenGroup,$NgayTaoGroup)
    {
        $db = new Db();
        $sql = "UPDATE usergroup SET TenGroup =" +$TenGroup+", NgayTaoGroup ="+ $NgayTaoGroup +"WHERE Id ="+$id;
        $result = $db->query_execute($sql);
        return $result;
    }
    public function delete($id)
    {
        $db = new Db();
        $sql = "DELETE FROM usergroup WHERE Id ="+$id;
        $result = $db->query_execute($sql);
        if($result > 1)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public static function Danhsachusergroup()
    {
        $db = new Db();
        $sql = "SELECT * FROM usergroup";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function DanhSachTimKiem($timkiem)
    {
        $db=new Db();
        $sql = "SELECT * FROM usergroup WHERE TenGroup like '%$timkiem%'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>