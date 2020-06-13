<?php
require_once("Config/db.class.php");
class User
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
    public function DangKy()
    {
        $db = new Db();
        $sql = "INSERT INTO `user`(`Username`, `Email`, `Password`, `NgayDangKy`, `DangNhapLanCuoi`, `UserGroup`) 
        VALUES ('$this->UserName','$this->Email','$this->Password','$this->NgayDangKy','$this->DangNhapLanCuoi','2')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function KiemTraDangKy($UserName)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`Username` = '$UserName' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function LayIdNgDung($UserName, $Password)
    {
       $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`Username` = '$UserName' AND `user`.`Password` = '$Password'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function ThongTinNguoiDung($IdUser)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`IdUser` = '$IdUser'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function KiemTraDangNhap($UserName, $Password)
    {
        $db = new Db();
        $sql = "SELECT * FROM `user` WHERE `user`.`Username` = '$UserName' AND `user`.`Password` = '$Password'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function Capnhapdangnhaplancuoi($IdUser,$ngay)
    {
        $db = new Db();
        $sql = "UPDATE `user` SET `DangNhapLanCuoi`='$ngay' WHERE `IdUser`='$IdUser'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function Capnhapthongtin($IdUser,$HoTen,$NgaySinh,$Sdt,$DiaChi,$GioiTinh,$Anh,$Password){
        if(empty($Anh))
        {
            $db = new Db();
            $sql = "UPDATE `user` SET `HoTen`='$HoTen',`NgaySinh`='$NgaySinh',`Sdt`='$Sdt',`DiaChi`='$DiaChi',`GioiTinh`='$GioiTinh' WHERE `IdUser`='$IdUser' and `Password`='$Password'";
            // $result = $db->query_execute($sql);
            $result = $db->query_execute($sql);
            return $result;
        }else{
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/User/".$img_file;
            if (move_uploaded_file($file_temp,$filepath) == false)
            {
                return false;
            }
            $db = new Db();
            $sql = "UPDATE `user` SET `HoTen`='$HoTen',`NgaySinh`='$NgaySinh',`Sdt`='$Sdt',`DiaChi`='$DiaChi',`Anh`='$filepath',`GioiTinh`='$GioiTinh' WHERE `IdUser`='$IdUser' and `Password`='$Password'";
            // $result = $db->query_execute($sql);
            $result = $db->query_execute($sql);
            return $result;
        }
    }
    public static function Capnhapmatkhau($IdUser,$Password)
    {
        $db = new Db();
        $sql = "UPDATE `user` SET `Password`='$Password' WHERE `IdUser`='$IdUser'";
        $result = $db->query_execute($sql);
        return $result;
    }
  
}
?>