<?php 
include("Controller/Manga.class.php");
if(isset($_GET["matruyen"]))
{
    $id = $_GET["matruyen"];
    var_dump($id);
    $thongtin =MangaMaster::ThongTinTruyen($id);
    $thongtin = reset($thongtin);
    if($thongtin["TinhTrang"] == "0")
    {
        $result = MangaMaster::KichHoat($id);
        var_dump($result);
        if($result)
        {
            header("Location: kichhuytruyen.php?success");
        }
        else
        {
            header("Location: kichhuytruyen.php?404");
        }
    }
    else
    {
        $result = MangaMaster::HuyKichHoat($id);
        if($result)
        {
            header("Location: kichhuytruyen.php?success");
        }
        else
        {
            header("Location: kichhuytruyen.php?404");
        }
    }
}
?>