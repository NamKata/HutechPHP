<?php
require_once("Config/db.class.php");
class TheloaitruyenMaster{
    public static function TaoMoi($IdManga,$Theloai)
    {
        $ngaygiovietnam= new DateTimeZone('Asia/Ho_Chi_Minh');
        $ngay = new DateTime;
        $ngay->setTimezone($ngaygiovietnam);
        $ngaygio = $ngay->format('y-m-d H-i-s');
        $db = new Db();
        $sql = "INSERT INTO `theloaitruyen`(`Manga`, `Theloai`,`NgayTao`) VALUES ('$IdManga','$Theloai','$ngaygio')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function Danhsachtheloaitruyen($IdManga)
    {
        $db=new Db();
        $sql = "SELECT * FROM `theloaitruyen`,`manga`,`theloai` where `theloaitruyen`.`Manga` = `manga`.`IdManga`AND `theloai`.`IdTheloai` = `theloaitruyen`.`Theloai` AND `manga`.`IdManga` = '$IdManga'";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function LayMaTheloai($IdManga)
    {
        $db=new Db();
        $sql = "SELECT `theloai`.`IdTheloai` FROM `theloaitruyen`,`manga`,`theloai` where `theloaitruyen`.`Manga` = `manga`.`IdManga`AND `theloai`.`IdTheloai` = `theloaitruyen`.`Theloai` AND `manga`.`IdManga` = '$IdManga'";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function LayTheloaicanXoa($IdManga, $ma_theloai)
    {
        $db=new Db();
        $sql = "SELECT `theloaitruyen`.`Theloai` FROM `theloaitruyen` WHERE `theloaitruyen`.`Theloai` NOT IN ($ma_theloai) AND `theloaitruyen`.`Manga`='$IdManga'";
        $result = $db->select_to_array($sql);
        // var_dump($result);die();
        return $result;
    }
    public static function XoaTheloai($IdManga,$ma_theloai)
    {
        $db = new Db();
        $sql = "DELETE FROM `theloaitruyen` WHERE `theloaitruyen`.`Manga` = '$IdManga' and `theloaitruyen`.`Theloai` IN (SELECT `theloaitruyen`.`Theloai` FROM `theloaitruyen` WHERE `theloaitruyen`.`Theloai` NOT IN ($ma_theloai) AND `theloaitruyen`.`Manga`='$IdManga')";
        // $sql = "SELECT `theloaitruyen`.`Theloai` FROM `theloaitruyen` WHERE `theloaitruyen`.`Theloai` NOT IN ($ma_theloai) AND `theloaitruyen`.`Manga`='$IdManga'";
        // var_dump($sql);die();
        $result = $db->query_execute($sql);
        return $result;
    }
}

?>