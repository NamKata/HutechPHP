<?php 
include("Controller/Chap.class.php");
if(isset($_GET["machap"]))
{
    $id = $_GET["machap"];
    var_dump($id);
    $thongtin =ChapMaster::ThôngTinChuongTruyen($id);
    $thongtin = reset($thongtin);
    if($thongtin["TinhTrang"] == "0")
    {
        $result = ChapMaster::KichHoat($id);
        var_dump($result);
        if($result)
        {
            header("Location: kichhuychuong.php?matruyen=".$thongtin["Manga"]."&success");
        }
        else
        {
            header("Location: kichhuychuong.php?matruyen=".$thongtin["Manga"]."?404");
        }
    }
    else
    {
        $result = ChapMaster::HuyKichHoat($id);
        if($result)
        {
            header("Location: kichhuychuong.php?matruyen=".$thongtin["Manga"]."&success");
        }
        else
        {
            header("Location: kichhuychuong.php?matruyen=".$thongtin["Manga"]."?404");
        }
    }
}
?>