<?php 
require_once("Config/db.class.php");
class SanphamMaster{
    public static function Danhsachsanpham()
    {
         $db = new Db();
        $sql = "SELECT * FROM `product`";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Tong()
    {
         $db = new Db();
        $sql = "SELECT count(*) as `Tong` FROM `product`";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function ThongTin($IdUser)
    {
        $db = new Db();
        $sql = "SELECT * FROM `product` WHERE `ProductId` = '$IdUser' ";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function Taomoi($TenSanPham,$Gia,$LuotDang,$GioiThieu,$Anh)
    {
        // var_dump($Anh);die();
        if(empty($Anh))
        {
            $db = new Db();
            $sql = "INSERT INTO `product`( `TenSanpham`, `Noidung`, `Gia`,  `LuotDang`) VALUES ('$TenSanPham','$GioiThieu','$Gia','$LuotDang')";
            // var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }else
        {
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/Product/".$img_file;
            $filepath1 = "../Images/Product/".$img_file;
            if (move_uploaded_file($file_temp,$filepath1) == false)
            {
                return false;
            }
            else
            {
                $db = new Db();
               $sql = "INSERT INTO `product`( `TenSanpham`, `Noidung`, `Gia`, `Anh`,  `LuotDang`) VALUES ('$TenSanPham','$GioiThieu','$Gia','$filepath','$LuotDang')";
                // var_dump($sql);die();
                $result = $db->query_execute($sql);
                return $result;
            }

        }
    }
    public static function Capnhap($Id,$TenSanPham,$Gia,$LuotDang,$GioiThieu,$Anh)
    {
         if(empty($Anh))
        {
            $db = new Db();
            $sql = "UPDATE `product` SET `TenSanpham`='$TenSanPham',`Noidung`='$GioiThieu',`Gia`='$Gia',`LuotDang`='$LuotDang' WHERE `ProductId`='$Id'";
            //  var_dump($sql);die();
            $result = $db->query_execute($sql);
            return $result;
        }
        else
        {
            $file_temp = $Anh['tmp_name'];
            $img_file = $Anh['name'];
            $filepath = "Images/Product/".$img_file;
            $filepath1 = "../Images/Product/".$img_file;
            if (move_uploaded_file($file_temp,$filepath1) == false)
            {
                return false;
            }
            else
            {
                $db = new Db();
                $sql = "UPDATE `product` SET `TenSanpham`='$TenSanPham',`Noidung`='$GioiThieu',`Gia`='$Gia',`LuotDang`='$LuotDang',`Anh`='$filepath' WHERE `ProductId`='$Id'";
                // var_dump($sql);die();
                $result = $db->query_execute($sql);
                return $result;
            }
        }
    }
    public static function Xoa($Id)
    {
        $db = new Db();
        $sql = "DELETE FROM `product` WHERE `ProductId`='$Id'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>