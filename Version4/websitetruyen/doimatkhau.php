<?php require_once("header.php");
if (!isset($_GET["matk"])) {
    header("Location: home.php");
} else {
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
                    <li><a class="li01 " href="thongtincanhan.php?matk=<?php echo $_GET["matk"]; ?>">Quản lý tài khoản</a></li>
                    <li><a class="li02 " href="#">Tin nhắn</a></li>
                    <li><a class="li03 is-active" href="doimatkhau.php?matk=<?php echo $_GET["matk"]; ?>">Đổi mật khẩu</a></li>
                    <!--<li><a class="li04 regiter-team"href="group.html">Đăng ký nhóm dịch</a></li>
        <li><a class="li05 collection" href="collection.html">Quyên góp</a></li>-->
                </ul>
            </div>
            <div class="column">
                <div class="level title">
                    <p class="level-left has-text-weight-bold">Đổi mật khẩu</p>
                </div>
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" >
                    <div class="form-change-pass">
                        <div class="field">
                            <p class="txt">Mật khẩu hiện tại</p>
                            <p class="control">
                                <input class="input" type="password" value="" name="password_old" id="password_old">
                            </p>
                        </div>
                        <div class="field">
                            <p class="txt">Mật khẩu mới</p>
                            <p class="control">
                                <input class="input" type="password" value="" name="password_new" id="password_new">
                            </p>
                        </div>
                        <div class="field">
                            <p class="txt">Xác nhận mật khẩu</p>
                            <p class="control">
                                <input class="input" type="password" value="" name="confirm_password_new" id="confirm_password_new">
                            </p>
                        </div>
                        <div class="field">
                            <p class="control">
                                <button class="button is-danger" name="btndoimk">Đổi mật khẩu</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($_POST["btndoimk"]))
{
    $IdUser = $_GET["matk"];
    $Password_old = $_POST["password_old"]; 
    $Password_new = $_POST["password_new"]; 
    $Confirm = $_POST["confirm_password_new"]; 
    $Password_old = md5($Password_old);
    $Password_new = md5($Password_new);
    $Confirm = md5($Confirm);
    if($Password_old != $thongtin["Password"])
    {
        ?><script>alert("Mật khẩu cũ không chính xác!!!"); $("#password_old").val("");</script> <?php
    } else{
        if($Password_new != $Confirm)
        {
            ?><script>alert("Mật khẩu mới không chính xác!!!"); $("#password_new").val(""); $("#confirm_password_new").val("");</script> <?php
        }
        else{
            $result= User::Capnhapmatkhau($IdUser, $Password_new);
            if(!$result)
            {
                header("Location: doimatkhau.php?matk=".$_SESSION['user']."&error");
            }else{
                header("Location: doimatkhau.php?matk=".$_SESSION['user']."&success");
            }
        }
    }
}
 ?>
<!-- /.main-content -->
<?php require_once("footer.php") ?>