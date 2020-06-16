<?php
require_once("Config/db.class.php");
class MangaMaster
{ 
    public static function DanhsachManga()
    {
        $db = new Db();
        $sql = "SELECT * FROM `manga` ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Tong()
    {
        $db = new Db();
        $sql = "SELECT count(*) as `Tong` FROM `manga` ";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function TongNot()
    {
        $db = new Db();
        $sql = "SELECT count(*) as `Tong` FROM `manga` WHERE `TinhTrang` ='0' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function TongIn()
    {
        $db = new Db();
        $sql = "SELECT count(*) as `Tong` FROM `manga` WHERE `TinhTrang` ='1' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function Theloaicuatruyen($ma_truyen)
    {
        $db = new Db();
        $sql = "SELECT `theloai`.`IdTheloai`, `theloai`.`TenTheloai` FROM `theloai`, `theloaitruyen`,`manga` WHERE `theloai`.`IdTheloai`=`theloaitruyen`.`Theloai` and `theloaitruyen`.`Manga` =`manga`.`IdManga` AND `manga`.`IdManga` = $ma_truyen";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Taomoi($TenManga, $TenKhac,$Slug,$TacGia,$NguoiDich,$GioiThieu,$NguoiDang,$Anh,$KieuTruyen)
    {
        $file_temp = $Anh['tmp_name'];
        $img_file = $Anh['name'];
        $filepath = "Images/Manga/ImageManga/".$img_file;
        $filepath1 = "../Images/Manga/ImageManga/".$img_file;
        if (move_uploaded_file($file_temp,$filepath1) == false)
        {
            return false;
        }
        $db = new Db();
        $sql = "INSERT INTO `manga`(`TenManga`, `TenKhac`, `Tacgia`, `NguoiDich`, `TinhTrang`, `GioiThieu`, `NguoiDang`, `Anh`, `Slug`, `KieuTruyen`) 
        VALUES ('$TenManga','$TenKhac','$TacGia','$NguoiDich','1','$GioiThieu','$NguoiDang','$filepath','$Slug','$KieuTruyen')";
        // $result = $db->query_execute($sql);
        $result = $db->insert_id($sql);
        return $result;
    }
    public static function ThongTinTruyen($IdMaTruyen)
    {
        $db = new Db();
        $sql = "SELECT manga.* FROM `manga` WHERE `IdManga` = '$IdMaTruyen' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Capnhapthongtin($IdManga,$TenManga,$Slug,$TenKhac,$Tacgia,$Nguoidich,$Anh,$KieuTruyen,$Gioithieu){
        if(empty($Anh))
        {
            $db = new Db();
            $sql = "UPDATE `manga` SET `TenManga`='$TenManga',`TenKhac`='$TenKhac',`Tacgia`='$Tacgia',`NguoiDich`='$Nguoidich',`GioiThieu`='$Gioithieu',`Slug`='$Slug',`KieuTruyen`='$KieuTruyen' WHERE `IdManga`='$IdManga'";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }else{
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/Manga/ImageManga/".$img_file;
            $filepath1 = "../Images/Manga/ImageManga/".$img_file;
            if (move_uploaded_file($file_temp,$filepath1) == false)
            {
                return false;
            }
            $db = new Db();
            $sql ="UPDATE `manga` SET `TenManga`='$TenManga',`TenKhac`='$TenKhac',`Tacgia`='$Tacgia',`NguoiDich`='$Nguoidich',`GioiThieu`='$Gioithieu',`Anh`='$filepath',`Slug`='$Slug',`KieuTruyen`='$KieuTruyen' WHERE `IdManga`='$IdManga'";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }
    }
    public static function XoaTruyen($Id)
    {
        $db = new Db();
        $sql = "DELETE FROM `theloaitruyen`WHERE `Manga` = '$Id'";
        $result = $db->query_execute($sql);
        if($result == true)
        {
            $sql1 = "DELETE FROM `manga` WHERE `IdManga`='$Id'";
            $result1 = $db->query_execute($sql1);
            return $result1;
        }
        else
        {
            return false;
        }
        
    }
    public static function HuyKichHoat($Id)
    {
        $db = new Db();
            $sql = "UPDATE `manga` SET `TinhTrang`='0' WHERE `IdManga`='$Id'";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
    }
      public static function KichHoat($Id)
    {
        $db = new Db();
            $sql = "UPDATE `manga` SET `TinhTrang`='1' WHERE `IdManga`='$Id'";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
    }
    public static function KiemTraDuocXoa($Id)
    {
        $db = new Db();
        $sql = "SELECT DISTINCT manga.* FROM `manga` , `chapter` WHERE manga.IdManga=chapter.Manga and manga.IdManga='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
