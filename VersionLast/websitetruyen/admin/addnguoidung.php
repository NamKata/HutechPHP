<?php
include_once("header.php");
?>
<?php
// include("Controller/User.class.php");

$update = false;
$xoa = false;
if (isset($_POST['taomoi'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = md5($password);
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    // var_dump($gioitinh);
    $ngaysinh = $_POST["ngaysinh"];
    $sdt = $_POST["sdt"];
    $diachi = $_POST["diachi"];
    if ($_FILES['Images']['error'] > 0) {
        $Anh = "";
    } else {
        $Anh = $_FILES["Images"];
    }
    // var_dump($_FILES["Images"]);die();
    $taomoi = UserMaster::Taomoi($username, $email, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sdt, $Anh);
    if (!$taomoi) {
?>
        <script>
            alert("Tạo mới thất bại");
        </script>
    <?php
    } else {
        header("Location:tblnguoidung.php?success");
    }
}
if (isset($_GET['edit'])) {
    $id = $_GET["edit"];
    $update = true;
    $thontin = UserMaster::ThongTin($id);
    $thongtin = reset($thontin);
}
if (isset($_GET['xoa'])) {
    $id = $_GET["xoa"];
    $update = false;
    $xoa = true;
     $thontin = UserMaster::ThongTin($id);
    $thongtin = reset($thontin);
}
if (isset($_POST['update'])) {
    $usernamecapnhap = $_POST["username"];
    $emailcapnhap = $_POST["email"];
    $hotencapnhap = $_POST["hoten"];
    $gioitinhcapnhap = $_POST["gioitinh"];
    // var_dump($gioitinh);
    $ngaysinhcapnhap = $_POST["ngaysinh"];
    $sdtcapnhap = $_POST["sdt"];
    $diachicapnhap = $_POST["diachi"];
    if ($_FILES['Images']['error'] > 0) {
        $Anhcapnhap = "";
    } else {
        $Anhcapnhap = $_FILES["Images"];
    }
    $idcapnhap = $_GET["edit"];
    $soluottao=$_POST["soluottao"];
    $ngaydangky = $_POST["ngaydangky"];
    $capnhap = UserMaster::Capnhapnguoidung($idcapnhap,$usernamecapnhap,$emailcapnhap,$hotencapnhap,$ngaysinhcapnhap,$gioitinhcapnhap,$sdtcapnhap,$diachicapnhap,$soluottao,$ngaydangky,$Anhcapnhap);
    // var_dump($capnhap);die();
    if (!$capnhap) {
    ?><script>
            alert("Cập nhập thất bại");
        </script> <?php
                } else {
                    header("Location:tblnguoidung.php?update");
                }
            }
            if (isset($_POST['xoa'])) {
                $idxoa = $_GET["xoa"];
                $kiemtraduocxoa = UserMaster::KiemTraDuocXoa($idxoa);
                if (mysqli_num_rows($kiemtraduocxoa) >= 1) {
                    header("Location:tblnguoidung.php?notxoa");
                } else {
                    $xoa = UserMaster::Xoanguoidung($idxoa);
                    if (!$xoa) {
                    ?><script>
                alert("Xóa thất bại");
            </script> <?php
                    } else {
                        header("Location:tblnguoidung.php?xoa");
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
                <li>Thể loại</li>
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
                if($xoa == true && $update ==false){
            ?>
                        <div class="bentrai">
                            <img id="ImageManga" src="<?php echo '../'.$thongtin["Anh"] ?>" alt=""> <br />
                            <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                            <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                        </div>
                        <div class="benphai">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài Khoản </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="username" value=" <?php echo $thongtin["Username"] ?>" placeholder="Tài Khoản" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                                <div class="col-sm-9">
                                    <input type="email" id="form-field-1" name="email" value="<?php echo $thongtin["Email"] ?>" placeholder="Email" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ Và Tên </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="hoten" value="<?php echo $thongtin["HoTen"] ?>" placeholder="Họ Và Tên" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Tính </label>
                                <div class="col-sm-9">
                                    <?php if($thongtin["GioiTinh"] == "0") {?>
                                    <div class="col-sm-4 right">
                                        <label>
                                            <input id="nam" name="gioitinh" value="0" type="radio" class="ace" checked />
                                            <span class="lbl" for="nam"> Nam</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-4 left">
                                        <label>
                                            <input id="nu" name="gioitinh" value="1" type="radio" class="ace" />
                                            <span class="lbl" for="nu"> Nữ</span>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                     <div class="col-sm-4 right">
                                        <label>
                                            <input id="nam" name="gioitinh" value="0" type="radio" class="ace"  />
                                            <span class="lbl" for="nam"> Nam</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-4 left">
                                        <label>
                                            <input id="nu" name="gioitinh" value="1" type="radio" class="ace" checked/>
                                            <span class="lbl" for="nu"> Nữ</span>
                                        </label>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày Sinh</label>
                                <div class="col-sm-9">
                                    <input type="date" id="form-field-1" name="ngaysinh" value="<?php echo $thongtin["NgaySinh"] ?>" placeholder="Ngày Sinh" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số Điện Thoại </label>
                                <div class="col-sm-9">
                                    <input type="number" id="form-field-1" name="sdt" value="<?php echo $thongtin["Sdt"] ?>" placeholder="Số Điện Thoại" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Địa chỉ</label>
                                <div class="col-sm-9">
                                    <textarea class="col-xs-12 col-sm-8" name="diachi" ><?php echo $thongtin["DiaChi"] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group center">
                                <button style="text-align: center;" type="submit" name="xoa" class="btn btn-group-sm btn-lg">Xóa</button>
                            </div>
                        </div>
                       <?php } else if($update == false && $xoa == false){ ?>
<div class="bentrai">
                            <img id="ImageManga" src="/websitetruyen/Images/User/d.png" alt=""> <br />
                            <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                            <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                        </div>
                        <div class="benphai">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài Khoản </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ""; ?>" placeholder="Tài Khoản" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                                <div class="col-sm-9">
                                    <input type="email" id="form-field-1" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" placeholder="Email" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu </label>
                                <div class="col-sm-9">
                                    <input type="password" id="form-field-1" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>" placeholder="Mật khẩu" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ Và Tên </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="hoten" value="<?php echo isset($_POST["hoten"]) ? $_POST["hoten"] : ""; ?>" placeholder="Họ Và Tên" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Tính </label>
                                <div class="col-sm-9">
                                    <div class="col-sm-4 right">
                                        <label>
                                            <input id="nam" name="gioitinh" value="0" type="radio" class="ace" checked />
                                            <span class="lbl" for="nam"> Nam</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-4 left">
                                        <label>
                                            <input id="nu" name="gioitinh" value="1" type="radio" class="ace" />
                                            <span class="lbl" for="nu"> Nữ</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày Sinh</label>
                                <div class="col-sm-9">
                                    <input type="date" id="form-field-1" name="ngaysinh" value="<?php echo isset($_POST["ngaysinh"]) ? $_POST["ngaysinh"] : ""; ?>" placeholder="Ngày Sinh" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số Điện Thoại </label>
                                <div class="col-sm-9">
                                    <input type="number" id="form-field-1" name="sdt" value="<?php echo isset($_POST["sdt"]) ? $_POST["sdt"] : ""; ?>" placeholder="Số Điện Thoại" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Địa chỉ</label>
                                <div class="col-sm-9">
                                    <textarea class="col-xs-12 col-sm-8" name="diachi" value="<?php echo isset($_POST["diachi"]) ? $_POST["diachi"] : ""; ?>"></textarea>
                                </div>
                            </div>
                            <div class="form-group center">
                                <button style="text-align: center;" type="submit" name="taomoi" class="btn btn-group-sm btn-lg">Tạo mới</button>
                            </div>
                        </div>
                        <?php } else { ?>
                       <div class="bentrai">
                            <img id="ImageManga" src="<?php echo '../'.$thongtin["Anh"] ?>" alt=""> <br />
                            <input type="file" style="display:none;" multiple="false" name="Images" id="Images" onchange="img_pathUrl(this)">
                            <button class="button is-danger btn-avatar" type="button" id="clickFile">Chọn</button>
                        </div>
                        <div class="benphai">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tài Khoản </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="username" value=" <?php echo $thongtin["Username"] ?>" placeholder="Tài Khoản" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                                <div class="col-sm-9">
                                    <input type="email" id="form-field-1" name="email" value="<?php echo $thongtin["Email"] ?>" placeholder="Email" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ Và Tên </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="hoten" value="<?php echo $thongtin["HoTen"] ?>" placeholder="Họ Và Tên" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới Tính </label>
                                <div class="col-sm-9">
                                    <?php if($thongtin["GioiTinh"] == "0") {?>
                                    <div class="col-sm-4 right">
                                        <label>
                                            <input id="nam" name="gioitinh" value="0" type="radio" class="ace" checked />
                                            <span class="lbl" for="nam"> Nam</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-4 left">
                                        <label>
                                            <input id="nu" name="gioitinh" value="1" type="radio" class="ace" />
                                            <span class="lbl" for="nu"> Nữ</span>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                     <div class="col-sm-4 right">
                                        <label>
                                            <input id="nam" name="gioitinh" value="0" type="radio" class="ace"  />
                                            <span class="lbl" for="nam"> Nam</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-4 left">
                                        <label>
                                            <input id="nu" name="gioitinh" value="1" type="radio" class="ace" checked/>
                                            <span class="lbl" for="nu"> Nữ</span>
                                        </label>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày Sinh</label>
                                <div class="col-sm-9">
                                    <input type="date" id="form-field-1" name="ngaysinh" value="<?php echo $thongtin["NgaySinh"] ?>" placeholder="Ngày Sinh" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số Điện Thoại </label>
                                <div class="col-sm-9">
                                    <input type="number" id="form-field-1" name="sdt" value="<?php echo $thongtin["Sdt"] ?>" placeholder="Số Điện Thoại" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Địa chỉ</label>
                                <div class="col-sm-9">
                                    <textarea class="col-xs-12 col-sm-8" name="diachi" ><?php echo $thongtin["DiaChi"] ?></textarea>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số lượt Tạo</label>
                                <div class="col-sm-9">
                                    <input type="number" id="form-field-1" name="soluottao" value="<?php echo $thongtin["SoluotTao"] ?>" placeholder="Ngày Sinh" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày Tạo</label>
                                <div class="col-sm-9">
                                    <input type="date" id="form-field-1" name="ngaydangky" value="<?php echo $thongtin["NgayDangKy"] ?>" placeholder="Ngày Sinh" class="col-xs-12 col-sm-8" />
                                </div>
                            </div>
                            <div class="form-group center">
                                <button style="text-align: center;" type="submit" name="update" class="btn btn-group-sm btn-lg">Cập nhập</button>
                            </div>
                        </div>
                        <?php }?>
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