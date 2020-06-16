<?php
include_once("header.php");
?>
<?php
include("Controller/Chap.class.php");
include("Controller/Manga.class.php");
if (isset($_GET["matruyen"])) {
  $ma_truyen = $_GET["matruyen"];
  $chitiettruyen = MangaMaster::ThongTinTruyen($ma_truyen);
  $chitiettruyen = reset($chitiettruyen);
  $sttchap = ChapMaster::SttChapNextCreate($ma_truyen);
  $sttchap = reset($sttchap);
}
$update = false;
$xoa = false;
if (isset($_POST['taomoi'])) {
   $SttChap = $_POST["SttChap"];
  // var_dump($SttChap);die();
  $TenChap = $_POST["TenChap"];
  $Noidung =$_POST["Noidung"];
  $Manga = $_GET["matruyen"];
  $NguoiDang = $_SESSION["master"];
  // var_dump($SttChap);
  // var_dump($TenChap);
  // var_dump($Noidung);
  // var_dump($Manga);
  // var_dump($NguoiDang);die();
  $taomoi = ChapMaster::ThemChuongMoi($SttChap,$TenChap,$Noidung,$NguoiDang,$Manga);
    if (!$taomoi) {
?><script>
            alert("Tạo mới thất bại");
        </script> <?php
                } else {
                    header("Location: tblchuong.php?matruyen=".$_GET["matruyen"]."&success");
                }
            }
            if (isset($_GET['edit'])) {
                $id = $_GET["edit"];
                $update = true;
                $thontin = ChapMaster::ThôngTinChuongTruyen($id);
                $thongtin = reset($thontin);
            }
            if (isset($_GET['xoa'])) {
                $id = $_GET["xoa"];
                $update = false;
                $xoa = true;
                $thontin = ChapMaster::ThôngTinChuongTruyen($id);
                $thongtin = reset($thontin);
            }
            if (isset($_POST['update'])) {
               $IdChapter = $_GET["edit"];
                $TenChap = $_POST["TenChap"];
                $Noidung =$_POST["Noidung"];
                $capnhap = ChapMaster::SuaChuongTruyen($IdChapter,$TenChap,$Noidung);
                // var_dump($capnhap);die();
                if (!$capnhap) {
                    ?><script>
            alert("Cập nhập thất bại");
        </script> <?php
                } else {
                    header("Location: tblchuong.php?matruyen=".$thongtin["Manga"]."&update");
                }
            }
            if (isset($_POST['xoa'])) {
                $idxoa = $_GET["xoa"];
                    $xoa = ChapMaster::XoaChuong($idxoa);
                    if (!$xoa) {
                    ?><script>
                alert("Xóa thất bại");
            </script> <?php
                    } else {
                        header("Location: tblchuong.php?matruyen=".$thongtin["Manga"]."&xoa");
                    }
                
            }
            if(isset($_POST['huy']))
            {
                $idxoa = $_GET["xoa"];
                    $xoa = ChapMaster::HuyKichHoat($idxoa);
                    if (!$xoa) {
                    ?><script>
                alert("Xóa thất bại");
            </script> <?php
                    } else {
                        header("Location: tblchuong.php?matruyen=".$thongtin["Manga"]."&huy");
                    }
                
            }
            if(isset($_POST['kichhoat']))
            {
                $idxoa = $_GET["xoa"];
                    $xoa = ChapMaster::KichHoat($idxoa);
                    if (!$xoa) {
                    ?><script>
                alert("Xóa thất bại");
            </script> <?php
                    } else {
                        header("Location: tblchuong.php?matruyen=".$thongtin["Manga"]."&kich");
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
                <li>Danh sách chương</li>
              
                <li class="active">   <?php if($update ==false && $xoa == false){
                    echo "Tạo Mới";
                }else if($xoa == true && $update == false){
                    echo "Xóa";
                }else {
                    echo "Cập nhập";
                } ?> </li>
            </ul>
            <!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
            <?php if(isset($_GET["matruyen"])){ ?>
                <h1>
                    <?php if($chitiettruyen["KieuTruyen"] == "1")
                    {
                        echo "Truyện Tranh";
                    }else{
                        echo "Truyện Chữ";
                    } ?>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        <?php echo $chitiettruyen["TenManga"] ?>
                    </small>
                </h1>
            <?php } else { ?>
                 <h1>
                    <?php if($thongtin["KieuTruyen"] == "1")
                    {
                        echo "Truyện Tranh";
                    }else{
                        echo "Truyện Chữ";
                    } ?>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        <?php echo $thongtin["TenManga"] ?>
                    </small>
                </h1>
            <?php } ?>    
            </div>
            <style>
                form {
                    border: 1px solid #bbbbbb;
                    border-radius: 5px;
                }
            </style>
            <form method="post">
            <?php
                if($update == false && $xoa == false)
                {
             ?>
                 <br/>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="margin-left:50%"> Stt</label>
                        </div>
                        <div class="col-lg-9">
                         <?php if($sttchap){ if(is_null($sttchap["SttChap"])) {?>
                            <input class="col-sm-8" name="SttChap" id="SttChap" value="<?php echo "1" ?>" type="number" placeholder="<?php echo "1" ?>" />
                        <?php }else{
                        ?>
                            <input class="col-sm-8" name="SttChap" id="SttChap" value="<?php echo $sttchap["SttChap"]+1 ?>" type="number" placeholder="<?php echo $sttchap["SttChap"]+1 ?>" />
                        <?php } } else{ ?>
                            <input class="col-sm-8" name="SttChap" id="SttChap" value="<?php echo "1" ?>" type="number" placeholder="<?php echo "1" ?>" />
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                          <label style="margin-left:50%">Tên Chương</label>
                        </div>
                        <div class="col-lg-9">
                        <input type="text" class="col-sm-8" name="TenChap" id="Title" value="<?php echo isset($_POST["TenChap"]) ? $_POST["TenChap"] : ""; ?>" name="Title" placeholder="Tiêu đề truyện">
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                           <label style="margin-left:50%">Nội dung</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea name="Noidung" id="Noidung" value="<?php echo isset($_POST["Noidung"]) ? $_POST["Noidung"] : ""; ?>"></textarea>
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                       <button type="submit" style="margin-left: 50%; margin-bottom:2%" name="taomoi" class="btn btn-pink" >Tạo mới</button>
                </div>
               <?php } else if($xoa == true && $update == false){ ?>
                <br/>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="margin-left:50%"> Stt</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="col-sm-8" name="SttChap" id="SttChap" value="<?php echo $thongtin["SttChap"] ?>" type="number" disabled  />
                        </div>
                    </div>
                </div>
                <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                          <label style="margin-left:50%">Tên Chương</label>
                        </div>
                        <div class="col-lg-9">
                        <input type="text" class="col-sm-8" name="TenChap" id="Title" value="<?php echo  $thongtin["TenChap"]  ?>" name="Title" placeholder="Tiêu đề truyện">
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                           <label style="margin-left:50%">Nội dung</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea name="Noidung" id="Noidung" ><?php echo $thongtin["Noidung"] ?></textarea>
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                    <?php
                    if($thongtin["TinhTrang" ]== "0")
                    {
                     ?>
                     <button type="submit" style="margin-left: 50%; margin-bottom:2%" name="xoa" class="btn btn-pink" >Xóa</button>
                     <button type="submit" style="margin-left: 50%; margin-bottom:2%" name="kichhoat" class="btn btn-pink" >Kích Hoạt</button>
                     <?php } else {?>
                     <button type="submit" style="margin-left: 50%; margin-bottom:2%" name="huy" class="btn btn-pink" >Hủy Kích Hoạt</button>
                     <?php } ?>
                    
                </div>
               <?php } else { ?>
                     <br/>
                <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="margin-left:50%"> Stt</label>
                        </div>
                        <div class="col-lg-9">
                            <input class="col-sm-8" name="SttChap" id="SttChap" value="<?php echo $thongtin["SttChap"] ?>" type="number" disabled  />
                        </div>
                    </div>
                </div>
                <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                          <label style="margin-left:50%">Tên Chương</label>
                        </div>
                        <div class="col-lg-9">
                        <input type="text" class="col-sm-8" name="TenChap" id="Title" value="<?php echo  $thongtin["TenChap"]  ?>" name="Title" placeholder="Tiêu đề truyện">
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                    <div class="row">
                        <div class="col-lg-3">
                           <label style="margin-left:50%">Nội dung</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea name="Noidung" id="Noidung" ><?php echo $thongtin["Noidung"] ?></textarea>
                        </div>
                    </div>
                </div>
                 <br/>
                 <div class="form-group-lg">
                       <button type="submit" style="margin-left: 50%; margin-bottom:2%" name="update" class="btn btn-pink" >Cập Nhập</button>
                </div>
               <?php } ?> 
            </form>
        </div>
    </div>
</div>
<script src="/websitetruyen/admin/assets/js/jquery-2.1.4.min.js"></script>
<script src="https://cdn.tiny.cloud/1/nf0evhvl003idt9lu8m0cwdcf19wcsks3r1vvineh5nivzmj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullpage | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | spellchecker | emoticons'
            }
        },
        toolbar_groups: {
            formatgroup: {
                icon: "format",
                tooltip: "Formatting",
                items: "bold italic underline strikethrough | forecolor backcolor | superscript subscript | removeformat",
            },
            paragraphgroup: {
                icon: "paragraph",
                tooltip: "Paragraph format",
                items: "h1 h2 h3 | bullist numlist | alignleft aligncenter alignright | indent outdent",
            },
            insertgroup: {
                icon: "plus",
                tooltip: "Insert",
                items: "link image emoticons charmap hr",
            },
        },
        skin: "outside",
        toolbar_location: "bottom",
        menubar: false,
        height: 750,
        with: 500,
        images_upload_url: 'upload.php',

        // override default upload handler to simulate successful upload
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success("../"+json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });
</script>
<?php
include_once("footer.php");
?>