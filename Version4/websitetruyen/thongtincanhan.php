<?php
include_once("header.php");
if(!isset($_GET["matk"]))
{
    header("Location: home.php");
}else{
    $IdUser = $_GET["matk"];
    // var_dump(array(Manga::ChitietMangaa($ma_truyen)));
    $thongtin = User::ThongTinNguoiDung($IdUser);
    $thongtin = reset($thongtin);
}
?>
<section class="main-content">
    <div class="container">
       <?php
        if(isset($_GET["error"]))
        {
          echo '<div class="alert alert-warning">Cập nhập thất bại!</div>' ;
        }
        if(isset($_GET["success"]))
        {

            echo '<div class="alert alert-success">Cập nhập thành công!</div>' ;
        }
        
    ?>
        <div class="messages columns">
            <div class="column is-narrow left pc">
                <ul class="nav-user">
                    <li><a class="li01 is-active" href="thongtincanhan.php?matk=<?php echo $thongtin["IdUser"]; ?>">Quản lý tài khoản</a></li>
                    <li><a class="li02 " href="#">Tin nhắn</a></li>
                    <li><a class="li03 " href="doimatkhau.php?matk=<?php echo $_GET["matk"]; ?>">Đổi mật khẩu</a></li>
                    <!--<li><a class="li04 regiter-team"href="group.html">Đăng ký nhóm dịch</a></li>
                <li><a class="li05 collection" href="collection.html">Quyên góp</a></li>-->
                </ul>
            </div>
            <div class="column columns">
                <div class="user-right column">
            <?php 
                 if($thongtin["Anh"] == NULL)
                 {
            ?>
            <img
                id="ImageManga"
                class="image-avatar"
                src="<?php echo "/websitetruyen/FileCSSJS/assets/images/noavatar.png"; ?>"
                width="150px"
                height="150px"
              />
              <?php } else {?>
               <img
                id="ImageManga"
                class="image-avatar"
                src="<?php echo "/websitetruyen/".$thongtin["Anh"]; ?>"
                width="150px"
                height="150px"
              />
              <?php } ?>
              <button
                class="button is-danger btn-avatar"
                type="button"
                id="clickFile"
              >
                Chọn Hình
              </button>
                </div>
                <div class="user-main column">
                    <div class="level title">
                        <p class="level-left has-text-weight-bold">Thông tin tài khoản</p>
                    </div>
                    <form method="POST" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="form-change-pass">
                            <div class="field">
                                <p class="txt">UID:</p>
                                <p class="control">
                                    <input class="input" type="text"  value="<?php echo $thongtin["IdUser"]; ?>" disabled>
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Tài khoản:</p>
                                <p class="control">
                                    <input class="input" type="text" value="<?php echo $thongtin["Username"]; ?>" disabled>
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Email:</p>
                                <p class="control">
                                    <input class="input" type="email" value="<?php echo $thongtin["Email"]; ?>" disabled>
                                </p>
                            </div>
                        </div>
                        <div class="level title user-title">
                            <p class="level-left has-text-weight-bold">Thông tin cá nhân</p>
                        </div>
                        <div class="form-change-pass user-form">
                            <div class="field">
                                <p class="txt">Họ và Tên</p>
                                <p class="control">
                                    <?php if($thongtin["HoTen"]== NULL){ ?>
                                    <input class="input" type="text" id="last_name" name="HoTen" placeholder="Họ và Tên" value="">
                                    <?php } else {?>
                                    <input class="input" type="text" id="last_name" name="HoTen" value="<?php echo $thongtin["HoTen"] ?>">
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Ngày sinh</p>
                                <p class="control">
                                    <input class="input" type="date" id="NgaySinh" name="NgaySinh" value="<?php echo $thongtin["NgaySinh"] ?>">
                                </p>
                            </div>
                            <div class="field">
                                <p class="txt">Điện thoại</p>
                                <p class="control">
       
                                    <input class="input" type="number" id="Sdt" name="Sdt" value="<?php echo $thongtin["Sdt"] ?>">
                                </p>
                            </div>
                              <div class="field">
                                <p class="txt">Địa chỉ</p>
                                <p class="control">
                                    <input class="input" type="text" id="DiaChi" name="DiaChi" value="<?php echo $thongtin["DiaChi"] ?>">
                                </p>
                            </div>
                            <div class="field user-field">
                                <span class="txt">Giới tính</span>
                                <?php if($thongtin["GioiTinh"]== 0){ ?>
                                <input type="radio" id="gender1" name="GioiTinh" value="0" checked>
                                <label for="gender1">Nam</label>
                                <input type="radio" id="gender2" name="GioiTinh" value="1">
                                <label for="gender2">Nữ</label>
                                <?php } else{ ?>
                                <input type="radio" id="gender1" name="GioiTinh" value="0" >
                                <label for="gender1">Nam</label>
                                <input type="radio" id="gender2" name="GioiTinh" value="1" checked>
                                <label for="gender2">Nữ</label>
                                <?php }?>
                            </div>
                            <div class="field">
                                <p class="txt">Mật khẩu hiện tại:</p>
                                <p class="control">
                                    <input class="input" name="Password" id="password_old" name="password_old" type="password" >
                                </p>
                            </div>
                            <input
                            type="file"
                            multiple="false"
                            name="Images"
                            id="Images"
                            style="display: none;"
                            onchange="img_pathUrl(this)"
                            value=""
                             />
                            <div class="field">
                                <p class="control">
                                    <button class="button is-danger" name="updateinfo" type="submit">Lưu</button>
                                </p>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<?php 

if(isset($_POST["updateinfo"]))
{
    $IdUser = $_GET["matk"];
    $HoTen= $_POST["HoTen"];
    $NgaySinh= $_POST["NgaySinh"];
    $Sdt= $_POST["Sdt"];
    $DiaChi= $_POST["DiaChi"];
    $GioiTinh= $_POST["GioiTinh"];

    $Password =$_POST["Password"];
    $Password= md5($Password);
    if($_FILES["Images"]["name"] == 0)
    {
        $Anh="";
    }
    else{
        $Anh=$_FILES["Images"];
    }
    if($Password == $thongtin["Password"])
    {
        $capnhap = User::Capnhapthongtin($IdUser, $HoTen, $NgaySinh, $Sdt, $DiaChi, $GioiTinh, $Anh, $Password);
        if(!$capnhap)
        {
            header("Location: thongtincanhan.php?matk=".$_SESSION['user']."&error");
        }else{
        
            header("Location: thongtincanhan.php?matk=".$_SESSION['user']."&success");
        }
    }
    else{
          ?><script>alert("Sai mật khẩu"); $("#password_old").val("");</script><?php
    }
   
}

?>
<script>
  $("#clickFile").click(function () {
    $("#Images").click();
  });
 function img_pathUrl(input) {
    // $('#ImageManga')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    $("#ImageManga")[0].src = URL.createObjectURL(event.target.files[0]);
  }
</script>
<?php include_once("footer.php"); ?>