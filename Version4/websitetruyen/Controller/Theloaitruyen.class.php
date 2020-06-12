<?php
require_once("Config/db.class.php");
class Theloaitruyen{
    public $Manga_id;
    public $Theloai_id;
    public function __construct($Manga_id,$Theloai_id)
    {
        $this->Manga_id = $Manga_id;
        $this->Theloai_id = $Theloai_id;
    }
    // public function Theloaitruyen(){

    // }
    // public function getMangaId()
    // {
    //     return $this->Manga_id;
    // }
    // public function setMangaId($Manga_id)
    // {
    //     $this->Manga_id=$Manga_id;
    // }
    // public function getTheloaiId()
    // {
    //     return $this->Theloai_id;
    // }
    // public function setTheloaiId($Theloai_id)
    // {
    //     $this->Theloai_id=$Theloai_id;
    // }

    public function savetheloaitruyen()
    {
        $db = new Db();
        $sql = "INSERT INTO `theloaitruyen`(`Manga`, `Theloai`,`NgayTao`) VALUES ('$this->Manga_id','$this->Theloai_id','20/10/2020')";
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
        // $result = $db->select_to_array($sql);
        // var_dump($result);die();
        return $result;
    }
}
?>