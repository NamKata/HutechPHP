<?php
include_once("header.php");
?>
<?php
include("Controller/Theloai.class.php");
include("Controller/Theloaitruyen.class.php");
include("Controller/Manga.class.php");
$danhsachtheloai = TheloaiMaster::DanhsachTheloai();
$update = false;
$xoa = false;
if (isset($_POST['taomoi'])) {
    $TenManga = $_POST["TenManga"];
    $Slug = $_POST["Slug"];
    $TenKhac = $_POST["TenKhac"];
    $Tacgia = $_POST["Tacgia"];
    $Nguoidich = $_POST["Nguoidich"];
    $kieutruyen = $_POST["kieutruyen"];
    // var_dump($gioitinh);
    $Gioithieu = $_POST["Gioithieu"];
    if ($_FILES['Images']['error'] > 0) {
        $Anh = "";
    } else {
        $Anh = $_FILES["Images"];
    }
    if (!empty($_POST["Theloai"])) {
        $taomoi = MangaMaster::Taomoi($TenManga, $TenKhac, $Slug, $Tacgia, $Nguoidich, $Gioithieu, $_SESSION["master"], $Anh, $kieutruyen);
        foreach ($_POST["Theloai"] as  $itemId) {
            $taomoitheloai = TheloaitruyenMaster::TaoMoi($taomoi, $itemId);
        }
        if (!$taomoitheloai) {
?><script>
                alert("Tạo mới thất bại!");
            </script> <?php
                    } else {
                        header("Location:tbltruyen.php?success");
                    }
                } else {
                    header("Location:tbltruyen.php?404");
                }
            }
            if (isset($_GET['edit'])) {
                $id = $_GET["edit"];
                $update = true;
                $thontin = MangaMaster::ThongTinTruyen($id);
                $thongtin = reset($thontin);
                $danhsachtheloaitruyen = TheloaitruyenMaster::Danhsachtheloaitruyen($id);
                $danhsachtheloai = TheloaiMaster::ExcludeSQLIdTheloai($id);
            }
            if (isset($_GET['xoa'])) {
                $id = $_GET["xoa"];
                $update = false;
                $xoa = true;
                $thontin = MangaMaster::ThongTinTruyen($id);
                $thongtin = reset($thontin);
                $danhsachtheloaitruyen = TheloaitruyenMaster::Danhsachtheloaitruyen($id);
                $danhsachtheloai = TheloaiMaster::ExcludeSQLIdTheloai($id);
            }
            if (isset($_POST['update'])) {
                $idCapNhap = $_GET["edit"];
                $TenMangaCapNhap = $_POST["TenManga"];
                $SlugCapNhap = $_POST["Slug"];
                $TenKhacCapNhap = $_POST["TenKhac"];
                $TacgiaCapNhap = $_POST["Tacgia"];
                $NguoidichCapNhap = $_POST["Nguoidich"];
                $kieutruyenCapNhap = $_POST["kieutruyen"];
                // var_dump($gioitinh);
                $GioithieuCapNhap = $_POST["Gioithieu"];
                if ($_FILES['Images']['error'] > 0) {
                    $AnhCapNhap = "";
                } else {
                    $AnhCapNhap = $_FILES["Images"];
                }
                $capnhap = MangaMaster::Capnhapthongtin($idCapNhap, $TenMangaCapNhap, $SlugCapNhap, $TenKhacCapNhap, $TacgiaCapNhap, $NguoidichCapNhap, $AnhCapNhap, $kieutruyenCapNhap, $GioithieuCapNhap);
                // var_dump($capnhap);die();
                if (!$capnhap) {
                        ?><script>
            alert("Cập nhập thất bại");
        </script> <?php
                } else {
                    $length = TheloaitruyenMaster::LayTheloaicanXoa($idCapNhap, implode(", ", $_POST["Theloaitruyen"]));
                    if (!empty($length) && !empty($_POST["Theloai"])) {
                        foreach ($_POST["Theloai"] as  $itemId) {
                            $themtheloaitruyen = TheloaitruyenMaster::TaoMoi($idCapNhap, $itemId);
                        }
                        $xoatheloai = TheloaitruyenMaster::XoaTheloai($idCapNhap, implode(", ", $_POST["Theloaitruyen"]));
                        if ($xoatheloai && $themtheloaitruyen) {
                            header("Location: tbltruyen.php?update");
                        } else {
                    ?><script>
                    alert("Cập nhập thất bại");
                </script> <?php
                        }
                    } else if (!empty($length) && empty($_POST["Theloai"])) {
                        $xoatheloai = TheloaitruyenMaster::XoaTheloai($idCapNhap, implode(", ", $_POST["Theloaitruyen"]));
                        if ($xoatheloai) {
                            header("Location: tbltruyen.php?update");
                        } else {
                            ?><script>
                    alert("Cập nhập thất bại");
                </script> <?php
                        }
                    } else if (empty($length) && !empty($_POST["Theloai"])) {
                        foreach ($_POST["Theloai"] as  $itemId) {
                            $themtheloaitruyen = TheloaitruyenMaster::TaoMoi($idCapNhap, $itemId);
                        }
                        if ($themtheloaitruyen) {
                            header("Location: tbltruyen.php?update");
                        } else {
                            ?><script>
                    alert("Cập nhập thất bại");
                </script> <?php
                        }
                    } else {
                            ?><script>
                alert("Cập nhập thất bại");
            </script> <?php
                    }
                }
            }
            if (isset($_POST['xoa'])) {
                $idxoa = $_GET["xoa"];
                $kiemtraduocxoa = MangaMaster::KiemTraDuocXoa($idxoa);
                if (mysqli_num_rows($kiemtraduocxoa) >= 1) {
                    header("Location:tbltruyen.php?notxoa");
                } else {
                    $xoa = MangaMaster::XoaTruyen($idxoa);
                    if (!$xoa) {
                        ?><script>
                alert("Xóa thất bại");
            </script> <?php
                    } else {
                        header("Location:tbltruyen.php?xoa");
                    }
                }
            }
             if (isset($_POST['huykichhoat'])) {
                $idxoa = $_GET["xoa"];
                $kiemtra = MangaMaster::HuyKichHoat($idxoa);
                if (!$kiemtra) {
                        ?><script>
                          alert("Hủy Thất bại!");
                </script> <?php
                    } else {
                        header("Location:tbltruyen.php?huy");
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
                <li>Truyện</li>
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
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Truyện </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="TenManga" name="TenManga" value="<?php echo $thongtin["TenManga"] ?>" placeholder="<?php echo $thongtin["TenManga"] ?>" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đường Dẫn </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Slug" name="Slug" value="<?php echo $thongtin["Slug"] ?>" placeholder="Slug" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Khác </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="TenKhac" value="<?php echo $thongtin["TenKhac"] ?>" placeholder="Tên Khác" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tác Giả </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tacgia" value="<?php echo $thongtin["Tacgia"] ?>" placeholder="Tác Giả" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Người Dịch </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Nguoidich" value="<?php echo $thongtin["NguoiDich"] ?>" placeholder="Người Dịch" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kiểu Truyện</label>
                                    <div class="col-sm-9">
                                        <?php
                                        if ($thongtin["KieuTruyen"] == "1") {
                                        ?>
                                            <div class="col-sm-4 right">
                                                <label>
                                                    <input id="nam" name="kieutruyen" value="1" type="radio" class="ace" checked />
                                                    <span class="lbl" for="nam"> Truyện Tranh</span>
                                                </label>
                                            </div>

                                            <div class="col-sm-4 left">
                                                <label>
                                                    <input id="nu" name="kieutruyen" value="2" type="radio" class="ace" />
                                                    <span class="lbl" for="nu"> Truyện Chữ</span>
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-sm-4 right">
                                                <label>
                                                    <input id="nam" name="kieutruyen" value="1" type="radio" class="ace" />
                                                    <span class="lbl" for="nam"> Truyện Tranh</span>
                                                </label>
                                            </div>

                                            <div class="col-sm-4 left">
                                                <label>
                                                    <input id="nu" name="kieutruyen" value="2" type="radio" class="ace" checked />
                                                    <span class="lbl" for="nu"> Truyện Chữ</span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Thể Loại</label>
                                    <div class="col-sm-9">
                                        <?php
                                        foreach ($danhsachtheloaitruyen as $item1) {
                                        ?>
                                            <div class="checkbox col-sm-5">
                                                <label>
                                                    <input id="Theloaitruyen[<?php echo $item1["IdTheloai"]; ?>]" name="Theloaitruyen[]" value="<?php echo $item1["IdTheloai"]; ?>" type="checkbox" class="ace" checked />
                                                    <span class="lbl" for="Theloaitruyen[<?php echo $item1["IdTheloai"]; ?>]"> <?php echo $item1["TenTheloai"]; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        <?php foreach ($danhsachtheloai as $item) {
                                        ?>
                                            <div class="checkbox col-sm-5">
                                                <label>
                                                    <input id="Theloai[<?php echo $item["IdTheloai"]; ?>]" name="Theloai[]" value="<?php echo $item["IdTheloai"]; ?>" type="checkbox" class="ace" />
                                                    <span class="lbl" for="Theloai[<?php echo $item["IdTheloai"]; ?>]"> <?php echo $item["TenTheloai"]; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Gioithieu"><?php echo  $thongtin["GioiThieu"] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group center">
                                    <?php if($thongtin["TinhTrang"] == "0") {?>
                                    <button style="text-align: center;" type="submit" name="xoa" class="btn btn-group-sm btn-lg">Xóa</button>
                                    <?php } else { ?>
                                    <button style="text-align: center;" type="submit" name="huykichhoat" class="btn btn-group-sm btn-lg">Hủy Kích Hoạt</button>
                                    <?php } ?>
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
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Truyện </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="TenManga" name="TenManga" value="<?php echo isset($_POST["TenManga"]) ? $_POST["TenManga"] : ""; ?>" placeholder="Tên Truyện" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đường Dẫn </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Slug" name="Slug" value="<?php echo isset($_POST["Slug"]) ? $_POST["Slug"] : ""; ?>" placeholder="Đường Dẫn" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Khác </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="TenKhac" value="<?php echo isset($_POST["TenKhac"]) ? $_POST["TenKhac"] : ""; ?>" placeholder="Tên Khác" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tác Giả </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tacgia" value="<?php echo isset($_POST["Tacgia"]) ? $_POST["Tacgia"] : ""; ?>" placeholder="Tác Giả" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Người Dịch </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Nguoidich" value="<?php echo isset($_POST["Nguoidich"]) ? $_POST["Nguoidich"] : ""; ?>" placeholder="Người Dịch" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kiểu Truyện</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-4 right">
                                            <label>
                                                <input id="nam" name="kieutruyen" value="1" type="radio" class="ace" checked />
                                                <span class="lbl" for="nam"> Truyện Tranh</span>
                                            </label>
                                        </div>

                                        <div class="col-sm-4 left">
                                            <label>
                                                <input id="nu" name="kieutruyen" value="2" type="radio" class="ace" />
                                                <span class="lbl" for="nu"> Truyện Chữ</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Thể Loại</label>
                                    <div class="col-sm-9">
                                        <?php
                                        foreach ($danhsachtheloai as $item) {
                                        ?>
                                            <div class="checkbox col-sm-5">
                                                <label>
                                                    <input id="Theloai[<?php echo $item["IdTheloai"]; ?>]" name="Theloai[]" value="<?php echo $item["IdTheloai"]; ?>" type="checkbox" class="ace" />
                                                    <span class="lbl" for="Theloai[<?php echo $item["IdTheloai"]; ?>]"> <?php echo $item["TenTheloai"]; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Gioithieu" value="<?php echo isset($_POST["Gioithieu"]) ? $_POST["Gioithieu"] : ""; ?>"></textarea>
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
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Truyện </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="TenManga" name="TenManga" value="<?php echo $thongtin["TenManga"] ?>" placeholder="<?php echo $thongtin["TenManga"] ?>" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đường Dẫn </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Slug" name="Slug" value="<?php echo $thongtin["Slug"] ?>" placeholder="Slug" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên Khác </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="TenKhac" value="<?php echo $thongtin["TenKhac"] ?>" placeholder="Tên Khác" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tác Giả </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Tacgia" value="<?php echo $thongtin["Tacgia"] ?>" placeholder="Tác Giả" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Người Dịch </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" name="Nguoidich" value="<?php echo $thongtin["NguoiDich"] ?>" placeholder="Người Dịch" class="col-xs-12 col-sm-8" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kiểu Truyện</label>
                                    <div class="col-sm-9">
                                        <?php
                                        if ($thongtin["KieuTruyen"] == "1") {
                                        ?>
                                            <div class="col-sm-4 right">
                                                <label>
                                                    <input id="nam" name="kieutruyen" value="1" type="radio" class="ace" checked />
                                                    <span class="lbl" for="nam"> Truyện Tranh</span>
                                                </label>
                                            </div>

                                            <div class="col-sm-4 left">
                                                <label>
                                                    <input id="nu" name="kieutruyen" value="2" type="radio" class="ace" />
                                                    <span class="lbl" for="nu"> Truyện Chữ</span>
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-sm-4 right">
                                                <label>
                                                    <input id="nam" name="kieutruyen" value="1" type="radio" class="ace" />
                                                    <span class="lbl" for="nam"> Truyện Tranh</span>
                                                </label>
                                            </div>

                                            <div class="col-sm-4 left">
                                                <label>
                                                    <input id="nu" name="kieutruyen" value="2" type="radio" class="ace" checked />
                                                    <span class="lbl" for="nu"> Truyện Chữ</span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Thể Loại</label>
                                    <div class="col-sm-9">
                                        <?php
                                        foreach ($danhsachtheloaitruyen as $item1) {
                                        ?>
                                            <div class="checkbox col-sm-5">
                                                <label>
                                                    <input id="Theloaitruyen[<?php echo $item1["IdTheloai"]; ?>]" name="Theloaitruyen[]" value="<?php echo $item1["IdTheloai"]; ?>" type="checkbox" class="ace" checked />
                                                    <span class="lbl" for="Theloaitruyen[<?php echo $item1["IdTheloai"]; ?>]"> <?php echo $item1["TenTheloai"]; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        <?php foreach ($danhsachtheloai as $item) {
                                        ?>
                                            <div class="checkbox col-sm-5">
                                                <label>
                                                    <input id="Theloai[<?php echo $item["IdTheloai"]; ?>]" name="Theloai[]" value="<?php echo $item["IdTheloai"]; ?>" type="checkbox" class="ace" />
                                                    <span class="lbl" for="Theloai[<?php echo $item["IdTheloai"]; ?>]"> <?php echo $item["TenTheloai"]; ?></span>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới thiệu</label>
                                    <div class="col-sm-9">
                                        <textarea class="col-xs-12 col-sm-8" name="Gioithieu"><?php echo $thongtin["GioiThieu"] ?></textarea>
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
<script type="text/javascript">
    $("#TenManga").keyup(function() {
        var str = $(this).val();
        var trims = $.trim(str);
        // trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '-');
        var slug = trims
            .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a")
            .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e")
            .replace(/i|í|ì|ỉ|ĩ|ị/gi, "i")
            .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o")
            .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u")
            .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y")
            .replace(/đ/gi, "d")
            .replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
                ""
            )
            .replace(/ /gi, "-")
            .replace(/\-\-\-\-\-/gi, "")
            .replace(/\-\-\-\-/gi, "-")
            .replace(/\-\-\-/gi, "-")
            .replace(/\-\-/gi, "-")
            .replace(/\@\-|\-\@|\@/gi, "");
        $('#Slug').val(slug.toLowerCase())
    });
</script>
<?php
include_once("footer.php");
?>