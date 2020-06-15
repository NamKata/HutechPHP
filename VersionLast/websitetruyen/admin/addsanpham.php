<?php
include_once("header.php");
?>
<?php
include("Controller/Sanpham.class.php");

$update = false;
$xoa = false;
if (isset($_POST['taomoi'])) {
    $TenSanpham = $_POST["Tensanpham"];
    $Gia = $_POST["Gia"];
    $LuotDang = $_POST["LuotDang"];
    $Noidung = $_POST["Noidung"];
    if ($_FILES['Images']['error'] > 0) {
        $Anh = "";
    } else {
        $Anh = $_FILES["Images"];
    }
    // var_dump($_FILES["Images"]);die();
    $taomoi = SanphamMaster::Taomoi($TenSanpham, $Gia, $LuotDang, $Noidung, $Anh);
    if (!$taomoi) {
?>
        <script>
            alert("Tạo mới thất bại");
        </script>
    <?php
    } else {
        header("Location:tblsanpham.php?success");
    }
}
if (isset($_GET['edit'])) {
    $id = $_GET["edit"];
    $update = true;
    $thontin = SanphamMaster::ThongTin($id);
    $thongtin = reset($thontin);
}
if (isset($_GET['xoa'])) {
    $id = $_GET["xoa"];
    $update = false;
    $xoa = true;
    $thontin = SanphamMaster::ThongTin($id);
    $thongtin = reset($thontin);
}
if (isset($_POST['update'])) {
    $TenSanphamcapnhap = $_POST["Tensanpham"];
    $Giacapnhap = $_POST["Gia"];
    $LuotDangcapnhap = $_POST["LuotDang"];
    $Noidungcapnhap = $_POST["Noidung"];
    if ($_FILES['Images']['error'] > 0) {
        $Anhcapnhap = "";
    } else {
        $Anhcapnhap = $_FILES["Images"];
    }
    $idcapnhap = $_GET["edit"];
    $capnhap = SanphamMaster::Capnhap($idcapnhap, $TenSanphamcapnhap, $Giacapnhap, $LuotDangcapnhap, $Noidungcapnhap, $Anhcapnhap);
    // var_dump($capnhap);die();
    if (!$capnhap) {
    ?><script>
            alert("Cập nhập thất bại");
        </script> <?php
                } else {
                    header("Location:tblsanpham.php?update");
                }
            }
            if (isset($_POST['xoa'])) {
                $idxoa = $_GET["xoa"];

                $xoa = SanphamMaster::Xoa($idxoa);
                if (!$xoa) {
                    ?><script>
            alert("Xóa thất bại");
        </script> <?php
                } else {
                    header("Location:tblsanpham.php?xoa");
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
                <li>Sản phẩm</li>
                <li class="active"> Tạo mới</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>
        <style>
            .form-horizontal {
                width: 100%;
                text-align: left;
                padding: 20px;
                border: 1px solid #bbbbbb;
                border-radius: 5px;
                display: flex;
            }

            .form-horizontal .bentrai {
                width: 20%;
                display: block;
            }

            .form-horizontal .bentrai img {
                width: 150px;
                height: 150px;
                border: 2px solid #bbbbbb;
                border-radius: 100px;
                text-align: center;
                margin-left: 5px;
            }

            .form-horizontal .bentrai button {
                margin-top: 5px;
                color: burlywood;
                border: 1px solid #bbbbbb;
                border-radius: 5px;
                margin-left: 22%;
                font-size: 16px;
            }

            .form-horizontal .benphai {
                width: 80%;
                border: 1px solid #bbbbbb;
                border-radius: 5px;
            }

            .form-horizontal .benphai .form-group {
                margin: 20px auto;
            }
        </style>
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal" method="POST" role="form" enctype="multipart/form-data">
                        <?php
                        if ($xoa == true && $update == false) {
                        ?>
                            <div class="bentrai">
                                <img id="ImageManga" src="<?php echo "../" . $thongtin["Anh"] ?>" alt=""> <br />
                                <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                                <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                            </div>
                            <div class="benphai">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Sản phẩm </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tensanpham" value="<?php echo $thongtin["TenSanpham"] ?>" placeholder="Tên Sản phẩm" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="Gia" value="<?php echo $thongtin["Gia"] ?>" placeholder="Giá" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lượt Tạo </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="LuotDang" value="<?php echo $thongtin["LuotDang"] ?>" placeholder="Lượt Đăng" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Noidung"><?php echo $thongtin["Noidung"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group center">
                                    <button style="text-align: center;" type="submit" name="xoa" class="btn btn-group-sm btn-lg">Xóa</button>
                                </div>
                            </div>
                        <?php } else if ($update == false && $xoa == false) { ?>
                            <div class="bentrai">
                                <img id="ImageManga" src="/websitetruyen/Images/User/d.png" alt=""> <br />
                                <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                                <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                            </div>
                            <div class="benphai">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Sản phẩm </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tensanpham" value="<?php echo isset($_POST["Tensanpham"]) ? $_POST["Tensanpham"] : ""; ?>" placeholder="Tên Sản phẩm" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="Gia" value="<?php echo isset($_POST["Gia"]) ? $_POST["Gia"] : ""; ?>" placeholder="Giá" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lượt Tạo </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="LuotDang" value="<?php echo isset($_POST["LuotDang"]) ? $_POST["LuotDang"] : ""; ?>" placeholder="Mật khẩu" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Noidung" value="<?php echo isset($_POST["Noidung"]) ? $_POST["Noidung"] : ""; ?>"></textarea>
                                    </div>
                                </div>

                                <div class="form-group center">
                                    <button style="text-align: center;" type="submit" name="taomoi" class="btn btn-group-sm btn-lg">Tạo mới</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="bentrai">
                                <img id="ImageManga" src="<?php echo "../" . $thongtin["Anh"] ?>" alt=""> <br />
                                <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                                <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                            </div>
                            <div class="benphai">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Sản phẩm </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tensanpham" value="<?php echo $thongtin["TenSanpham"] ?>" placeholder="Tên Sản phẩm" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="Gia" value="<?php echo $thongtin["Gia"] ?>" placeholder="Giá" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Lượt Tạo </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="form-field-1" name="LuotDang" value="<?php echo $thongtin["LuotDang"] ?>" placeholder="Lượt Đăng" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Noidung"><?php echo $thongtin["Noidung"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group center">
                                    <button style="text-align: center;" type="submit" name="update" class="btn btn-group-sm btn-lg">Cập nhập</button>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/websitetruyen/admin/assets/js/jquery-2.1.4.min.js"></script>
<script>
    $("#clickFile").click(function() {
        $("#Images").click();
    });

    function img_pathUrl(input) {
        // $('#ImageManga')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        $("#ImageManga")[0].src = URL.createObjectURL(event.target.files[0]);
    }
</script>
<?php
include_once("footer.php");
?>