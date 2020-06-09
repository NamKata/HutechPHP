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
    public $KieuTruyen;

    public function __construct( $TenManga, $Slug, $TenKhac, $Tacgia, $Nguoidich, $Tinhtrang, $Gioithieu, $Chuongcuoi,$IdUser,$Image, $KieuTruyen)
    {
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
        $this->KieuTruyen = $KieuTruyen;
    }
    public static function DanhsachManga()
    {
        $db = new Db();
        $sql = "SELECT * FROM manga";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function DanhSachMangaTheoIdUser($IdUser)
    {
        $db = new Db();
        $sql = "SELECT manga.* FROM `manga`,`user` WHERE `manga`.`NguoiDang` = `user`.`IdUser` and `user`.`IdUser`=$IdUser";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function DanhSachTimKiem($timkiem)
    {
        $db=new Db();
        $sql = "SELECT * FROM `manga` WHERE `TenManga` like '%$timkiem%'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function ChitietMangaa($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT * FROM `manga` WHERE `IdManga` = '$ma_truyen'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    // SELECT manga.IdManga FROM `manga` ORDER BY `manga`.`IdManga` DESC LIMIT 1 
    public static function LastId()
    {
        $db = new Db();
        $sql = "SELECT IdManga FROM `manga` ORDER BY `manga`.`IdManga` DESC LIMIT 1 ";
        $result = $db->query_execute($sql);
        return $result;
    }
    public function save(){
        $file_temp = $this->Image['tmp_name'];
        $img_file = $this->Image['name'];
        $filepath = "Images/Manga/ImageManga/".$img_file;
        if (move_uploaded_file($file_temp,$filepath) == false)
        {
             return false;
        }
        $db = new Db();
        $sql = "INSERT INTO `manga`(`TenManga`, `TenKhac`, `Tacgia`, `NguoiDich`, `TinhTrang`, `GioiThieu`, `ChuongCuoi`, `NguoiDang`, `Anh`, `Slug`, `KieuTruyen`) 
        VALUES ('$this->TenManga','$this->TenKhac','$this->Tacgia','$this->Nguoidich','$this->Tinhtrang','$this->Gioithieu','$this->Chuongcuoi','$this->IdUser','$filepath','$this->Slug','$this->KieuTruyen')";
        // $result = $db->query_execute($sql);
        $result = $db->insert_id($sql);
        return $result;
    }
    public static function Capnhapthongtin($IdManga,$TenManga,$Slug,$TenKhac,$Tacgia,$Nguoidich,$Anh,$KieuTruyen,$Gioithieu){
        if(empty($Anh))
        {
            $db = new Db();
            $sql = "UPDATE `manga` SET `TenManga`='$TenManga',`TenKhac`='$TenKhac',`Tacgia`='$Tacgia',`NguoiDich`='$Nguoidich',`GioiThieu`='$Gioithieu',`Slug`='$Slug',`KieuTruyen`='$KieuTruyen' WHERE `IdManga`='$IdManga'";
            // $result = $db->query_execute($sql);
            // var_dump($sql);
            $result = $db->query_execute($sql);
            // var_dump($result);die();
            return $result;
        }else{
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/Manga/".$img_file;
            if (move_uploaded_file($file_temp,$filepath) == false)
            {
                return false;
            }
            $db = new Db();
            $sql ="UPDATE `manga` SET `TenManga`='$TenManga',`TenKhac`='$TenKhac',`Tacgia`='$Tacgia',`NguoiDich`='$Nguoidich',`GioiThieu`='$Gioithieu',`Anh`='$filepath',`Slug`='$Slug',`KieuTruyen`='$KieuTruyen' WHERE `IdManga`='$IdManga'";
            // $result = $db->query_execute($sql);
            // var_dump($sql);
            $result = $db->query_execute($sql);
            // var_dump($result);die();
            return $result;
        }
    }
}
?>