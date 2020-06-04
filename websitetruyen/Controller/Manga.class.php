<?php
require_once("Config/db.class.php");
class Manga
{
    public $IdManga;
    public $TenManga;
    public $Slug;
    public $TenKhac;
    public $Tacgia;
    public $Nguoidich;
    public $Tinhtrang;
    public $Gioithieu;
    public $Chuongcuoi;
    public $IdUser;
    public $Image;

    public function __construct($IdManga, $TenManga, $Slug, $TenKhac, $Tacgia, $Nguoidich, $Tinhtrang, $Gioithieu, $Chuongcuoi,$IdUser,$Image)
    {
        $this->IdManga = $IdManga;
        $this->TenManga = $TenManga;
        $this->Slug = $Slug;
        $this->TenKhac = $TenKhac;
        $this->Tacgia = $Tacgia;
        $this->Nguoidich = $Nguoidich;
        $this->Tinhtrang = $Tinhtrang;
        $this->Gioithieu = $Gioithieu;
        $this->Chuongcuoi = $Chuongcuoi;
        $this->IdUser = $IdUser;
        $this->Image = $Image;
    }
    public static function DanhsachManga()
    {
        $db = new Db();
        $sql = "SELECT * FROM manga";
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