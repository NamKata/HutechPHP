<?php
include_once("header.php");
?>
<?php 
include("Controller/Usergroup.class.php");
$update = false;
$xoa = false;
if(isset($_POST['save']))
{
    $Nhom = $_POST["nhom"];
    $taomoi = GroupMaster::Taomoi($Nhom);
    if(!$taomoi)
    {
        ?><script>alert("Tạo mới thất bại");</script> <?php
    }
    else
    {
        header("Location:tblnhom.php?success");
    }
}
if(isset($_GET['edit']))
{
    $id = $_GET["edit"];
    $update = true;
    $thontin = GroupMaster::ThongTinNhom($id);
    $thongtin = reset($thontin);
}
if(isset($_GET['xoa']))
{
    $id = $_GET["xoa"];
    $update = false;
    $xoa=true;
    $thontin = GroupMaster::ThongTinNhom($id);
    $thongtin = reset($thontin);
}
if(isset($_POST['update']))
{
    $nhomcapnhap = $_POST["nhom"];
    $ngaytaocapnhap = $_POST["ngaytao"];
    $idcapnhap = $_GET["edit"];
    // var_dump($idcapnhap);
    // var_dump($ngaytaocapnhap);
    // var_dump($nhomcapnhap);
    $capnhap = GroupMaster::CapnhapNhom($idcapnhap,$nhomcapnhap,$ngaytaocapnhap);
    // var_dump($capnhap);die();
    if(!$capnhap)
    {
      ?><script>alert("Cập nhập thất bại");</script> <?php
    }
    else
    {
        header("Location:tblnhom.php?update");
    }
}
if(isset($_POST['xoa']))
{
    $idxoa= $_GET["xoa"];
    $kiemtraduocxoa= GroupMaster::KiemTraDuocXoa($idxoa);
    if(mysqli_num_rows($kiemtraduocxoa)>=1)
    {
       header("Location:tblnhom.php?notxoa");
    }
    else
    {
        $xoa = GroupMaster::XoaNhom($idxoa);
        if(!$xoa)
        {
        ?><script>alert("Xóa thất bại");</script> <?php
        }
        else
        {
            header("Location:tblnhom.php?xoa");
        }
    }
}
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb" style="font-family: Arial, Helvetica, sans-serif;">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="index.php">Trang Chủ</a>
                </li>
                <li>
                    Bảng
                </li>
                <li>Nhóm Người Dùng</li>
                <li class="active"> Tạo mới</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>
        <div class="page-content">
        <style>
form {
    width: 50%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 600px;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
form>button.btn {
    padding: 10px;
    font-size: 16px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}
.msg {
    margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}
</style>
            <form method="post">
             <?php 
                if($xoa == true && $update ==false){
            ?>
             <div class="input-group">
                    <label>Tên Nhóm</label>
                    <input type="text" name="nhom" value="<?php echo $thongtin["TenGroup"] ?>">
                </div>
                 <div class="input-group">
                    <label>Ngày Tạo</label>
                    <input type="date" name="ngaytao" value="<?php echo $thongtin["NgayTaoGroup"] ?>">
                </div>
            	<button class="btn" type="submit" name="xoa" style="background: #556B2F;" >Xóa</button>
            <?php }
                else if($update == false && $xoa == false){ ?>
                <div class="input-group">
                    <label>Tên Nhóm</label>
                    <input type="text" name="nhom" value="<?php echo isset($_POST["nhom"]) ? $_POST["nhom"] : ""; ?>">
                </div>
                <div class="input-group">
                    <button class="btn" type="submit" name="save" >Tạo mới</button>
                </div>
            <?php } else {?>
                <div class="input-group">
                    <label>Tên Nhóm</label>
                    <input type="text" name="nhom" value="<?php echo $thongtin["TenGroup"] ?>">
                </div>
                 <div class="input-group">
                    <label>Ngày Tạo</label>
                    <input type="date" name="ngaytao" value="<?php echo $thongtin["NgayTaoGroup"] ?>">
                </div>
            	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php }
            ?>
           
            </form>
        </div>
    </div>
</div>
<?php
include_once("footer.php");
?>