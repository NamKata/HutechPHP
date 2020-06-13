<?php
require_once("Config/db.class.php");
class Theloai{
    public static function Theloaicuatruyen($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT `theloai`.`IdTheloai`, `theloai`.`TenTheloai` FROM `theloai`, `theloaitruyen`,`manga` WHERE `theloai`.`IdTheloai`=`theloaitruyen`.`Theloai` and `theloaitruyen`.`Manga` =`manga`.`IdManga` AND `manga`.`IdManga` = $ma_truyen";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Theloaitruyen()
    {
        $db = new Db();
        $sql = "SELECT `theloai`.* FROM `theloai` ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    // public function savetheloaitruyen()
    // {
    //     $db = new Db();
    //     $sql = "INSERT INTO `theloaitruyen`(`Id`, `NgayTao`, `Manga`, `Theloai`) VALUES ([value-1],[value-2],[value-3],[value-4])";
    //     $result = $db->query_execute($sql);
    //     // var_dump($sql);die();
    //     return $result;
    // }
    public static function ExcludeSQLIdTheloai($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT * From theloai WHERE IdTheloai not IN (SELECT IdTheloai From theloai, theloaitruyen, manga WHERE theloaitruyen.Manga = manga.IdManga and theloai.IdTheloai =theloaitruyen.Theloai AND manga.IdManga = '$ma_truyen')";
        $result = $db->select_to_array($sql);
        return $result;
    }

}
?>