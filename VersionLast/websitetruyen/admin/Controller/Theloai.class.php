<?php
require_once("Config/db.class.php");
class TheloaiMaster
{ 
    public static function DanhsachTheloai()
    {
        $db = new Db();
        $sql = "SELECT * FROM `theloai` ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Taomoi($TenTheLoai,$Slug,$Content)
    {
        $db = new Db();
        $sql = "INSERT INTO `theloai`(`TenTheloai`, `Slug`, `Content`) VALUES ('$TenTheLoai','$Slug','$Content')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function ThongTinTheLoai($Id)
    {
        $db = new Db();
        $sql = "SELECT * FROM `theloai` WHERE `theloai`.`IdTheloai` = '$Id' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function CapnhapTheloai($Id,$TenTheLoai,$Slug,$Content,$Ngaytao)
    {
        $db = new Db();
        $sql = "UPDATE `theloai` SET `TenTheloai`='$TenTheLoai',`Slug`='$Slug',`Content`='$Content',`NgayTao`='$Ngaytao' WHERE `IdTheloai`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function XoaTheloai($Id)
    {
        $db = new Db();
        $sql = "DELETE FROM `theloai` WHERE `IdTheloai`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function KiemTraDuocXoa($Id)
    {
        $db = new Db();
        $sql = "SELECT DISTINCT manga.* FROM manga, theloaitruyen, theloai WHERE manga.IdManga=theloaitruyen.Manga and theloaitruyen.Theloai = theloai.IdTheloai and theloaitruyen.Theloai = '$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function ExcludeSQLIdTheloai($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT * From theloai WHERE IdTheloai not IN (SELECT IdTheloai From theloai, theloaitruyen, manga WHERE theloaitruyen.Manga = manga.IdManga and theloai.IdTheloai =theloaitruyen.Theloai AND manga.IdManga = '$ma_truyen')";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>