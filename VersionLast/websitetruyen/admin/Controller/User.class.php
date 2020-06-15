<?php
require_once("Config/db.class.php");
class UserMaster
{
    public $UserName;
    public $Email;
    public $Password;
    public $DangNhapLanCuoi;
    public $NgayDangKy;
    public $MaGroup;

    public function __construct ($UserName, $Email, $Password, $DangNhapLanCuoi,$NgayDangKy, $MaGroup)
    {
        $this->UserName = $UserName;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->DangNhapLanCuoi = $DangNhapLanCuoi;
        $this->NgayDangKy = $NgayDangKy;
        $this->MaGroup = $MaGroup;
    }
    public static function KiemTraDangNhapMaster($UserName, $Password)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`Username` = '$UserName' AND `user`.`Password` = '$Password' AND `user`.`UserGroup` = '1' ";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function LayIdNgDung($UserName, $Password)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`Username` = '$UserName' AND `user`.`Password` = '$Password'";
        $result = $db->select_to_array($sql);
        return $result;
    }
     public static function ThongTin($IdUser)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`IdUser` = '$IdUser' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function DanhsachNguoidung()
    {
         $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`UserGroup` != '1' and `user`.`UserGroup` !='3'  ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Tong()
    {
         $db = new Db();
        $sql = "SELECT count(*) as `Tong` FROM `user` WHERE `user`.`UserGroup` != '1' and `user`.`UserGroup` !='3'  ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Taomoi($UserName,$Email,$Password,$HoTen,$GioiTinh,$NgaySinh,$DiaChi,$Sdt,$Anh)
    {
        // var_dump($Anh);die();
        if(empty($Anh))
        {
            $db = new Db();
            $sql = "INSERT INTO `user`( `Username`, `Email`, `Password`,  `UserGroup`, `HoTen`, `NgaySinh`, `Sdt`, `DiaChi`, `GioiTinh`) VALUES ('$UserName','$Email','$Password','2','$HoTen','$NgaySinh','$Sdt','$DiaChi','$GioiTinh')";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }else
        {
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/User/".$img_file;
            $filepath1 = "../Images/User/".$img_file;
            if (move_uploaded_file($file_temp,$filepath1) == false)
            {
                return false;
            }
            else
            {
                $db = new Db();
                $sql = "INSERT INTO `user`( `Username`, `Email`, `Password`,  `UserGroup`, `HoTen`, `NgaySinh`, `Sdt`, `DiaChi`, `Anh`, `GioiTinh`) VALUES ('$UserName','$Email','$Password','2','$HoTen','$NgaySinh','$Sdt','$DiaChi','$filepath','$GioiTinh')";
                // var_dump($sql);die();
                $result = $db->query_execute($sql);
                return $result;
            }

        }
    }
    public static function Capnhapnguoidung($Id,$Tentk,$Email,$HoTen,$Ngsinh,$Gioitinh,$sdt,$DiaChi,$Soluottao,$ngaydangky,$Anh)
    {
         if(empty($Anh))
        {
            $db = new Db();
            $sql = "UPDATE `user` SET `Username`='$Tentk',`Email`='$Email',`NgayDangKy`='$ngaydangky',`HoTen`='$HoTen',`NgaySinh`='$Ngsinh',`Sdt`='$sdt',`DiaChi`='$DiaChi',`GioiTinh`='$Gioitinh',`SoluotTao`='$Soluottao' WHERE `IdUser`='$Id'";
            //  var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }
        else
        {
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/User/".$img_file;
            $filepath1 = "../Images/User/".$img_file;
            if (move_uploaded_file($file_temp,$filepath1) == false)
            {
                return false;
            }
            else
            {
                $db = new Db();
                $sql = "UPDATE `user` SET `Username`='$Tentk',`Email`='$Email',`NgayDangKy`='$ngaydangky',`HoTen`='$HoTen',`NgaySinh`='$Ngsinh',`Sdt`='$sdt',`DiaChi`='$DiaChi',`Anh`='$filepath',`GioiTinh`='$Gioitinh',`SoluotTao`='$Soluottao' WHERE `IdUser`='$Id'";
                // var_dump($sql);die();
                $result = $db->query_execute($sql);
                return $result;
            }
        }
    }
    public static function Xoanguoidung($Id)
    {
        $db = new Db();
        $sql = "DELETE FROM `user` WHERE `IdUser`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function KiemTraDuocXoa($Id)
    {
        $db = new Db();
        $sql = "SELECT DISTINCT manga.* FROM `manga`,`user` WHERE `manga`.`NguoiDang`=`user`.`IdUser` and `user`.`IdUser`= '$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>