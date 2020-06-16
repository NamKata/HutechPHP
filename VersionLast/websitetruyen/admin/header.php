<?php ob_start(); ?>
<?php
include("Controller/User.class.php");
 ?>
<?php
session_start();
if(!isset($_SESSION["master"])){
    header("Location: login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Master Admin</title>
    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0"
    />

    <!-- bootstrap & fontawesome -->
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/bootstrap-duallistbox.min.css"
    />
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/bootstrap-multiselect.min.css"
    />
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/select2.min.css"
    />
<link rel="stylesheet" href="/websitetruyen/admin/assets/css/jquery.gritter.min.css" />
	<link rel="stylesheet" href="/websitetruyen/admin/assets/css/bootstrap-datepicker3.min.css" />
    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/fonts.googleapis.com.css"
    />

    <!-- ace styles -->
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/ace.min.css"
      class="ace-main-stylesheet"
      id="main-ace-style"
    />

    <link rel="stylesheet" href="/websitetruyen/admin/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/chosen.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="/websitetruyen/admin/assets/css/bootstrap-colorpicker.min.css" />


    <!--[if lte IE 9]>
      <link
        rel="stylesheet"
        href="assets/css/ace-part2.min.css"
        class="ace-main-stylesheet"
      />
    <![endif]-->
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/ace-skins.min.css"
    />
    <link
      rel="stylesheet"
      href="/websitetruyen/admin/assets/css/ace-rtl.min.css"
    />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/websitetruyen/admin/assets/js/ace-extra.min.js"></script>

    <!--[if lte IE 8]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>

    <![endif]-->
  </head>
  
  <body class="no-skin" style="font-family: Arial, Helvetica, sans-serif;">
    <div id="navbar" class="navbar navbar-default ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button
          type="button"
          class="navbar-toggle menu-toggler pull-left"
          id="menu-toggler"
          data-target="#sidebar"
        >
          <span class="sr-only">Toggle sidebar</span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
          <a href="/websitetruyen/admin/index.php" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
              Ace Admin
            </small>
          </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation" id="LoginMaster_div">
           <ul class="nav ace-nav" id="LoginMaster_ul">
  <li class="grey dropdown-modal">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
      <i class="ace-icon fa fa-tasks"></i>
      <span class="badge badge-grey">4</span>
    </a>

    <ul
      class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close"
    >
      <li class="dropdown-header">
        <i class="ace-icon fa fa-check"></i>
        4 Tasks to complete
      </li>

      <li class="dropdown-content">
        <ul class="dropdown-menu dropdown-navbar">
          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">Software Update</span>
                <span class="pull-right">65%</span>
              </div>

              <div class="progress progress-mini">
                <div style="width: 65%;" class="progress-bar"></div>
              </div>
            </a>
          </li>

          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">Hardware Upgrade</span>
                <span class="pull-right">35%</span>
              </div>

              <div class="progress progress-mini">
                <div
                  style="width: 35%;"
                  class="progress-bar progress-bar-danger"
                ></div>
              </div>
            </a>
          </li>

          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">Unit Testing</span>
                <span class="pull-right">15%</span>
              </div>

              <div class="progress progress-mini">
                <div
                  style="width: 15%;"
                  class="progress-bar progress-bar-warning"
                ></div>
              </div>
            </a>
          </li>

          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">Bug Fixes</span>
                <span class="pull-right">90%</span>
              </div>

              <div class="progress progress-mini progress-striped active">
                <div
                  style="width: 90%;"
                  class="progress-bar progress-bar-success"
                ></div>
              </div>
            </a>
          </li>
        </ul>
      </li>

      <li class="dropdown-footer">
        <a href="#">
          See tasks with details
          <i class="ace-icon fa fa-arrow-right"></i>
        </a>
      </li>
    </ul>
  </li>

  <li class="purple dropdown-modal">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
      <i class="ace-icon fa fa-bell icon-animated-bell"></i>
      <span class="badge badge-important">8</span>
    </a>

    <ul
      class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close"
    >
      <li class="dropdown-header">
        <i class="ace-icon fa fa-exclamation-triangle"></i>
        8 Notifications
      </li>

      <li class="dropdown-content">
        <ul class="dropdown-menu dropdown-navbar navbar-pink">
          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">
                  <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                  New Comments
                </span>
                <span class="pull-right badge badge-info">+12</span>
              </div>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="btn btn-xs btn-primary fa fa-user"></i>
              Bob just signed up as an editor ...
            </a>
          </li>

          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">
                  <i
                    class="btn btn-xs no-hover btn-success fa fa-shopping-cart"
                  ></i>
                  New Orders
                </span>
                <span class="pull-right badge badge-success">+8</span>
              </div>
            </a>
          </li>

          <li>
            <a href="#">
              <div class="clearfix">
                <span class="pull-left">
                  <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                  Followers
                </span>
                <span class="pull-right badge badge-info">+11</span>
              </div>
            </a>
          </li>
        </ul>
      </li>

      <li class="dropdown-footer">
        <a href="#">
          See all notifications
          <i class="ace-icon fa fa-arrow-right"></i>
        </a>
      </li>
    </ul>
  </li>

  <li class="green dropdown-modal">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
      <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
      <span class="badge badge-success">5</span>
    </a>

    <ul
      class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close"
    >
      <li class="dropdown-header">
        <i class="ace-icon fa fa-envelope-o"></i>
        5 Messages
      </li>

      <li class="dropdown-content">
        <ul class="dropdown-menu dropdown-navbar">
          <li>
            <a href="#" class="clearfix">
              <img
                src="/websitetruyen/admin/assets/images/avatars/avatar.png"
                class="msg-photo"
                alt="Alex's Avatar"
              />
              <span class="msg-body">
                <span class="msg-title">
                  <span class="blue">Alex:</span>
                  Ciao sociis natoque penatibus et auctor ...
                </span>

                <span class="msg-time">
                  <i class="ace-icon fa fa-clock-o"></i>
                  <span>a moment ago</span>
                </span>
              </span>
            </a>
          </li>

          <li>
            <a href="#" class="clearfix">
              <img
                src="/websitetruyen/admin/assets/images/avatars/avatar3.png"
                class="msg-photo"
                alt="Susan's Avatar"
              />
              <span class="msg-body">
                <span class="msg-title">
                  <span class="blue">Susan:</span>
                  Vestibulum id ligula porta felis euismod ...
                </span>

                <span class="msg-time">
                  <i class="ace-icon fa fa-clock-o"></i>
                  <span>20 minutes ago</span>
                </span>
              </span>
            </a>
          </li>
        </ul>
      </li>

      <li class="dropdown-footer">
        <a href="#">
          See all messages
          <i class="ace-icon fa fa-arrow-right"></i>
        </a>
      </li>
    </ul>
  </li>
  <li class="light-blue dropdown-modal" id="LoginMaster">
    <?php
        if (isset($_SESSION["master"]) && $_SESSION["master"]) {
            $admin = UserMaster::ThongTin($_SESSION["master"]);
            $admin = reset($admin);
    ?>
    <a data-toggle="dropdown" href="#" class="dropdown-toggle" id="GETDATA">
      <img
        class="nav-user-photo"
        width="40px" height="40px"
        src="<?php echo "../".$admin["Anh"] ?>"
        alt="<?php echo $admin["HoTen"] ?>"
      />
      <span class="user-info">
        <small>Xin chào,</small>
        <?php echo $admin["HoTen"] ?>
      </span>

      <i class="ace-icon fa fa-caret-down"></i>
    </a>

    <ul
      class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close"
    >
      <li>
        <a href="#">
          <i class="ace-icon fa fa-user"></i>
          Thông Tin Cá Nhân
        </a>
      </li>

      <li class="divider"></li>

      <li>
        <a href="dangxuat.php">
          <i class="ace-icon fa fa-power-off"></i>
          Đăng Xuất
        </a>
      </li>
    </ul>
    <?php } ?>
  </li>
</ul>
   
        </div>
      </div>
      <!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try {
          ace.settings.loadState("main-container");
        } catch (e) {}
      </script>

      <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
          try {
            ace.settings.loadState("sidebar");
          } catch (e) {}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
              <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
              <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
              <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
              <i class="ace-icon fa fa-cogs"></i>
            </button>
          </div>

          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
          </div>
        </div>
        <!-- /.sidebar-shortcuts -->

        <ul
          class="nav nav-list"
          style="font-family: Arial, Helvetica, sans-serif;"
        >
                 <li class="active">
            <a href="/websitetruyen/admin/index.php">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Trang Chủ </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Danh sách </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="tblnhom.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Nhóm Người Dùng
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="tblnguoidung.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Tài Khoản
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="tbltheloai.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Thể Loại
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="tbltruyen.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Truyện
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="tblsanpham.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Sản phẩm
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kích/ Hủy Truyện
                </a>

                <b class="arrow"></b>
              </li>
              <li class="">
                <a href="tblhoadon.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hóa Đơn
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-pencil-square-o"></i>
              <span class="menu-text"> Mẫu </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Trả lời
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-list-alt"></i>
              <span class="menu-text"> Thống Kế </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-calendar"></i>

              <span class="menu-text">
                Công tác

                <span
                  class="badge badge-transparent tooltip-error"
                  title="2 Important Events"
                >
                  <i
                    class="ace-icon fa fa-exclamation-triangle red bigger-130"
                  ></i>
                </span>
              </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-picture-o"></i>
              <span class="menu-text"> Album </span>
            </a>

            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-tag"></i>
              <span class="menu-text"> Tags </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  User Profile
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>
        </ul>
        <!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i
            id="sidebar-toggle-icon"
            class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left"
            data-icon2="ace-icon fa fa-angle-double-right"
          ></i>
        </div>
      </div>

     