<?php 
include("Controller/Chapter.class.php");
?>
<?php
include_once("header.php");
if(!isset($_GET["machuong"]))
{
    header("Location: home.php");
}else{
    $ma_truyen = $_GET["machuong"];
    $chitietchuong = Chapter::ThôngTinChuongTruyen($ma_truyen);
    $chitiettruyen = reset($chitietchuong);
}
if(isset($_POST['btnCapnhapchuong']))
{
    $IdChapter = $_GET["machuong"];
    $TenChap = $_POST["TenChap"];
    $Noidung =$_POST["Noidung"];
    if(empty($TenChap) && empty($Noidung))
    {
        header("Location:editchuong.php?machuong=".$_GET["machuong"]."&null2");
    }else if(!empty($TenChap) && empty($Noidung))
    {
        header("Location:editchuong.php?machuong=".$_GET["machuong"]."&null1");
    }
    else if(empty($TenChap) && !empty($Noidung))
    {
        header("Location:editchuong.php?machuong=".$_GET["machuong"]."&null");
    }else
    {
        $capnhap = Chapter::SuaChuongTruyen($IdChapter,$TenChap,$Noidung);
        if(!$capnhap)
        {
            header("Location:editchuong.php?machuong=".$_GET["machuong"]."&failure");
        }
        else
        {
            header("Location:editchuong.php?machuong=".$_GET["machuong"]."&success");
        }
    }
    
}
?>
<section class="main-content">
  <div class="container" id="pageregman">
    <div class="title-list">
      Sửa Chương Truyện: <?php echo $chitiettruyen["TenManga"] ?>  / Chương : <?php echo $chitiettruyen["SttChap"] ?>
    </div>
    <?php if (isset($_GET["failure"])) {
      echo '<div class="alert alert-warning">Cập nhập thất bại</div>';
    }?>
    <?php if (isset($_GET["null2"])) {
      echo '<div class="alert alert-danger">Không được để trống tiêu đề và nội dung truyện</div>';
    }?>
    <?php if (isset($_GET["null1"])) {
      echo '<div class="alert alert-danger">Không được để trống nội dung</div>';
    }?>
    <?php if (isset($_GET["null"])) {
      echo '<div class="alert alert-danger">Không được để trống tiêu đề</div>';
    }?>
    <?php if (isset($_GET["success"])) {
      echo '<div class="alert alert-warning">Cập nhập thành công</div>';
    }?>
    <div class="messages">
      <div class="col-lg-12" style="font-family: Arial, Helvetica, sans-serif; font-size: 18px;">
        <div class="field">
          <h2 style="color: red; margin-bottom: 10px; text-align: center;">Sửa Chương Truyện:  <?php echo $chitiettruyen["TenManga"] ?> /  Thể loại: <?php if($chitiettruyen["KieuTruyen"]=="1")
          {
            echo "Truyện Tranh";
          } else{
            echo "Truyện Chữ";
          }?></h2>
        </div>
      </div>
      <form method="post" enctype="multipart/form-data" id="DangKyChuong">
        <div class="col-lg-12">
          <div class="field">
            <p class="txt">Số thứ tự chượng :</p>
            <p class="control">
                <input class="input" name="SttChap" id="SttChap" value="<?php echo $chitiettruyen["SttChap"] ?>" type="number" disabled />
            </p>
          </div>
          <div class="field">
            <p class="txt">Tiêu đề:</p>
            <p class="control">
              <input class="input" type="text" name="TenChap" id="Title" value="<?php echo $chitiettruyen["TenChap"] ?>" name="Title" placeholder="Tiêu đề truyện" />
            </p>
          </div>
          <div class="row" style="margin: 10px 10px 10px 10px; height: 800px;">
            <div class="field">
              <p class="txt">Nội dung:</p>
              <p class="control">
                <textarea name="Noidung" id="Noidung" ><?php echo $chitiettruyen["Noidung"] ?></textarea>
              </p>
            </div>
          </div>
          <div style="text-align: center;">
            <button class="button is-danger" name="btnCapnhapchuong" type="submit">Cập nhập chương</button>
          </div>
      </form>
    </div>
  </div>
</section>
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
    height: 700,
    with: 500,
    images_upload_url: 'upload.php',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
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
        
            success(json.location);
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