<?php ob_start(); ?>
<?php session_start(); ?>
<?php
include("Controller/User.class.php");
include("Controller/Theloai.class.php");
include("Controller/Manga.class.php");
include("Controller/timesince.php");
if (isset($_POST["btnsubmitlogin"])) {
  $Username = $_POST["Username"];
  $Password = $_POST["Password"];
  $Password = md5($Password);
  $result = User::KiemTraDangNhap($Username, $Password);
  if (!$Username || !$Password) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
  } else {
    if (mysqli_num_rows($result) == 1) {
      $nguoidung = User::LayIdNgDung($Username, $Password);
      $nguoidung = reset($nguoidung);
      $_SESSION["user"] = $nguoidung["IdUser"];
      header("Location: home.php");
    } else {
?>
      <script>
        alert("Sai tên tài khoản hoặc mật khẩu!");
      </script>
    <?php
    }
  }
}
if (isset($_POST["btnsubmitregister"])) {
  $taikhoan = $_POST["taikhoan"];
  $email = $_POST["email"];
  $matkhau = $_POST["matkhau"];
  $nhaplaimatkhau = $_POST["nhaplaimatkhau"];
  $ngaygiovietnam = new DateTimeZone('Asia/Ho_Chi_Minh');
  $ngay = new DateTime;
  $ngay->setTimezone($ngaygiovietnam);
  $ngayhientai = $ngay->format('y-m-d');
  //Mã hóa Md5
  $matkhau = md5($matkhau);
  $nhaplaimatkhau = md5($nhaplaimatkhau);
  $nguoidung = new User($taikhoan, $email, $matkhau, $ngayhientai, $ngayhientai, '2');
  $kiemtra = User::KiemTraDangKy($taikhoan);

  //kiểm tra có null hay không ??
  if (!$taikhoan || !$email || !$matkhau || !$nhaplaimatkhau) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
  } else if ($matkhau != $nhaplaimatkhau) {
    ?>
    <script>
      alert("Mật khẩu không giống nhau");
    </script>
    <?php
  } else {
    /*----- Kiểm Tra Tồn Tại Dữ Liệu -----*/
    if ($kiemtra) {
    ?>
      <script>
        alert("Người dùng này đã tồn tại");
      </script>
      <?php
    } else {
      $ketqua = $nguoidung->DangKy();
      if (!$ketqua) {
      ?>
        <script>
          alert("Thất bại");
        </script>
      <?php
      } else {
      ?>
        <script>
          alert("Thành công");
        </script>
<?php
        header("Location: home.php");
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WebTruyenPHP</title>
  <link rel="stylesheet" href="/websitetruyen/FileCSSJS/assets/css/main.css" />
  <script src="/websitetruyen/FileCSSJS/assets/js/main.js"></script>
  <script src="https://cdn.tiny.cloud/1/nf0evhvl003idt9lu8m0cwdcf19wcsks3r1vvineh5nivzmj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    $(document).ready(function() {
      $('#txtSearch').keyup(function() {
        $.ajax({
          type: 'POST',
          url: 'livesearch.php',
          data: 'keyword=' + $(this).val(),
          beforeSend: function() {
            $(".list-results").removeClass('open');
          },
          success: function(data) {
            $(".list-results").addClass('open');
            $(".list-results").html(data);
          }
        })
      });
    });
  </script>
</head>

<body>
  <!-- <div id="fb-root" class="fb_reset">
    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
      <div></div>
    </div>
  </div>

  <script>
    function getCookie(name) {
      var pattern = RegExp(name + "=.[^;]*");
      matched = document.cookie.match(pattern);
      if (matched) {
        var cookie = matched[0].split("=");
        return cookie[1];
      }
      return false;
    }
  </script> -->

  <input type="hidden" id="keyword-default" value="vợ" />
  <div class="outsite">
    <section class="top-bar" id="home">
      <div class="container">
        <div class="level">
          <div class="level-left pc">
            <span class="logo">
              <a href="home.php">Truyen QQ</a>
            </span>
            <!-- /.logo -->
            <div class="top-search">
              <form action="search.php" method="get">
                <input type="text" name="Search" class="text-search" id="txtSearch" placeholder="Bạn cứ nhập từ khoá, còn lại để qq lo" />
                <button class="submit-btn btn_search"></button>
              </form>
              <?php
              if (isset($_POST["Search"])) {
                $timkiem = $_POST["Search"];
                $ketqua = Manga::DanhSachTimKiem($timkiem);
                var_dump($ketqua);
                die();

                // if(!$ketqua)
                // {

                // }
                // else
                // {

                // }
              }
              ?>
              <div class="list-results">
                <!-- Add class 'open' to open list results -->
                <!-- <div class="title-search">Danh sách truyện gợi ý</div> -->

              </div>
              <!-- /.list-results -->
            </div>
            <!-- /.top-search -->
          </div>
          <div class="level-right">
            <?php
            if (isset($_SESSION["user"]) && $_SESSION["user"]) {
            ?>
              <div class="top-buttons has-login">
                <div class="notify home smp">
                  <a href="#"><i class="fas fa-home"></i></a>
                </div>
                <div class="notify center" data-id="notification">
                  <i class="fas fa-bell"></i>
                  <div class="list-messages">
                    <div class="title-message">Thông báo</div>
                    <ul>
                      <li class="no-result" style="padding: 10px;">
                        Không Có Thông Báo Nào!
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="notify center">
                  <i class="fas fa-envelope"></i>
                  <div class="list-messages">
                    <div class="title-message">Tin nhắn</div>
                    <ul>
                      <li class="no-result" style="padding: 10px;">
                        Không Có Tin Nhắn Nào!
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="notify center btn-search smp" for="focus-input">
                  <i class="fas fa-search"></i>
                </div>
                <div class="notify user center">
                  <span class="avatar-menu"><img src="/websitetruyen/FileCSSJS/assets/images/noavatar.png" /></span>
                  <div class="notify btn-user smp">
                    <i class="fas fa-user-circle"></i>
                  </div>
                  <ul class="user-links">
                    <li>
                      <a href="thongtincanhan.php?matk=<?php echo $_SESSION["user"] ?>"><i class="fas fa-user-circle"></i> Thông tin tài khoản </a>
                    </li>
                    <li>
                      <a href="#"><i class="fas fa-heart"></i> Theo dõi</a>
                    </li>
                    <li>
                      <a href="dangtruyen.php"><i class="fas fa-history"></i> Đăng Truyện</a>
                    </li>

                    <li>
                      <a href="tutruyen.php?matk=<?php echo $_SESSION["user"]; ?>"><i class="fas fa-envelope"></i> Tủ Truyện</a>
                    </li>
                    <li>
                      <a href="doimatkhau.php?matk=<?php echo $_SESSION["user"] ?>"><i class="fas fa-lock"></i> Đổi mật khẩu</a>
                    </li>
                    <li>
                      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    </li>
                  </ul>
                </div>
                <div class="head_menu smp"><span>&nbsp;</span></div>
              </div>
            <?php } else {
            ?><div class="top-buttons has-login">
                <button class="login-btn">Đăng nhập</button>
                <button class="register-btn">Đăng ký</button>
              </div>
            <?php  }
            ?>

            <!-- /.top-buttons -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.top-bar -->
    <div class="modal login-modal">
      <div class="modal-background"></div>
      <div class="modal-content">
        <span class="top-caption">
          Dù ai di ngược về xuôi,<br />
          đến giờ đọc truyện cứ vào QQ
        </span>
        <div>
          <!-- /.top-caption -->
          <div class="tabs-buttons">
            <button data-type="login">Đăng nhập</button>
            <button data-type="register">Đăng ký</button>
          </div>
          <!-- /.tabs-button -->
          <div class="tabs-contents">
            <div class="login-section">
              <div class="form-login">
                <form method="post">
                  <input type="text" placeholder="Tài khoản" name="Username" id="email_login" value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ""; ?>" />
                  <input type="password" placeholder="Mật khẩu" name="Password" id="password_login" value="<?php echo isset($_POST["Password"]) ? $_POST["Password"] : ""; ?>" />
                  <button type="submit" name="btnsubmitlogin" class="button_login btn btn-lg">
                    Đăng nhập
                  </button>
                </form>

                <a href="#" class="forget-password-link">Quên mật khẩu</a>
              </div>
              <div class="social-login">
                <span>Hoặc đăng nhập bằng:</span>
                <a href="#" class="facebook-link"><span class="facebook-icon"></span></a>
                <a href="#" class="google-link"><span class="google-icon"></span></a>
              </div>
            </div>
            <!-- /.login-section -->
            <div class="register-section">
              <div class="form-login">
                <form method="post">
                  <input type="text" name="taikhoan" placeholder="Tài khoản" id="user_register" value="<?php echo isset($_POST["taikhoan"]) ? $_POST["taikhoan"] : ""; ?>" />
                  <input type="email" name="email" placeholder="Email" id="email_register" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" />
                  <input type="password" name="matkhau" placeholder="Mật khẩu" id="password_register" value="<?php echo isset($_POST["matkhau"]) ? $_POST["matkhau"] : ""; ?>" />
                  <input type="password" name="nhaplaimatkhau" placeholder="Nhập Lại Mật khẩu" id="npassword_register" value="<?php echo isset($_POST["nhaplaimatkhau"]) ? $_POST["nhaplaimatkhau"] : ""; ?>" />
                  <button type="submit" name="btnsubmitregister" id="button_register">Đăng ký</button>
                </form>
              </div>
            </div>
          </div>
          <!-- /.register-section -->
        </div>
        <!-- /.tabs-contents -->
      </div>
    </div>
    <!-- /.login-modal -->
    <div class="modal notify-modal">
      <div class="modal-background"></div>
      <div class="modal-content">
        <span class="top-caption">
          Quên mật khẩu hử !<br />
          Đã có QQ lo
        </span>
        <!-- /.top-caption -->
        <div class="forget-password-section">
          <span class="caption">Mật khẩu khôi phục sẽ được gởi qua email mà bạn đăng ký</span>
          <div class="form-forgot">
            <input type="email" placeholder="Email" id="email-forgot" />
            <div class="login-captcha">
              <input type="text" class="form-control" id="captcha_forgot" name="captcha_forgot" placeholder="Mã xác nhận" />
              <img src="" />
              <span class="refresh-captcha" data-type="forgot"><i class="fas fa-sync-alt"></i></span>
              <input type="hidden" name="captcha-register" id="captcha-forgot" value="" />
            </div>
            <button type="submit" id="button-forgot">Gửi mật khẩu</button>
          </div>
        </div>
        <!-- /.forget-password-section -->
        <div class="sent-password-section">
          <span class="check-icon"></span>
          <span class="caption">Mật khẩu khôi phục đã được gởi bạn hãy kiểm tra trong hộp
            thư</span>
        </div>
        <!-- /.sent-password-section -->
        <a href="javascript:void(0);" class="back-to-login">Tôi muốn quay lại đăng nhập</a>
        <!-- /.back-to-login -->
      </div>
    </div>
    <!-- /.notify-modal -->

    <section class="main-menu">
      <div class="container">
        <nav class="navbar">
          <div class="navbar-menu">
            <div class="navbar-start">
              <div class="top-search smp">
                <input class="text-search" type="text" placeholder="Bạn cứ nhập từ khoá, còn lại để qq lo" />
                <button class="submit-btn btn_search"></button>
                <div class="list-results"></div>
              </div>
              <a href="home.php" class="navbar-item">Trang Chủ</a>
              <div class="navbar-item has-dropdown is-hoverable is-mega">
                <div class="navbar-link">Thể loại</div>
                <div class="navbar-dropdown">
                  <div class="container">
                    <div class="level">
                      <div class="level-left mega-list-wrapper">
                        <div class="columns">
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <?php
                              $danhsachtheloai = Theloai::Theloaitruyen();
                              foreach ($danhsachtheloai as $item) {
                              ?>
                                <li class="col-sm-3">
                                  <a href="danhsachtheloai.php?IdTheloai=<?php echo $item["IdTheloai"] ?>"><?php echo $item['TenTheloai'] ?></a>
                                </li>
                              <?php } ?>
                            </ul>
                          </div>
                          <!-- <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Comic</a>
                              </li>
                              <li>
                                <a href="#">Demons</a>
                              </li>
                              <li>
                                <a href="#">Detective</a>
                              </li>
                              <li>
                                <a href="#">Doujinshi</a>
                              </li>
                              <li>
                                <a href="#">Drama</a>
                              </li>
                              <li>
                                <a href="#">Đam Mỹ</a>
                              </li>
                              <li>
                                <a href="#">Ecchi</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Xuyên Không</a>
                              </li>
                              <li>
                                <a href="#">Yaoi</a>
                              </li>
                              <li>
                                <a href="#">Yuri</a>
                              </li>
                            </ul>
                          </div> -->
                        </div>
                      </div>
                      <div class="level-right pc">
                        <img src="http://truyenqq.com/template/frontend/images/menu-icon.jpg" class="mega-menu-cover" alt="img" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="navbar-item has-dropdown is-hoverable is-mega">
                <div class="navbar-link">Sắp Xếp</div>
                <div class="navbar-dropdown">
                  <div class="container">
                    <div class="level">
                      <div class="level-left mega-list-wrapper">
                        <div class="columns">
                          <div class="column">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Top Ngày</a>
                              </li>
                              <li>
                                <a href="#">Top Tuần</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Top Tháng</a>
                              </li>
                              <li>
                                <a href="#">Yêu Thích</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Mới Cập Nhật</a>
                              </li>
                              <li>
                                <a href="#">Truyện Mới</a>
                              </li>
                            </ul>
                          </div>
                          <div class="column">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Truyện Full</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a href="#" class="navbar-item">Truyện Con Gái</a>
              <a href="#" class="navbar-item">Truyện Con Trai</a>
              <a rel="nofollow" href="#" class="navbar-item">Lịch Sử</a>
            </div>
          </div>
        </nav>
      </div>
    </section>
    <!-- /.main-menu -->


    <?php
    //  $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $url =  $_SERVER['REQUEST_URI'];
    if ($url == '/websitetruyen/online.php') {
      echo  '<section class="right-bar pc">
              <div class="top-right-bar">
                <div class="right-bar-item">
                  <a href="#home"><span class="group-icon"></span></a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-update">
                    <span class="starts-icon"></span>
                    Cập nhật
                  </a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-female">
                    <span class="female-icon"></span>
                    Con gái
                  </a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-male">
                    <span class="male-icon"></span>
                    Con trai
                  </a>
                </div>
              </div>
              <!-- /.top-right-bar -->

              <div class="bottom-right-bar download-app-bottom">
                <div class="right-bar-item">
                  <a href="javascript:void(0);"><span class="rect-icon"></span></a>
                </div>
              </div>
              <!-- /.bottom-right-bar -->
            </section>';
    } else if ($url == '/websitetruyen/home.php') {

      echo  '<section class="right-bar pc">
              <div class="top-right-bar">
                <div class="right-bar-item">
                  <a href="#home"><span class="group-icon"></span></a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-update">
                    <span class="starts-icon"></span>
                    Cập nhật
                  </a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-female">
                    <span class="female-icon"></span>
                    Con gái
                  </a>
                </div>
                <div class="right-bar-item">
                  <a href="#list-male">
                    <span class="male-icon"></span>
                    Con trai
                  </a>
                </div>
              </div>
              <!-- /.top-right-bar -->

              <div class="bottom-right-bar download-app-bottom">
                <div class="right-bar-item">
                  <a href="javascript:void(0);"><span class="rect-icon"></span></a>
                </div>
              </div>
              <!-- /.bottom-right-bar -->
            </section>';
    }

    ?>

    <!-- /.right-bar -->