<?php
include_once("header.php");
 ?>
 <div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb" style="font-family: Arial, Helvetica, sans-serif;">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="/websitetruyen/admin/index.php">Trang Chủ</a>
        </li>
      
      </ul>
      <!-- /.breadcrumb -->

      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
            <input
              type="text"
              placeholder="Search ..."
              class="nav-search-input"
              id="nav-search-input"
              autocomplete="off"
            />
            <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
      </div>
      <!-- /.nav-search -->
    </div>

    <div class="page-content">
      <div class="ace-settings-container" id="ace-settings-container">
        <div
          class="btn btn-app btn-xs btn-warning ace-settings-btn"
          id="ace-settings-btn"
        >
          <i class="ace-icon fa fa-cog bigger-130"></i>
        </div>

        <div class="ace-settings-box clearfix" id="ace-settings-box">
          <div class="pull-left width-50">
            <div class="ace-settings-item">
              <div class="pull-left">
                <select id="skin-colorpicker" class="hide">
                  <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                  <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                  <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                  <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                </select>
              </div>
              <span>&nbsp; Choose Skin</span>
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2 ace-save-state"
                id="ace-settings-navbar"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2 ace-save-state"
                id="ace-settings-sidebar"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-sidebar">
                Fixed Sidebar</label
              >
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2 ace-save-state"
                id="ace-settings-breadcrumbs"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-breadcrumbs">
                Fixed Breadcrumbs</label
              >
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2"
                id="ace-settings-rtl"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-rtl">
                Right To Left (rtl)</label
              >
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2 ace-save-state"
                id="ace-settings-add-container"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-add-container">
                Inside
                <b>.container</b>
              </label>
            </div>
          </div>
          <!-- /.pull-left -->

          <div class="pull-left width-50">
            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2"
                id="ace-settings-hover"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-hover">
                Submenu on Hover</label
              >
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2"
                id="ace-settings-compact"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-compact">
                Compact Sidebar</label
              >
            </div>

            <div class="ace-settings-item">
              <input
                type="checkbox"
                class="ace ace-checkbox-2"
                id="ace-settings-highlight"
                autocomplete="off"
              />
              <label class="lbl" for="ace-settings-highlight">
                Alt. Active Item</label
              >
            </div>
          </div>
          <!-- /.pull-left -->
        </div>
        <!-- /.ace-settings-box -->
      </div>
      <!-- /.ace-settings-container -->

      <div class="page-header">
        <h1>
          Trang Chủ
        </h1>
      </div>
      <!-- /.page-header -->

      <div class="row">
        <div class="col-xs-12 center">
          <!-- PAGE CONTENT BEGINS -->
		  <img src="/websitetruyen/FileCSSJS/assets/images/unnamed.png" style="width: auto; height: auto;" alt="">
		<div>
        <div class="col-xs-7 left">
        	<h2 style="font-weight: bold; font-family: cursive; ">Trường Đại Học Công Nghệ Thành Phố Hồ Chí Minh</h2>
            <h1 class="text" style="font-weight: bold; font-family: cursive; color: black;">Đề tài: Website Truyện</h1>
            <h2 style="font-weight: bold; font-family: cursive; ">Khoa Công Nghệ Thông Tin</h2>
            <h2 style="font-weight: bold; font-family: cursive; ">Chuyên Ngành Công Nghệ Phần Mềm</h2>
            <h2 style="font-weight: bold; font-family: cursive; ">Môn Lập Trình Mã Nguồn Mở</h2>
            <h2 style="font-weight: bold; font-family: cursive; ">Khóa học : 2016 - 2020</h2>
        </div>
        <div class="col-xs-5 right">
            <h2 style="font-weight: bold; font-family: cursive;">Thành viên Nhóm:</h2>
            <p style="font-weight: bold; font-family: cursive;  color: red; font-size:20px">
                Trần Tiến Nam - 1611062128
            </p>
            <p style="font-weight: bold; font-family: cursive;  color: red; font-size:20px">
                Đoàn Quang Thắng - 1611061708
            </p>
            <p style="font-weight: bold; font-family: cursive;  color: red; font-size:20px">
                Đặng Nguyễn Thiên Phúc - 1611062141
            </p>
            <p style="font-weight: bold; font-family: cursive;  color: red; font-size:20px">
                Vũ Thành Nam - 1611061619
            </p>
            <p style="font-weight: bold; font-family: cursive;  color: red; font-size:20px">
                Nguyễn Hải Thiên - 1611061714
            </p>
        </div>
		</div>
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>
 <?php 
 include_once("footer.php");
 ?>