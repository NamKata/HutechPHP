<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WebTruyenPHP</title>
  <link rel="stylesheet" href="/websitetruyen/FileCSSJS/assets/css/main.css" />
  <script src="/websitetruyen/FileCSSJS/assets/js/main.js"></script>
</head>

<body>
  <div id="fb-root" class="fb_reset">
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
  </script>

  <input type="hidden" id="keyword-default" value="vợ" />
  <div class="outsite">
    <section class="top-bar" id="home">
      <div class="container">
        <div class="level">
          <div class="level-left pc">
            <span class="logo">
              <a href="#">Truyen QQ</a>
            </span>
            <!-- /.logo -->
            <div class="top-search">
              <input type="text" class="text-search" placeholder="Bạn cứ nhập từ khoá, còn lại để qq lo" />
              <button class="submit-btn btn_search"></button>
              <div class="list-results">
                <!-- Add class 'open' to open list results -->
                <div class="title-search">Tìm kiếm gần đây</div>
                <div class="list-container"></div>
              </div>
              <!-- /.list-results -->
            </div>
            <!-- /.top-search -->
          </div>
          <div class="level-right">
            <?php
            $url =  $_SERVER['REQUEST_URI'];
            if ($url == '/websitetruyen/online.php') {
              echo '<div class="top-buttons has-login">
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
                      <span class="avatar-menu"
                        ><img src="/websitetruyen/FileCSSJS/assets/images/noavatar.png"
                      /></span>
                      <div class="notify btn-user smp">
                        <i class="fas fa-user-circle"></i>
                      </div>
                      <ul class="user-links">
                        <li>
                          <a href="#"
                            ><i class="fas fa-user-circle"></i> Thông tin tài khoản </a
                          >
                        </li>
                        <li>
                          <a href="#"
                            ><i class="fas fa-heart"></i> Theo dõi</a
                          >
                        </li>
                        <li>
                          <a href="#"
                            ><i class="fas fa-history"></i> Lịch sử</a
                          >
                        </li>

                        <li>
                          <a href="#"
                            ><i class="fas fa-envelope"></i> Tin nhắn</a
                          >
                        </li>
                        <li>
                          <a href="#"><i class="fas fa-lock"></i> Đổi mật khẩu</a>
                        </li>
                        <!--<li>
                                                      <a href="http://truyenqq.com/dang-ky-nhom-dich.html"><i class="fas fa-clipboard-list"></i> Đăng ký nhóm dịch</a>
                                                  </li>-->
                        <li>
                          <a href="#"></i> Đăng xuất</a>
                        </li>
                      </ul>
                    </div>
                    <div class="head_menu smp"><span>&nbsp;</span></div>
                  </div>';
            } else{
              echo ' <div class="top-buttons has-login">
                <button class="login-btn">Đăng nhập</button>
                <button class="register-btn">Đăng ký</button>
              </div>';
            }
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
                <input type="email" placeholder="Email" id="email_login" />
                <input type="password" placeholder="Mật khẩu" id="password_login" />
                <button type="submit" class="button_login btn btn-lg">
                  Đăng nhập
                </button>
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
                <input type="text" placeholder="Tài khoản" id="user_register" />
                <input type="email" placeholder="Email" id="email_register" />
                <input type="password" placeholder="Mật khẩu" id="password_register" />
                <input type="password" placeholder="Nhập Lại Mật khẩu" id="npassword_register" />
                <button type="submit" id="button_register">Đăng ký</button>
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
              <a href="#" class="navbar-item">Trang Chủ</a>
              <div class="navbar-item has-dropdown is-hoverable is-mega">
                <div class="navbar-link">Thể loại</div>
                <div class="navbar-dropdown">
                  <div class="container">
                    <div class="level">
                      <div class="level-left mega-list-wrapper">
                        <div class="columns">
                          <div class="column column-menu">
                            <ul class="mega-list">
                              <li>
                                <a href="#">Action</a>
                              </li>
                              <li>
                                <a href="#">Adult</a>
                              </li>
                              <li>
                                <a href="#">Adventure</a>
                              </li>
                              <li>
                                <a href="#">Anime</a>
                              </li>
                              <li>
                                <a href="#">Chuyển Sinh</a>
                              </li>
                              <li>
                                <a href="#">Cổ Đại</a>
                              </li>
                              <li>
                                <a href="#">Comedy</a>
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
                          </div>
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
    if($url == '/websitetruyen/online.php')
    {
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
    }else if($url == '/websitetruyen/home.php'){
     
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