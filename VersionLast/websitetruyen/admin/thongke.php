<?php include_once("header.php"); ?>
<?php 
include("Controller/Sanpham.class.php");
include("Controller/Order.class.php");
include("Controller/Manga.class.php");
include("Controller/Chap.class.php");

$tong = UserMaster::Tong();
$tong = reset($tong);
$tongsan = SanphamMaster::Tong();
$tongsan = reset($tongsan);
$tonghoa = OrderMaster::Tong();
$tonghoa =reset($tonghoa);
$tongtruyen = MangaMaster::Tong();
$tongtruyen = reset($tongtruyen);
$tongtruyen1 = MangaMaster::TongIn();
$tongtruyen1 = reset($tongtruyen1);
$tongtruyen2 = MangaMaster::TongNot();
$tongtruyen2 = reset($tongtruyen2);
$tongchap = ChapMaster::Tong();
$tongchap = reset($tongchap);
$tongchap1 = ChapMaster::TongIn();
$tongchap1 = reset($tongchap1);
$tongchap2 = ChapMaster::TongNot();
$tongchap2 = reset($tongchap2);
?>
<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Trang Chủ</a>
							</li>
							<li class="active">Thông Kê</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
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
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Thông Kê
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongtruyen["Tong"] ?></span>
												<div class="infobox-content">Tổng Số Truyện</div>
											</div>
										</div>
	                                        <div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongtruyen2["Tong"] ?></span>
												<div class="infobox-content">Truyện Chưa Kích Hoạt</div>
											</div>
										</div>	
                                        <div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongtruyen1["Tong"] ?></span>
												<div class="infobox-content">Truyện Kích Hoạt</div>
											</div>
										</div>	
                                        <div class="infobox infobox-black">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-list"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongchap["Tong"] ?></span>
												<div class="infobox-content">Chương Truyện</div>
											</div>
										</div>
										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-list"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongchap2["Tong"] ?></span>
												<div class="infobox-content">Chương Chưa K/hoạt</div>
											</div>
										</div>

										<div class="infobox infobox-gray">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-list"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongchap1["Tong"] ?></span>
												<div class="infobox-content">Chương  K/hoạt</div>
											</div>
										</div>
                                        <div class="infobox infobox-orange">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tonghoa["Tong"] ?></span>
												<div class="infobox-content">Đơn Hàng</div>
											</div>
										</div>
                                        <div class="infobox infobox-brown ">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-trophy"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tongsan["Tong"] ?></span>
												<div class="infobox-content">Sản phẩm</div>
											</div>
										</div>
                                        <div class="infobox infobox-green ">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-user"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $tong["Tong"] ?></span>
												<div class="infobox-content">Người Dùng</div>
											</div>
										</div>
										<div class="space-6"></div>
									</div>

									<div class="vspace-12-sm"></div>

									
								</div><!-- /.row -->


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
            <?php  include_once("footer.php"); ?>